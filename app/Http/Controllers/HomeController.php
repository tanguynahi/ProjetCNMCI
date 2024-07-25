<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\User;
use App\Models\Slide;
use App\Models\Artisan;

use App\Models\Actualite;
use App\Models\Parametre;
use App\Models\Facturation;

use Illuminate\Http\Request;
use App\Models\Identification;

use Illuminate\Support\Carbon;
use App\Models\ActiviteArtisan;

// use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\ArtisanConnexionRequest;
// use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\StoreIdentificationRequest;

// use App\Http\Requests\UpdateIdentificationRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $faqs = FAQ::orderBy('created_at', 'ASC')->get();
        $parametre = Parametre::whereId(1)->first();
        $slides = Slide::whereCategorie('Image Carousel')->orderBy('created_at', 'ASC')->get();
        $partenaires = Slide::whereCategorie('Image Partenaire')->orderBy('created_at', 'ASC')->get();
        $annonces = Slide::whereCategorie('Image Annonce')->orderBy('created_at', 'ASC')->get();
        $actualites = Actualite::orderBy('created_at', 'Desc')->paginate(3);
        return view('home.vitrines.index', compact('actualites', 'slides', 'annonces', 'partenaires', 'parametre', 'faqs'));
    }
    public function verificationRegistre()
    {
        return view('home.vitrines.inscriptions.debut');
    }

    public function inscription(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numero_registre' => 'required'
        ]);


        $mess = "";
        if ($validator->fails()) {
            $mess = 'Veuillez renseigner un numero de registre valide';
        } else {
            $data = [
                'numero_registre' => $request->numero_registre,
                'value' => 'bew',
            ];
            $reponse = Http::post('http://192.168.100.207:8000/api/cnmci-ws/check-registre', $data);
            $ResJSON = $reponse->json();
            // dd(($ResJSON['code']) );
            if ($reponse->status() === 200) {
                if ($ResJSON['code'] === 200) {
                    $registre = $request->numero_registre;
                    $typeActivites = $ResJSON['data']['TypesActivites'];
                    $brancheActivites = $ResJSON['data']['BranchesActivites'];
                    $typeEntreprises = $ResJSON['data']['TypesEntreprises'];
                    $typeDocuments = $ResJSON['data']['TypesDocs'];
                    $sousPrefectures = $ResJSON['data']['SousPrefectures'];
                    $communes = $ResJSON['data']['Communes'];
                    return view('home.vitrines.inscription', compact('communes', 'typeDocuments', 'sousPrefectures', 'typeActivites', 'typeEntreprises', 'brancheActivites', 'registre'));
                } else {

                    $mess = messageBrut($ResJSON['message']);
                    // toast($mess, 'error');
                    // return back()->with('message', $mess);
                }
            } else {
                $mess = 'Une erreur inattendue s\'est produite, verifier que vous avez accès à internet, ' .
                    'puis reéssayer. erreur ' . $reponse->status();
            }
        }
        toast($mess, 'error');
        return back()->with('message', $mess);
    }

    // on la passe avec l'id de l'artisan pour mettre son mot de passe
    public function create()
    {
        return view('home.vitrines.create');
    }

    /* ---------------   page de paiement inscription -----------------  */
    // en attent de paiement je doit passe l'id de l'artisan
    public function show($idinscription, $idcartemembre = null)
    {

        if ($idcartemembre) {
            $facturationInscription = Facturation::where('id', $idinscription)->first();
            $facturationCarteMembre = Facturation::where('id', $idcartemembre)->first();
            $artisanId = Facturation::where('entite_id', $facturationInscription->entite_id)->pluck('entite_id')->first();
            $artisan = Artisan::whereId($artisanId)->first(); // info sur l'artisan
            $activiteArtisanId = Facturation::where('activite_artisan_id', $facturationInscription->activite_artisan_id)->pluck('activite_artisan_id')->first();
            $activiteArtisan = ActiviteArtisan::where('id', $activiteArtisanId)->first(); // info sur l'activites de l'artisan
            $totalApayer = $facturationInscription->total_apayer + $facturationCarteMembre->total_apayer;
            return view('home.vitrines.show', compact('facturationInscription', 'facturationCarteMembre', 'activiteArtisan', 'artisan', 'totalApayer'));
        } else {
            $facturationInscription = Facturation::where('id', $idinscription)->first();
            $facturationCarteMembre = Facturation::where('id', $idcartemembre)->first();
            // dd($facturationCarteMembre);
            // $facturationCarteMembre = 0;
            $artisanId = Facturation::where('entite_id', $facturationInscription->entite_id)->pluck('entite_id')->first();
            $artisan = Artisan::where('id', $artisanId)->first(); // info sur l'artisan
            $activiteArtisanId = Facturation::where('activite_artisan_id', $facturationInscription->activite_artisan_id)->pluck('activite_artisan_id')->first();
            $activiteArtisan = ActiviteArtisan::where('id', $activiteArtisanId)->first(); // info sur l'activites de l'artisan
            $totalApayer = $facturationInscription->total_apayer;
            return view('home.vitrines.show', compact('facturationInscription', 'facturationCarteMembre', 'activiteArtisan', 'artisan', 'totalApayer'));
        }
    }

    public function identificationValid(Request $request)
    {

        // dd($request->all());
        $signature = null;
        $lien_type_document_artisan = null;
        $lien_type_document_gerant = null;
        $lien_photo_artisan = null;
        $lien_photo_gerant = null;

        $extdocartis = '';
        $extavatartis = '';
        $extdocgeran = '';
        $extavatgeran = '';
        $extsignartis = '';

        if ($request->hasFile('lien_type_document_gerant')) {
            $path = $request->file('lien_type_document_gerant');
            $extdocgeran = pathinfo($request->lien_type_document_gerant->getClientOriginalName(), PATHINFO_EXTENSION);
            $docs = file_get_contents($path);
            $lien_type_document_gerant = base64_encode($docs);
        }

        if ($request->hasFile('lien_type_document_artisan')) {
            $path = $request->file('lien_type_document_artisan');
            $extdocartis = pathinfo($request->lien_type_document_artisan->getClientOriginalName(), PATHINFO_EXTENSION);
            $docs = file_get_contents($path);
            $lien_type_document_artisan = base64_encode($docs);
        }

        if ($request->hasFile('lien_photo_artisan')) {
            $path = $request->file('lien_photo_artisan');
            $extavatartis = pathinfo($request->lien_photo_artisan->getClientOriginalName(), PATHINFO_EXTENSION);
            $docs = file_get_contents($path);
            $lien_photo_artisan = base64_encode($docs);
        }

        if ($request->hasFile('lien_photo_gerant')) {
            $path = $request->file('lien_photo_gerant');
            $extavatgeran = pathinfo($request->lien_photo_gerant->getClientOriginalName(), PATHINFO_EXTENSION);
            $docs = file_get_contents($path);
            $lien_photo_gerant = base64_encode($docs);
        }

        if ($request->hasFile('signature')) {
            $path = $request->file('signature');
            $extsignartis = pathinfo($request->signature->getClientOriginalName(), PATHINFO_EXTENSION);
            $docs = file_get_contents($path);
            $signature = base64_encode($docs);
        }
        // dd('test');

        $data = [
            'p_id' => 0,
            'type_entreprise' => $request->type_entreprise_id,
            'denomination_entreprise' => $request->denomination_entreprise,
            'adresse_entreprise' => $request->adresse_postale,
            'contact_entreprise' => $request->contact_entreprise,
            'email_entreprise' => $request->email_entreprise,
            'registre_entreprise' => $request->registre_entreprise,
            'numero_registre' => $request->numero_registre,
            'regime_fiscal' => $request->regime_fiscal,
            'nombre_associes' => $request->nombre_associes,
            'duree_personne_morale' => $request->duree_personne_morale,
            'type_duree' => $request->annee_duree_personne_morale,
            'capital_social' => $request->capital_social,
            'numero_cnps' => $request->numero_cnps,
            'numero_compte_contribuable' => $request->numero_compte_contribuable,
            'branche_activite' => $request->branche_activite_id,
            'type_activite' => $request->type_activite_id,
            'activite_secondaire' => $request->activite_secondaire,
            'raison_social' => $request->raison_social,
            'sigle_ou_enseigne' => $request->sigle_ou_enseigne,
            'objet_social' => $request->objet_social,
            'date_debut_activite' => $request->date_debut_activite,
            'departement' => $request->departement,
            'sous_prefecture' => $request->sous_prefecture_id,
            'commune' => $request->commune_id,
            'quartier' => $request->quartier,
            'village' => $request->village,
            'numero_lot' => $request->numero_lot,
            'numero_ilot' => $request->numero_ilot,
            'nombre_compagnon' => $request->nombre_compagnon,
            'nombre_apprentis' => $request->nombre_apprenti,
            'adresse_geographique_entreprise' => $request->lien_google_map,

            'nom_artisan' => $request->nom_artisan,
            'prenoms_artisan' => $request->prenom_artisan,
            'date_naissance_artisan' => $request->date_naissance_artisan,
            'lieu_naissance_artisan' => $request->lieu_naissance_artisan,
            'civilite_artisan' => $request->sexe_artisan,
            'type_piece_artisan' => $request->type_document_id,
            'precise_autre_piece_artisan' => $request->autre_document_artisan,

            'buff_piece_artisan' => $lien_type_document_artisan,
            'buff_avatar_artisan' => $lien_photo_artisan,
            'buff_piece_gerant' => $lien_type_document_gerant,
            'buff_avatar_gerant' => $lien_photo_gerant,
            'buff_signature_artisan' => $signature,

            'extdocartis' => $extdocartis,
            'extavatartis' => $extavatartis,
            'extdocgeran' => $extdocgeran,
            'extavatgeran' => $extavatgeran,
            'extsignartis' => $extsignartis,

            'numero_piece_artisan' => $request->numero_document_artisan,
            'lieu_piece_artisan' => $request->lieu_delivrance_document_artisan,
            'date_piece_artisan' => $request->date_delivrance_document_artisan,
            'nationalite_artisan' => $request->nationalite_artisan,
            'adresse_artisan' => $request->adresse_artisan,
            'contact_artisan' => $request->contact_artisan,
            'whatsapp_artisan' => $request->contact_whatsapp,
            'etat_civil_artisan' => $request->etat_civil_artisan,
            'artisan_est_gerant' => $request->etes_gerant,
            'email_artisan' => $request->email_artisan,

            'niveau_etude_artisan' => $request->niveau_etude,
            'classe_artisan' => $request->classe,
            'diplome_artisan' => $request->diplome_etude_obtenu,
            'apprentissage_metier_artisant' => $request->apprentissage_metier,
            'niveau_metier_artisan' => $request->niveau_metier_artisan,
            'diplome_metier_artisan' => $request->diplome_metier_obtenu,
            'diplome_cnmci_artisan' => $request->diplome_cnmci,
            'nom_gerant' => $request->nom_gerant,
            'prenoms_gerant' => $request->prenom_gerant,
            'date_naissance_gerant' => $request->date_naissance_gerant,
            'lieu_naissance_gerant' => $request->lieu_naissance_gerant,
            'civilite_gerant' => $request->sexe_gerant,
            'type_piece_gerant' => $request->gerant_type_document_id,

            'precise_autre_piece_gerant' => $request->autre_document_gerant,
            'numero_piece_gerant' => $request->numero_document_gerant,
            'lieu_piece_gerant' => $request->lieu_delivrance_document_gerant,

            'date_piece_gerant' => $request->date_delivrance_document_gerant,
            'nationalite_gerant' => $request->nationalite_gerant,
            'adresse_gerant' => $request->adresse_gerant,
            'contact_gerant' => $request->contact_gerant,
            'whatsapp_gerant' => $request->contact_whatsapp_gerant,
            'niveau_etude_gerant' => $request->niveau_etude_gerant,
            'classe_gerant' => $request->classe_gerant,
            'diplome_gerant' => $request->diplome_etude_obtenu_gerant,
            'apprentissage_metier_gerant' => $request->apprentissage_metier_gerant,
            'niveau_metier_gerant' => $request->niveau_metier_gerant,
            'diplome_metier_gerant' => $request->diplome_metier_obtenu_gerant,
            'diplome_cnmci_gerant' => $request->diplome_cnmci_gerant,
            'etat_civil_gerant' => $request->etat_civil_gerant,
            'email_gerant' => $request->email_gerant,

            'declare_maitrise_metier' => $request->declaration_maitrise_metier,
            'declare_non_condamnation' => $request->declaration_honneur,
            'accepte_confidentialite' => $request->accepte_confidentialite,
        ];
        // dd($data);
        $reponse = Http::post('http://192.168.100.207:8000/api/cnmci-ws/build-ident', $data);
        $ResJSON = $reponse->json();

        // dd($ResJSON['code']);
        $mess = "";
        // dd('test');

        if ($reponse->status() === 200) {
            if ($ResJSON['code'] === 200) {
                session()->put('identification', $ResJSON['data']);
                toast('Identification éffectuée avec succès !', 'success');
                // dd('tes');
                return redirect()->route('pageSuccess', ['id' => $ResJSON['data']['ID_IDENTIFICATIONS']]);
                // return redirect()->route('accueil');
            } else {
                if ($ResJSON['code'] === 401) {
                    $mess = messageBrut($ResJSON['message']);
                } else {
                    $mess = $ResJSON['message'];
                }
            }
        } else {
            $mess = 'Une erreur inattendue s\'est produite, verifier que vous avez accès à internet, ' .
                'puis reéssayer. erreur ' . $reponse->status();
        }
        toast($mess, 'error');
        return back()->with('error', $mess);
    }
    /* ----------------------- les pages ------------------*/
    public function pageActualite()
    {
        $actualites = Actualite::orderBy('created_at', 'desc')->get();
        $actualiteDays = Actualite::whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->get();
        $actualiteHiers = Actualite::whereDate('created_at', Carbon::yesterday())
            ->orderBy('created_at', 'desc')
            ->get();
        $actualitesAvantHiers = Actualite::whereDate('created_at', '<', Carbon::yesterday())
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($actualitesAvantHiers);
        return view('home.vitrines.actualites.index', compact('actualites', 'actualiteDays', 'actualiteHiers', 'actualitesAvantHiers'));
    }

    public function contact()
    {
        return view('home.vitrines.contacts.index');
    }

    /* ----------------------- Connexions ------------------*/

    public function connexion()
    {
        return view('home.vitrines.login_home');
    }
    public function traitementConnexion(Request $request)
    {

        try {
            // Vérifier si l'e-mail existe dans la table "users"
            $user = User::where('contact', $request->contact)->first();
            // $user = User::all();
            // dd($user);
            if ($user) {
                // Si l'e-mail existe dans la table "user" et le mot de passe est correct, connecter l'utilisateur
                if ($user && password_verify($request->password, $user->password)) {
                    Auth::login($user);

                    // // Vérifier si l'utilisateur connecté a l'un des rôles spécifiques avant de le rediriger
                    // if (Auth::user()->hasRole('artisan')) {
                    //     // Rediriger l'utilisateur vers /dashboard
                    //     $message = "Bienvenue ! " . formatGender(auth()->user()->artisan->sexe_artisan) . "" . auth()->user()->artisan->nom_artisan . " " . auth()->user()->artisan->prenom_artisan . ".";
                    //     toast($message, 'success');
                    //     return redirect()->route('artisan.tableau_de_bord');
                    // } else {
                    //     // Déconnecter l'utilisateur
                    //     Auth::logout();
                    //     $request->session()->invalidate();
                    //     $request->session()->regenerateToken();
                    //     toast('Connecté vous ici ', 'warning');
                    //     return redirect()->route('login');

                    //     return redirect()->route('dashboard'); // administrateur
                    // }
                } else {
                    // Si l'e-mail n'est pas trouvé dans la table "users" ou le mot de passe est incorrect, afficher un message d'erreur
                    // toast('Mot de passe incorrect.', 'error');

                    return back()->withInput()->withErrors(['password' => 'Mot de passe incorrect.']);
                }
            } else {
                return back()->withInput()->withErrors(['contact' => 'Aucun compte associé à ce numéro']);
            }
        } catch (\Exception $e) {
            // Gérer les erreurs
            toast('Une erreur s\'est produite. Veuillez réessayer plus tard.', 'error');
            return back()->withInput()->withErrors(['error' => 'Une erreur s\'est produite. Veuillez réessayer plus tard.']);
        }
    }

    /* ------------------ Page de succes identification   -------------------*/
    public function pageSuccess($id) {
        $data = session()->get('identification');
        // dd($data);
        return view('home.vitrines.succes', compact('data'));
    }



    /*----- Formulaire de connexion des deux entité  ------ */



}
