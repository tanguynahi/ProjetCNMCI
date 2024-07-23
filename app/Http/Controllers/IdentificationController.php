<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
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
            if ($identification->administrateur_id == null) {
                $identification->update([
                    'administrateur_id' => auth()->user()->administrateur->id,
                    'avis' => "Acceptée",
                ]);
                // $identification->administrateur_id = auth()->user()->administrateur->id;
                // $identification->avis = "Acceptée";
                // $identification->save();
                // dd($identification->administrateur_id);
            }

            $typeEntrepise = TypeEntreprise::where('id', $identification->type_entreprise_id)
                ->select('groupe_id')
                ->first();

            $groupeId = $typeEntrepise->groupe_id;

            $taxe = Taxe::where('groupe_id', $groupeId)->first();

            $user = User::create([
                'contact' => $identification->contact_artisan,
                'email' => $identification->email_artisan,
                'password' => Hash::make('12345678')
            ]);

            $user->assignRole('artisan');

            $artisan = Artisan::create([
                'chambre_regionale_id' => $identification->chambre_regionale_id,
                'user_id' => $user->id,
                'nom' => $identification->nom_artisan,
                'prenom' => $identification->prenom_artisan,
                'date_naissance' => $identification->date_naissance_artisan,
                'lieu_naissance' => $identification->lieu_naissance_artisan,
                'sexe' => $identification->sexe_artisan,
                'type_document_id' => $identification->type_document_id,
                'lien_type_document' => $identification->lien_type_document_artisan,
                'autre_document' => $identification->autre_document_artisan,
                'numero_document' => $identification->numero_document_artisan,
                'lieu_delivrance_document' => $identification->lieu_delivrance_document_artisan,
                'date_delivrance_document' => $identification->date_delivrance_document_artisan,
                'nationalite' => $identification->nationalite_artisan,
                'adresse' => $identification->adresse_artisan,
                'contact' => $identification->contact_artisan,
                'contact_whatsapp' => $identification->contact_whatsapp,
                'etat_civil' => $identification->etat_civil_artisan,
                'email' => $identification->email_artisan,
                'lien_photo' => $identification->lien_photo_artisan ?? '',
                'niveau_etude' => $identification->niveau_etude,
                'classe' => $identification->classe,
                'diplome_etude_obtenu' => $identification->diplome_etude_obtenu,
                'apprentissage_metier' => $identification->apprentissage_metier,
                'niveau_metier' => $identification->niveau_metier_artisan,
                'diplome_metier_obtenu' => $identification->diplome_metier_obtenu,
                'diplome_cnmci' => $identification->diplome_cnmci,
                'declaration_maitrise_metier' => $identification->declaration_maitrise_metier,
                'declaration_honneur' => $identification->declaration_honneur,
                'accepte_confidentialite' => $identification->accepte_confidentialite,
                'registre_entreprise' => $identification->registre_entreprise,
                'numero_registre' => $identification->numero_registre,
                'etes_gerant' => $identification->etes_gerant,

            ]);

            if ($artisan) {

                $activiteartisan = ActiviteArtisan::create([
                    'chambre_regionale_id' => $identification->chambre_regionale_id,
                    'type_entreprise_id' => $identification->type_entreprise_id,
                    'artisan_id' => $artisan->id,
                    'numero_identification' => $identification->numero_identification,
                    'denomination_entreprise' => $identification->denomination_entreprise,
                    'adresse_postale' => $identification->adresse_postale,
                    'contact_entreprise' => $identification->contact_entreprise,
                    'email_entreprise' => $identification->email_entreprise,
                    'regime_fiscal' => $identification->regime_fiscal,
                    'nombre_associes' => $identification->nombre_associes,
                    'duree_personne_morale' => $identification->duree_personne_morale,
                    'annee_duree_personne_morale' => $identification->annee_duree_personne_morale,
                    'capital_social' => $identification->capital_social,
                    'numero_cnps' => $identification->numero_cnps,
                    'numero_compte_contribuable' => $identification->numero_compte_contribuable,
                    'type_activite_id' => $identification->type_activite_id,
                    'activite_secondaire' => $identification->activite_secondaire,
                    'raison_social' => $identification->raison_social,
                    'sigle_ou_enseigne' => $identification->sigle_ou_enseigne,
                    'objet_social' => $identification->objet_social,
                    'date_debut_activite' => $identification->date_debut_activite,
                    'departement' => $identification->departement,
                    'sous_prefecture_id' => $identification->sous_prefecture_id,
                    'commune_id' => $identification->commune_id,
                    'quartier' => $identification->quartier,
                    'village' => $identification->village,
                    'numero_lot' => $identification->numero_lot,
                    'numero_ilot' => $identification->numero_ilot,
                    'nombre_compagnon' => $identification->nombre_compagnon ?? 0,
                    'nombre_apprenti' => $identification->nombre_apprenti ?? 0,
                ]);

                $gerant = Gerant::create([
                    'chambre_regionale_id' => $identification->chambre_regionale_id,
                    'artisan_id' => $artisan->id,
                    'activite_artisan_id' => $activiteartisan->id,
                    'nom' => $identification->nom_gerant,
                    'prenom' => $identification->prenom_gerant,
                    'date_naissance' => $identification->date_naissance_gerant,
                    'lieu_naissance' => $identification->lieu_naissance_gerant,
                    'sexe_gerant' => $identification->sexe_gerant,
                    'type_document_id' => $identification->gerant_type_document_id,
                    'autre_document' => $identification->autre_document_gerant,
                    'numero_document' => $identification->numero_document_gerant,
                    'lieu_delivrance_document' => $identification->lieu_delivrance_document_gerant,
                    'date_delivrance_document' => $identification->date_delivrance_document_gerant,
                    'nationalite_gerant' => $identification->nationalite_gerant,
                    'adresse' => $identification->adresse_gerant,
                    'contact' => $identification->contact_gerant,
                    'contact_whatsapp' => $identification->contact_whatsapp_gerant,
                    'etat_civil' => $identification->etat_civil_gerant,
                    'email' => $identification->email_gerant,
                    'lien_photo' => $identification->lien_photo_gerant ?? '',
                    'niveau_etude' => $identification->niveau_etude_gerant,
                    'classe_gerant' => $identification->classe_gerant,
                    'diplome_etude_obtenu' => $identification->diplome_etude_obtenu_gerant,
                    'apprentissage_metier' => $identification->apprentissage_metier_gerant,
                    'niveau_metier' => $identification->niveau_metier_gerant,
                    'diplome_metier_obtenu' => $identification->diplome_metier_obtenu_gerant,
                    'diplome_cnmci' => $identification->diplome_cnmci_gerant,
                    'lien_photo' => $identification->lien_photo_gerant
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
