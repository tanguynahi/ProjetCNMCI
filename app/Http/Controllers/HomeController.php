<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\User;
use App\Models\Slide;
use App\Models\Artisan;
use App\Models\Commune;
use App\Models\Actualite;
use App\Models\Parametre;
use App\Models\Facturation;
use App\Models\TypeActivite;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use App\Models\Identification;
use App\Models\SousPrefecture;
use App\Models\TypeEntreprise;
use Illuminate\Support\Carbon;
use App\Models\ActiviteArtisan;
use App\Models\ChambreRegionale;
// use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\ArtisanConnexionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
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
    public function inscription()
    {
        $chambresRegionales = ChambreRegionale::orderBy('libelle', 'ASC')->get();
        $typeEntreprises = TypeEntreprise::orderBy('libelle', 'ASC')->get();
        $typeActivites = TypeActivite::orderBy('libelle', 'ASC')->get();
        $sousPrefectures = SousPrefecture::orderBy('libelle', 'ASC')->get();
        $typeDocuments = TypeDocument::orderBy('libelle', 'ASC')->get();
        $communes = Commune::orderBy('libelle', 'ASC')->get();
        return view('home.vitrines.inscription', compact('communes', 'typeDocuments', 'sousPrefectures', 'typeActivites', 'typeEntreprises', 'chambresRegionales'));
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

    public function identification(Request $request)
    {
        // $request->validate([
        //     'message' => 'required|string',
        //     'lien_document' => 'nullable'
        // ]);
        // dd($request->signature);
        try {
            DB::beginTransaction();
            // DB::beginTransaction();
            $signature = null;
            $lien_type_document_artisan = null;
            $lien_type_document_gerant = null;
            $lien_photo_artisan = null;
            $lien_photo_gerant = null;
            if ($request->hasFile('lien_type_document_gerant')) {
                $file_name = Carbon::now()->timestamp . '.' . $request->lien_type_document_gerant->extension();
                $request->lien_type_document_gerant->storeAs('images-gerant-typeDocument/', $file_name);
                $lien_type_document_gerant = 'src-files/images-gerant-typeDocument/' . $file_name;
            }
            if ($request->hasFile('lien_type_document_artisan')) {
                $file_name = Carbon::now()->timestamp . '.' . $request->lien_type_document_artisan->extension();
                $request->lien_type_document_artisan->storeAs('images-artisan-typeDocument/', $file_name);
                $lien_type_document_artisan = 'src-files/images-artisan-typeDocument/' . $file_name;
            }
            if ($request->hasFile('lien_photo_artisan')) {
                $file_name = Carbon::now()->timestamp . '.' . $request->lien_photo_artisan->extension();
                $request->lien_photo_artisan->storeAs('images-artisan/', $file_name);
                $lien_photo_artisan = 'src-files/images-artisan/' . $file_name;
            }
            if ($request->hasFile('lien_photo_gerant')) {
                $file_name = Carbon::now()->timestamp . '.' . $request->lien_photo_gerant->extension();
                $request->lien_photo_gerant->storeAs('images-gerant/', $file_name);
                $lien_photo_gerant = 'src-files/images-gerant/' . $file_name;
            }
            if ($request->hasFile('signature')) {
                $file_name = Carbon::now()->timestamp . '.' . $request->signature->extension();
                $request->signature->storeAs('images-artisan-signature/', $file_name);
                $signature = 'src-files/images-artisan-signature/' . $file_name;
            }
            // dd($signature);
            $commune = Commune::where('id', $request->commune_id)->first();
            $identifiant = generateCode2('IDEN');
            $identification = Identification::create([
                'chambre_regionale_id' => $commune->chambre_regionale_id,
                'type_entreprise_id' => $request->type_entreprise_id,
                'numero_identification' => $identifiant,
                'denomination_entreprise' => $request->denomination_entreprise,
                'adresse_postale' => $request->adresse_postale,
                'contact_entreprise' => $request->contact_entreprise,
                'email_entreprise' => $request->email_entreprise,
                'registre_entreprise' => $request->registre_entreprise,
                'numero_registre' => $request->numero_registre,
                'regime_fiscal' => $request->regime_fiscal,
                'nombre_associes' => $request->nombre_associes,
                'duree_personne_morale' => $request->duree_personne_morale,
                'annee_duree_personne_morale' => $request->annee_duree_personne_morale,
                'capital_social' => $request->capital_social,
                'numero_cnps' => $request->numero_cnps,
                'numero_compte_contribuable' => $request->numero_compte_contribuable,
                'type_activite_id' => $request->type_activite_id,
                'activite_secondaire' => $request->activite_secondaire,
                'raison_social' => $request->raison_social,
                'sigle_ou_enseigne' => $request->sigle_ou_enseigne,
                'objet_social' => $request->objet_social,
                'date_debut_activite' => $request->date_debut_activite,
                'departement' => $request->departement,
                'sous_prefecture_id' => $request->sous_prefecture_id,
                'commune_id' => $request->commune_id,
                'quartier' => $request->quartier,
                'village' => $request->village,
                'numero_lot' => $request->numero_lot,
                'numero_ilot' => $request->numero_ilot,
                'nombre_compagnon' => $request->nombre_compagnon,
                'nombre_apprenti' => $request->nombre_apprenti,
                'lien_google_map' => $request->lien_google_map,
                'nom_artisan' => $request->nom_artisan,
                'prenom_artisan' => $request->prenom_artisan,
                'date_naissance_artisan' => $request->date_naissance_artisan,
                'lieu_naissance_artisan' => $request->lieu_naissance_artisan,
                'sexe_artisan' => $request->sexe_artisan,
                'type_document_id' => $request->type_document_id,
                'lien_type_document_artisan' => $lien_type_document_artisan,
                'autre_document_artisan' => $request->autre_document_artisan,
                'numero_document_artisan' => $request->numero_document_artisan,
                'lieu_delivrance_document_artisan' => $request->lieu_delivrance_document_artisan,
                'date_delivrance_document_artisan' => $request->date_delivrance_document_artisan,
                'nationalite_artisan' => $request->nationalite_artisan,
                'adresse_artisan' => $request->adresse_artisan,
                'contact_artisan' => $request->contact_artisan,
                'contact_whatsapp' => $request->contact_whatsapp,
                'etat_civil_artisan' => $request->etat_civil_artisan,
                'email_artisan' => $request->email_artisan,
                'lien_photo_artisan' => $lien_photo_artisan,
                'niveau_etude' => $request->niveau_etude,
                'classe' => $request->classe,
                'diplome_etude_obtenu' => $request->diplome_etude_obtenu,
                'apprentissage_metier' => $request->apprentissage_metier,
                'niveau_metier_artisan' => $request->niveau_metier_artisan,
                'diplome_metier_obtenu' => $request->diplome_metier_obtenu,
                'diplome_cnmci' => $request->diplome_cnmci,
                'nom_gerant' => $request->nom_gerant,
                'prenom_gerant' => $request->prenom_gerant,
                'date_naissance_gerant' => $request->date_naissance_gerant,
                'lieu_naissance_gerant' => $request->lieu_naissance_gerant,
                'sexe_gerant' => $request->sexe_gerant,
                'gerant_type_document_id' => $request->gerant_type_document_id,
                'lien_type_document_gerant' => $lien_type_document_gerant,
                'autre_document_gerant' => $request->autre_document_gerant,
                'numero_document_gerant' => $request->numero_document_gerant,
                'lieu_delivrance_document_gerant' => $request->lieu_delivrance_document_gerant,
                'date_delivrance_document_gerant' => $request->date_delivrance_document_gerant,
                'nationalite_gerant' => $request->nationalite_gerant,
                'adresse_gerant' => $request->adresse_gerant,
                'contact_gerant' => $request->contact_gerant,
                'contact_whatsapp_gerant' => $request->contact_whatsapp_gerant,
                'etat_civil_gerant' => $request->etat_civil_gerant,
                'email_gerant' => $request->email_gerant,
                'lien_photo_gerant' => $lien_photo_gerant,
                'niveau_etude_gerant' => $request->niveau_etude_gerant,
                'classe_gerant' => $request->classe_gerant,
                'diplome_etude_obtenu_gerant' => $request->diplome_etude_obtenu_gerant,
                'apprentissage_metier_gerant' => $request->apprentissage_metier_gerant,
                'niveau_metier_gerant' => $request->niveau_metier_gerant,
                'diplome_metier_obtenu_gerant' => $request->diplome_metier_obtenu_gerant,
                'diplome_cnmci_gerant' => $request->diplome_cnmci_gerant,
                'signature' => $signature,
                // 'avis' => $request->avis,
                // 'motif_refus' => $request->motif_refus,
                'declaration_maitrise_metier' => $request->declaration_maitrise_metier,
                'declaration_honneur' => $request->declaration_honneur,
                'accepte_confidentialite' => $request->accepte_confidentialite,
                'etes_gerant' => $request->etes_gerant,

                'status' => 1,
            ]);

            if ($request->etes_gerant == "oui") {

                $lien_photo_gerant =  $lien_photo_artisan;
                $identification->update([
                    'lien_photo_gerant' => $lien_photo_gerant,
                ]);
                // dd($lien_photo_artisan);
            }
            // dd($identification->signature);
            // dd($identification->lien_type_document_gerant ,$identification->lien_type_document_artisan );
            DB::commit();
            toast('Identification éffectuée avec succès !', 'success');
            return redirect()->route('pageSuccess', ['id' => $identification->id]);
        } catch (\Throwable $e) {
            DB::rollback();
            // dd('test');
            toast('Une erreur s\'est produit, Veuillez réessayer.', 'error');
            // Capturer toute autre exception (erreur 500)
            Log::error('Erreur interne du serveur: ' . $e->getMessage());
            return redirect()->back();
        }
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

                    // Vérifier si l'utilisateur connecté a l'un des rôles spécifiques avant de le rediriger
                    if (Auth::user()->hasRole('artisan')) {
                        // Rediriger l'utilisateur vers /dashboard
                        $message = "Bienvenue ! " . formatGender(auth()->user()->artisan->sexe_artisan) . "" . auth()->user()->artisan->nom_artisan . " " . auth()->user()->artisan->prenom_artisan . ".";
                        toast($message, 'success');
                        return redirect()->route('artisan.tableau_de_bord');
                    } else {
                        // Déconnecter l'utilisateur
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        toast('Connecté vous ici ', 'warning');
                        return redirect()->route('login');
                    }
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
    public function pageSuccess($id)
    {
        $identification = Identification::find($id);
        return view('home.vitrines.succes', compact('identification'));
    }
}
