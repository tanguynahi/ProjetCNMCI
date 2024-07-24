<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
// use App\Models\Taxe;
use App\Models\User;
use App\Models\Gerant;
use App\Models\Artisan;
use App\Models\Commune;
use App\Models\Facturation;
use Illuminate\Http\Request;
use App\Models\Identification;
use App\Models\TypeEntreprise;
use Illuminate\Support\Carbon;
use App\Models\ActiviteArtisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreIdentificationRequest;
use App\Http\Requests\UpdateIdentificationRequest;
use App\Notifications\PaiementDroitInscriptionArtisan;

class IdentificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $identifications = Identification::orderBy('created_at', 'desc')->get();
        return view('dashboard.identifications.index', compact('identifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdentificationRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Identification $identification)
    {
        return view('dashboard.identifications.show', compact('identification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Identification $identification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdentificationRequest $request, Identification $identification)
    {
        //
    }


    public function accepterIdentification(Identification $identification)
    {


        try {
            DB::beginTransaction();
            if ($identification->ID_ADMINISTRATEUR == null) {
                $identification->update([
                    'ID_ADMINISTRATEUR' => auth()->user()->administrateur->id,
                    'MOTIFS_REJET' => "Acceptée",
                ]);
                // $identification->administrateur_id = auth()->user()->administrateur->id;
                // $identification->avis = "Acceptée";
                // $identification->save();
                // dd($identification->administrateur_id);
            }

            $typeEntrepise = TypeEntreprise::where('ID_TYPE_ENTREPRISES', $identification->type_entreprise_id)
                ->select('ID_GROUPES')
                ->first();

            $groupeId = $typeEntrepise->ID_GROUPES;

            $taxe = Taxe::where('ID_GROUPES', $groupeId)->first();

            $user = User::create([
                'NOM' => $identification->nom_artisan,
                'PRENOMS' => $identification->prenom_artisan,
                'CONTACT' => $identification->contact_artisan,
                'ADR_EMAIL' => $identification->email_artisan,
                'ADRESSE' => $identification->adresse_artisan,
                'CIVILITE' => $identification->sexe_artisan,
                'AVATAR' => $identification->lien_photo_artisan ?? '',
                'DATE_NAISS' => $identification->date_naissance_artisan,
                'LIEU_NAISS' => $identification->lieu_naissance_artisan,
                // 'MOT_DE_PASSE' => Hash::make('12345678')
            ]);

            $user->assignRole('artisan');

            $artisan = Artisan::create([
                'ID_CHAMBRE_REGION' => $identification->ID_CHAMBRE_REGION,
                'ID_USERS' => $user->id,
                // 'nom' => $identification->nom_artisan,
                // 'prenom' => $identification->prenom_artisan,
                // 'date_naissance' => $identification->date_naissance_artisan,
                // 'lieu_naissance' => $identification->lieu_naissance_artisan,
                // 'sexe' => $identification->sexe_artisan,
                'ID_TYPE_DOCS' => $identification->ID_TYPE_DOCS_ARTIS,
                'LIEN_TYPE_DOCS' => $identification->LIEN_TYPE_DOCS_ARTIS,
                'AUTRE_DOCS' => $identification->AUTRE_DOCS_ARTIS,
                'NUMERO_DOCS' => $identification->NUM_DOCS_ARTIS,
                'LIEU_DELIVRE_DOCS' => $identification->LIEU_DELIVRE_DOCS_ARTIS,
                'DATE_DELIVRE_DOCS' => $identification->DATE_DELIVRE_DOCS_ARTIS,
                'NATIONALITE' => $identification->NATIONALITE_ARTIS,
                'ADRESSE' => $identification->ADRESSE_ARTIS,
                'CONTACT' => $identification->CONTACT_ARTIS,
                'CONTACT_WHATSAPP' => $identification->CONTACT_WHATSAPP_ARTIS,
                'ETAT_CIVIL' => $identification->ETAT_CIVIL_ARTIS,
                'ADR_EMAIL' => $identification->ADR_EMAIL_ARTIS,
                'AVATAR' => $identification->AVATAR_ARTIS ?? '',
                'NIVEAU_ETUDE' => $identification->NIVEAU_ETUDE_ARTIS,
                'CLASSE_ARTIS' => $identification->CLASSE_ARTIS,
                'DIPLOME_ETD_OBT' => $identification->DIPLOME_OBT_ARTIS,
                'APPRENTISS_MET' => $identification->APPRENTISS_MET_ARTIS,
                'NIVEAU_METIER' => $identification->NIVEAU_METIER_ARTIS,
                'DIPLOME_METIER_OBT' => $identification->DIPLOME_METIER_OBT_ARTIS,
                'DIPLOME_CNMCI' => $identification->DIPLOME_CNMCI_ARTIS,
                'SIGNATURE' => $identification->SIGNATURE,
                'DECLARE_MAITRISE_METIER' => $identification->DECLARE_MAITRISE_METIER,
                'DECLARE_NON_CONDAMNATION' => $identification->DECLARE_NON_CONDAMNATION,
                'ACCEPTE_CONFIDENTIAL' => $identification->ACCEPTE_CONFIDENTIAL,
                'EST_GERANT' => $identification->EST_GERANT,
                'NUMERO_REGISTRE' => $identification->NUMERO_REGISTRE,
                'TYPE_REGISTRE' => $identification->TYPE_REGISTRE,

            ]);

            if ($artisan) {

                $activiteartisan = ActiviteArtisan::create([
                    'ID_CHAMBRE_REGION' => $identification->ID_CHAMBRE_REGION,
                    'ID_TYPE_ENTREPRISES' => $identification->ID_TYPE_ENTREPRISES,
                    'ID_ARTISANS' => $artisan->id,
                    'NUMERO_IDENT' => $identification->NUMERO_IDENT,
                    'DENOMINATION' => $identification->DENOMINATION,
                    'ADRESSE_POSTAL' => $identification->ADRESSE_POSTAL,
                    'CONTACT' => $identification->CONTACT,
                    'ADR_EMAIL' => $identification->ADR_EMAIL,
                    'REGIME_FISCALE' => $identification->REGIME_FISCALE,
                    'NB_ASSOCIES' => $identification->NB_ASSOCIES,
                    'DUREE_PERS_MORAL' => $identification->DUREE_PERS_MORAL,
                    'TYPE_DUREE' => $identification->TYPE_DUREE,
                    'CAPITAL_SOCIAL' => $identification->CAPITAL_SOCIAL,
                    'NUMERO_CNPS' => $identification->NUMERO_CNPS,
                    'NUM_COMPTE_CONT' => $identification->NUM_COMPTE_CONT,
                    'ID_BRANCHES' => $identification->ID_BRANCHES,
                    'ID_TYPE_ACTIVITES' => $identification->ID_TYPE_ACTIVITES,
                    'ACTIVITE_SECONDAIRE' => $identification->ACTIVITE_SECONDAIRE,
                    'RAISON_SOCIALE' => $identification->RAISON_SOCIALE,
                    'SIGLE' => $identification->SIGLE,
                    'OBJET_SOCIAL' => $identification->OBJET_SOCIAL,
                    'DATE_DEBT_ACTIVITE' => $identification->DATE_DEBT_ACTIVITE,
                    'LIB_DEPARTEMENT' => $identification->LIB_DEPARTEMENT,
                    'ID_SOUS_PREFECTURE' => $identification->ID_SOUS_PREFECTURE,
                    'ID_COMMUNE' => $identification->ID_COMMUNE,
                    'QUARTIER' => $identification->QUARTIER,
                    'VILLAGE' => $identification->VILLAGE,
                    'NUM_LOT' => $identification->NUM_LOT,
                    'NUM_ILOT' => $identification->NUM_ILOT,
                    'NB_COMPAGNON' => $identification->NB_COMPAGNON ?? 0,
                    'NB_APPRENTIS' => $identification->NB_APPRENTIS ?? 0,
                    'LIEN_MAP'=>$identification->LIEN_MAP,
                ]);

                $gerant = Gerant::create([
                    'ID_CHAMBRE_REGION' => $identification->ID_CHAMBRE_REGION,
                    'ID_ARTISANS' => $artisan->id,
                    'ID_ACTIVITES_ARTIS' => $activiteartisan->id,
                    'NOM' => $identification->NOM_GERAN,
                    'PRENOM_GERAN' => $identification->PRENOM_GERAN,
                    'DATE_NAISS' => $identification->DATE_NAI_GERAN,
                    'LIEU_NAISS' => $identification->LIEU_NAISS_GERAN,
                    'CIVILITE' => $identification->CIVILITE_GERAN,
                    'ID_TYPE_DOCS' => $identification->ID_TYPE_DOCS_GERAN,
                    'LIEN_TYPE_DOCS' => $identification->LIEN_TYPE_DOCS_GERAN,
                    'AUTRE_DOCS' => $identification->AUTRE_DOCS_GERAN,
                    'NUMERO_DOCS' => $identification->NUM_DOCS_GERAN,
                    'LIEU_DELIVRE_DOCS' => $identification->LIEU_DELIVRE_DOCS_GERAN,
                    'DATE_DELIVRE_DOCS' => $identification->DATE_DELIVRE_DOCS_GERAN,
                    'NATIONALITE' => $identification->NATIONALITE_GERAN,
                    'ADRESSE' => $identification->ADRESSE_GERAN,
                    'CONTACT' => $identification->CONTACT_GERAN,
                    'CONTACT_WHATSAPP' => $identification->CONTACT_WHATSAPP_GERAN,
                    'NIVEAU_ETUDE' => $identification->NIVEAU_ETUDE_GERAN,
                    'CLASSE_GERAN' => $identification->CLASSE_GERAN,
                    'DIPLOME_OBT' => $identification->DIPLOME_ETD_OBT_GERAN,
                    'APPRENTISS_MET' => $identification->APPRENTISS_MET_GERAN,
                    'NIVEAU_METIER' => $identification->NIVEAU_METIER_GERAN,
                    'DIPLOME_MET_OBT_GERAN' => $identification->DIPLOME_MET_OBT_GERAN,
                    'DIPLOME_CNMCI' => $identification->DIPLOME_CNMCI_GERAN,
                    'ETAT_CIVIL' => $identification->ETAT_CIVIL_GERAN,
                    'ADR_EMAIL' => $identification->ADR_EMAIL_GERAN,
                    'AVATAR' => $identification->AVATAR_GERAN ?? '',
                ]);

                // Obtenir la date actuelle
                $dateDebut = Carbon::now();

                // Calculer la date de fin (dans 3 mois)
                $dateFin = $dateDebut->copy()->addMonths(3);

                $facturation = Facturation::create([
                    'chambre_regionale_id' => $identification->chambre_regionale_id,
                    'taxe_id' => $taxe->id,
                    'groupe_id' => $groupeId,
                    'activite_artisan_id' => $activiteartisan->id,
                    'entite_id' => $artisan->id,
                    'libelle' => $taxe->libelle,
                    'total_apayer' => $taxe->montant,
                    'reste_apayer' => $taxe->montant,
                    'total_payer' => 0,
                    'date_debut' => $dateDebut,
                    'date_fin' => $dateFin,
                    'date_facturation' => $dateDebut,
                ]);


                $taxeCarteMembre = Taxe::where('groupe_id', 3)->first();

                $nombreEmploye = ($identification->nombre_apprenti + $identification->nombre_compagnon);

                $facturation2 = null;


                if ($nombreEmploye > 0) {
                    $montantTaxe = $taxeCarteMembre->montant * $nombreEmploye;

                    $facturation2 = Facturation::create([
                        'chambre_regionale_id' => $identification->chambre_regionale_id,
                        'taxe_id' => $taxeCarteMembre->id,
                        'groupe_id' => $taxeCarteMembre->groupe_id,
                        'activite_artisan_id' => $activiteartisan->id,
                        'entite_id' => $artisan->id,
                        'libelle' => $taxeCarteMembre->libelle,
                        'total_apayer' => $montantTaxe,
                        'reste_apayer' => $montantTaxe,
                        'total_payer' => 0,
                        'date_debut' => $dateDebut,
                        'date_fin' => $dateFin,
                        'date_facturation' => $dateDebut,
                    ]);
                }

                // Générer le lien de validation

                if (!empty($facturation) && !empty($facturation2)) {
                    $lienDeValidation = URL::temporarySignedRoute(
                        'attente.paiement',
                        now()->addHours(24), // Définissez la durée de validité du lien
                        ['idinscription' => $facturation->id, 'idcartemembre' => $facturation2->id]
                    );
                    $artisan->notify(new PaiementDroitInscriptionArtisan($artisan, $lienDeValidation));
                } else if (!empty($facturation) && empty($facturation2)) {
                    $lienDeValidation = URL::temporarySignedRoute(
                        'attente.paiement',
                        now()->addHours(24), // Définissez la durée de validité du lien
                        ['idinscription' => $facturation->id]
                    );
                    $artisan->notify(new PaiementDroitInscriptionArtisan($artisan, $lienDeValidation));
                }

                // Envoi du mail de validation

            } else {
                DB::rollBack();
                toast('Identification refusée, Veuillez réessayer', 'error');
                return redirect()->back();
            }

            DB::commit(); // Valider la demande de souscription

            toast('Identification acceptée avec succes!', 'success');

            return redirect()->route('identifications.index', $identification);
        } catch (\Throwable $e) {

            DB::rollBack(); // Annuler l'approbation de la demande

            // Loguer l'erreur
            Log::error('Erreur lors de la validation de l\'identification : ' . $e->getMessage());

            toast('Une erreur s\'est produite, Veuillez réessayer', 'error');
            return redirect()->back();
        }
    }

    public function refuserIdentification(Request $request, Identification $identification)
    {
        // Définir les règles de validation
        $rules = [
            'motif_refus' => 'required|string|min:3',
        ];

        // Définir les messages de validation personnalisés
        $messages = [
            'motif_refus.required' => 'Le motif du refus est requis.',
            'motif_refus.string' => 'Le motif du refus doit être une chaîne de caractères.',
            'motif_refus.min' => 'Le motif du refus doit avoir au moins 3 caractères.',
        ];

        // Appliquer la validation
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // Rediriger avec les erreurs de validation et les données de la session
            toast('Veuillez renseigner le motif du refus svp!', 'error');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $identification->administrateur_id = auth()->user()->administrateur->id;
            $identification->avis = "Refusée";
            $identification->motif_refus = $request->motif_refus;
            $identification->save();

            DB::commit();

            toast('Inscription rejetée avec succes!', 'success');

            return redirect()->route('identifications.show', $identification);
        } catch (\Throwable $e) {
            //throw $e;
            DB::rollBack(); // Rejetée l'approbation de la demande

            // Loguer l'erreur
            Log::error('Erreur lors du refus de l\'inscription : ' . $e->getMessage());

            toast('Une erreur s\'est produite, Veuillez réessayer', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Identification $identification)
    {
        //
    }
}
