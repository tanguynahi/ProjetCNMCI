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
use App\Models\BrancheActivite;
// use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\ArtisanConnexionRequest;
use App\Models\ChambreRegionale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIdentificationRequest;

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
        $brancheActivites = BrancheActivite::orderBy('libelle', 'ASC')->get();
        $typeActivites = TypeActivite::orderBy('libelle', 'ASC')->get();
        $typeEntreprises = TypeEntreprise::orderBy('libelle', 'ASC')->get();
        $sousPrefectures = SousPrefecture::orderBy('libelle', 'ASC')->get();
        $typeDocuments = TypeDocument::orderBy('libelle', 'ASC')->get();
        $communes = Commune::orderBy('libelle', 'ASC')->get();
        return view('home.vitrines.inscription', compact('communes', 'typeDocuments', 'sousPrefectures', 'typeActivites', 'typeEntreprises', 'chambresRegionales','brancheActivites'));
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
            //StoreIdentificationRequest
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
                'ID_CHAMBRE_REGION' => $commune->chambre_regionale_id,
                'ID_TYPE_ENTREPRISES' => $request->type_entreprise_id,
                'NUMERO_IDENT' => $identifiant,
                'DENOMINATION' => $request->denomination_entreprise,
                'ADRESSE_POSTAL' => $request->adresse_postale,
                'CONTACT' => $request->contact_entreprise,
                'ADR_EMAIL' => $request->email_entreprise,
                'TYPE_REGISTRE' => $request->registre_entreprise,
                'NUMERO_REGISTRE' => $request->numero_registre,
                'REGIME_FISCALE' => $request->regime_fiscal,
                'NB_ASSOCIES' => $request->nombre_associes,
                'DUREE_PERS_MORAL' => $request->duree_personne_morale,
                'TYPE_DUREE' => $request->annee_duree_personne_morale,
                'CAPITAL_SOCIAL' => $request->capital_social,
                'NUMERO_CNPS' => $request->numero_cnps,
                'NUM_COMPTE_CONT' => $request->numero_compte_contribuable,
                'ID_BRANCHES' => $request->branche_activite_id,
                'ID_TYPE_ACTIVITES' => $request->type_activite_id,
                'ACTIVITE_SECONDAIRE' => $request->activite_secondaire,
                'RAISON_SOCIALE' => $request->raison_social,
                'SIGLE' => $request->sigle_ou_enseigne,
                'OBJET_SOCIAL' => $request->objet_social,
                'DATE_DEBT_ACTIVITE' => $request->date_debut_activite,
                'LIB_DEPARTEMENT' => $request->departement,
                'ID_SOUS_PREFECTURE' => $request->sous_prefecture_id,
                'ID_COMMUNE' => $request->commune_id,
                'QUARTIER' => $request->quartier,
                'VILLAGE' => $request->village,
                'NUM_LOT' => $request->numero_lot,
                'NUM_ILOT' => $request->numero_ilot,
                'NB_COMPAGNON' => $request->nombre_compagnon,
                'NB_APPRENTIS' => $request->nombre_apprenti,
                'LIEN_MAP' => $request->lien_google_map,
                'NOM_ART' => $request->nom_artisan,
                'PRENOMS_ARTIS' => $request->prenom_artisan,
                'DATE_NAISS_ARTIS' => $request->date_naissance_artisan,
                'LIEU_NAISS_ARTIS' => $request->lieu_naissance_artisan,
                'CIVILITE_ARTIS' => $request->sexe_artisan,
                'ID_TYPE_DOCS_ARTIS' => $request->type_document_id,
                'LIEN_TYPE_DOCS_ARTIS' => $lien_type_document_artisan,
                'AUTRE_DOCS_ARTIS' => $request->autre_document_artisan,
                'NUM_DOCS_ARTIS' => $request->numero_document_artisan,
                'LIEU_DELIVRE_DOCS_ARTIS' => $request->lieu_delivrance_document_artisan,
                'DATE_DELIVRE_DOCS_ARTIS' => $request->date_delivrance_document_artisan,
                'NATIONALITE_ARTIS' => $request->nationalite_artisan,
                'ADRESSE_ARTIS' => $request->adresse_artisan,
                'CONTACT_ARTIS' => $request->contact_artisan,
                'CONTACT_WHATSAPP_ARTIS' => $request->contact_whatsapp,
                'ETAT_CIVIL_ARTIS' => $request->etat_civil_artisan,
                'EST_GERANT' => $request->etes_gerant,
                'ADR_EMAIL_ARTIS' => $request->email_artisan,
                'AVATAR_ARTIS' => $lien_photo_artisan,
                'NIVEAU_ETUDE_ARTIS' => $request->niveau_etude,
                'CLASSE_ARTIS' => $request->classe,
                'DIPLOME_OBT_ARTIS' => $request->diplome_etude_obtenu,
                'APPRENTISS_MET_ARTIS' => $request->apprentissage_metier,
                'NIVEAU_METIER_ARTIS' => $request->niveau_metier_artisan,
                'DIPLOME_METIER_OBT_ARTIS' => $request->diplome_metier_obtenu,
                'DIPLOME_CNMCI_ARTIS' => $request->diplome_cnmci,
                'NOM_GERAN' => $request->nom_gerant,
                'PRENOM_GERAN' => $request->prenom_gerant,
                'DATE_NAI_GERAN' => $request->date_naissance_gerant,
                'LIEU_NAISS_GERAN' => $request->lieu_naissance_gerant,
                'CIVILITE_GERAN' => $request->sexe_gerant,
                'ID_TYPE_DOCS_GERAN' => $request->gerant_type_document_id,
                'LIEN_TYPE_DOCS_GERAN' => $lien_type_document_gerant,
                'AUTRE_DOCS_GERAN' => $request->autre_document_gerant,
                'NUM_DOCS_GERAN' => $request->numero_document_gerant,
                'LIEU_DELIVRE_DOCS_GERAN' => $request->lieu_delivrance_document_gerant,
                'DATE_DELIVRE_DOCS_GERAN' => $request->date_delivrance_document_gerant,
                'NATIONALITE_GERAN' => $request->nationalite_gerant,
                'ADRESSE_GERAN' => $request->adresse_gerant,
                'CONTACT_GERAN' => $request->contact_gerant,
                'CONTACT_WHATSAPP_GERAN' => $request->contact_whatsapp_gerant,
                'NIVEAU_ETUDE_GERAN' => $request->niveau_etude_gerant,
                'CLASSE_GERAN' => $request->classe_gerant,
                'DIPLOME_ETD_OBT_GERAN' => $request->diplome_etude_obtenu_gerant,
                'APPRENTISS_MET_GERAN' => $request->apprentissage_metier_gerant,
                'NIVEAU_METIER_GERAN' => $request->niveau_metier_gerant,
                'DIPLOME_MET_OBT_GERAN' => $request->diplome_metier_obtenu_gerant,
                'DIPLOME_CNMCI_GERAN' => $request->diplome_cnmci_gerant,
                'ETAT_CIVIL_GERAN' => $request->etat_civil_gerant,
                'ADR_EMAIL_GERAN' => $request->email_gerant,
                'AVATAR_GERAN' => $lien_photo_gerant,
                'DECLARE_MAITRISE_METIER' => $request->declaration_maitrise_metier,
                'DECLARE_HONNEUR' => $request->declaration_honneur,
                'ACCEPTE_CONFIDENTIAL' => $request->accepte_confidentialite,
                'SIGNATURE' => $signature,
                // 'avis' => $request->avis,
                // 'motif_refus' => $request->motif_refus,
                'STATUT' => 1,


            ]);

            if ($request->etes_gerant == "oui") {

                $lien_photo_gerant =  $lien_photo_artisan;
                $identification->update([
                    'AVATAR_GERAN' => $lien_photo_gerant,
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
