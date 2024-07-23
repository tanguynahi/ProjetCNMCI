@extends('layouts.dashboard', ['title' => 'Détails Identifications'])
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/select2/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Admins List Table -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title mb-0">Infos de l'identification</h5>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('identifications.index') }}" class="btn btn-primary">Retour</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-lg-12 col-md-12">
                            <div class="row d-flex flex-column flex-lg-row">
                                @php
                                    $imgUrl = $identification->lien_photo_artisan
                                        ? asset($identification->lien_photo_artisan)
                                        : asset('assets/dashboard/img/avatars/1.png');
                                    $imgUrl2 = $identification->lien_photo_gerant
                                        ? asset($identification->lien_photo_gerant)
                                        : asset('assets/dashboard/img/avatars/2.png');

                                    $avisBadge = '';

                                    if ($identification->avis == 'En Attente') {
                                        $avisBadge =
                                            '<span class="badge bg-label-warning text-capitalized"> En Attente </span>';
                                    } elseif ($identification->avis == 'Acceptée') {
                                        $avisBadge =
                                            '<span class="badge bg-label-success text-capitalized"> Acceptée </span>';
                                    } elseif ($identification->avis == 'Refusée') {
                                        $avisBadge =
                                            '<span class="badge bg-label-danger text-capitalized"> Refusée </span>';
                                    }

                                    $statusBadge =
                                        $identification->status == 1
                                            ? '<span class="badge bg-label-success text-capitalized"> Actif </span>'
                                            : '<span class="badge bg-label-danger text-capitalized"> Inactif </span>';

                                @endphp
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                    <p class="fs-5 fw-bold text-center bg-warning text-white">Renseignements sur la personne
                                        de l'artisan</p>
                                    <div class="row">
                                        <div
                                            class="col-lg-2 col-md-2 text-lg-center text-md-center text-sm-left text-xs-left">
                                            <img src="{{ $imgUrl }}" class="img-fluid rounded" alt="avatar">
                                        </div>
                                        <div class="col-lg-10 col-md-10">
                                            <p>
                                                <span class="fw-bold">Nom & Prénom(s) :</span>
                                                {{ $identification->nom_artisan }}
                                                {{ $identification->prenom_artisan }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Née le :</span>
                                                {{ formatDate($identification->date_naissance_artisan) }}
                                                <span class="fw-bold mx-lg-2 mx-md-2"> à: </span>
                                                {{ $identification->lieu_naissance_artisan }}
                                            </p>
                                            <p>

                                                <span class="fw-bold">Nationalité :</span>
                                                {{ $identification->nationalite_artisan }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Sexe :</span>
                                                {{ $identification->sexe_artisan }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Domicilié à :</span>
                                                {{ $identification->adresse_artisan }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Quartier :</span>
                                                {{ $identification->quartier }}
                                            </p>
                                            <p>
                                                <span class="fw-bold">Pièce d'icentité :</span>
                                                {{ $identification->typeDocument->libelle }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">N° Pièce :</span>
                                                {{ $identification->numero_document_artisan }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Délivré à :</span>
                                                {{ $identification->lieu_delivrance_document_artisan }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Le :</span>
                                                {{ formatDate($identification->date_delivrance_document_artisan) }}
                                            </p>
                                            <p>
                                                <span class="fw-bold">Eta civil :</span>
                                                {{ $identification->etat_civil_artisan }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Contact :</span>
                                                {{ $identification->contact_artisan }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">WathSapp :</span>
                                                {{ $identification->contact_whatsapp }}
                                            </p>
                                            <p>
                                                <span class="fw-bold">Email :</span>
                                                {{ $identification->email_artisan }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                    <p class="fs-5 fw-bold text-center bg-warning text-white">Renseignement sur la formation
                                        professionnelle
                                        l'artisan</p>
                                    <p>
                                        <span class="fw-bold">Niveau d'étude :</span> {{ $identification->niveau_etude }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Classe : </span>
                                        {{ $identification->classe }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Diplôme obtenu : </span>
                                        {{ $identification->diplome_etude_obtenu }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">Apprentissage du métier: </span>
                                        {{ $identification->apprentissage_metier }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Niveau métier : </span>
                                        {{ $identification->niveau_metier_artisan }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Dilpôme métier : </span>
                                        {{ $identification->diplome_metier_obtenu }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">Dilpôme CNMCI : </span>
                                        {{ $identification->diplome_cnmci }}
                                    </p>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                    <p class="fs-5 fw-bold text-center bg-warning text-white">Renseignement sur l'activité
                                    </p>
                                    <p>
                                        <span class="fw-bold">Activité principale exercée :</span>
                                        {{ $identification->typeActivite->libelle }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Activité secondaire : </span>
                                        {{ $identification->activite_secondaire }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Dénomination de l'entreprise : </span>
                                        {{ $identification->denomination_entreprise }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Sigle : </span>
                                        {{ $identification->sigle_ou_enseigne }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">Date de début :</span>
                                        {{ formatDate($identification->date_debut_activite) }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Type d'entreprise : </span>
                                        {{ $identification->typeEntreprise->libelle }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Régime Fiscal : </span>
                                        {{ $identification->regime_fiscal }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">Durée personne morale : </span>
                                        {{ $identification->duree_personne_morale }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Capital social : </span>
                                        {{ $identification->capital_social }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">N° RST (CNPS) : </span>
                                        {{ $identification->numero_cnps }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">N° Compte contribuable :</span>
                                        {{ $identification->numero_compte_contribuable }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Adresse postale : </span>
                                        {{ $identification->adresse_postale }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">Contact : </span>
                                        {{ $identification->contact_entreprise }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Email :</span>
                                        {{ $identification->email_entreprise }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Localisation de l'activité : Département :
                                        </span>
                                        {{ $identification->departement }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">LOT N° :</span> {{ $identification->numero_lot }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">ILOT N° : </span>
                                        {{ $identification->numero_ilot }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Régistre : </span>
                                        {{ $identification->registre_entreprise }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">N° du régistre : </span>
                                        {{ $identification->numero_registre }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">Commune :</span> {{ $identification->commune->libelle }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">S/P : </span>
                                        {{ $identification->sousPrefecture->libelle }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Quartier : </span>
                                        {{ $identification->quartier }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Village : </span>
                                        {{ $identification->village }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Localisation google : </span> <a
                                            href="{{ $identification->lien_google_map }}" target="_blank">Visitez</a>
                                    </p>
                                    <p>
                                        <span class="fw-bold">Nbre d'Associés :</span>
                                        {{ $identification->nombre_associes }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Nbre Compagnons : </span>
                                        {{ $identification->nombre_compagnon }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Nbre d'Apprentis : </span>
                                        {{ $identification->nombre_apprenti }}
                                    </p>

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                    <p class="fs-5 fw-bold text-center bg-warning text-white">Renseignements sur la personne
                                        pouvant engager l'entreprise</p>
                                    <div class="row">
                                        <div
                                            class="col-lg-2 col-md-2 text-lg-center text-md-center text-sm-left text-xs-left">
                                            <img src="{{ $imgUrl2 }}" class="img-fluid rounded" alt="Photo du gerant">
                                        </div>
                                        <div class="col-lg-10 col-md-10">
                                            <p>
                                                <span class="fw-bold">Nom & Prénom(s) :</span>
                                                {{ $identification->nom_gerant }}
                                                {{ $identification->prenom_gerant }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Née le :</span>
                                                {{ formatDate($identification->date_naissance_gerant) }}
                                                <span class="fw-bold mx-lg-2 mx-md-2"> à: </span>
                                                {{ $identification->lieu_naissance_gerant }}
                                            </p>
                                            <p>
                                                <span class="fw-bold">Nationalité :</span>
                                                {{ $identification->nationalite_gerant }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Sexe :</span>
                                                {{ $identification->sexe_gerant }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Domicilié à :</span>
                                                {{ $identification->adresse_gerant }}
                                            </p>
                                            <p>
                                                @php
                                                    $libelleTypeDocumentGerant = \App\Models\TypeDocument::where(
                                                        'id',
                                                        $identification->gerant_type_document_id,
                                                    )->value('libelle');
                                                @endphp
                                                <span class="fw-bold">Pièce d'icentité :</span>
                                                {{ $libelleTypeDocumentGerant }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">N° Pièce :</span>
                                                {{ $identification->numero_document_gerant }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Délivré à :</span>
                                                {{ $identification->lieu_delivrance_document_gerant }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Le :</span>
                                                {{ formatDate($identification->date_delivrance_document_gerant) }}
                                            </p>
                                            <p>
                                                <span class="fw-bold">Eta civil :</span>
                                                {{ $identification->etat_civil_gerant }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">Contact :</span>
                                                {{ $identification->contact_gerant }}
                                                <span class="fw-bold mx-lg-2 mx-md-2">WathSapp :</span>
                                                {{ $identification->contact_whatsapp_gerant }}
                                            </p>
                                            <p>
                                                <span class="fw-bold">Email :</span>
                                                {{ $identification->email_gerant }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                                    <p class="fs-5 fw-bold text-center bg-warning text-white">Renseignement sur la
                                        formation
                                        professionnelle
                                        du gerant</p>
                                    <p>
                                        <span class="fw-bold">Niveau d'étude :</span>
                                        {{ $identification->niveau_etude_gerant }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Classe : </span>
                                        {{ $identification->classe_gerant }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Diplôme obtenu : </span>
                                        {{ $identification->diplome_etude_obtenu_gerant }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">Apprentissage du métier: </span>
                                        {{ $identification->apprentissage_metier_gerant }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Niveau métier : </span>
                                        {{ $identification->niveau_metier_gerant }}
                                        <span class="fw-bold mx-lg-2 mx-md-2">Dilpôme métier : </span>
                                        {{ $identification->diplome_metier_obtenu_gerant }}
                                    </p>
                                    <p>
                                        <span class="fw-bold">Dilpôme CNMCI : </span>
                                        {{ $identification->diplome_cnmci_gerant }}
                                    </p>
                                </div>
                            </div>

                            <div class="row align-items-center mb-3">

                                <div class="col-lg-4 col-md-4 col-sm-12 pt-2">
                                    @if ($identification->avis == 'Acceptée')
                                        <p><span class="fs-5">État : </span><u><span
                                                    class="text-success fs-5 fw-bold">Acceptée</span></u></p>
                                    @endif

                                    @if ($identification->avis == 'En Attente')
                                        <p><span class="fs-5">État : </span><u><span
                                                    class="text-warning fs-5 fw-bold">En
                                                    attente</span></u></p>
                                    @endif

                                    @if ($identification->avis == 'Refusée')
                                        <p><span class="fs-5">État : </span><u><span
                                                    class="text-danger fs-5 fw-bold">Refusée</span></u></p>
                                    @endif
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="d-flex">
                                        @if ($identification->avis == 'En Attente')
                                            <a id="btn_rejeter" class="btn btn-outline-danger mx-2 fw-bold"><i
                                                    class="fa fa-close me-1"></i>
                                                Refusée</a>
                                            <a id="btn_approuver" class="btn btn-outline-success mx-2 fw-bold"><i
                                                    class="fa fa-check me-1"></i> Acceptée</a>
                                        @endif
                                    </div>
                                </div>

                                {{-- MODAL DE VALIDATION DE DEMANDE DE SOUSCRIPTION POUR PRODUIT --}}
                                <!-- Modal accepterIdentificationModal-->
                                @if ($identification->avis == 'En Attente')
                                    <div class="modal fade flip" id="accepterIdentificationModal" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body p-5 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                        colors="primary:#405189,secondary:#f06548"
                                                        style="width:90px;height:90px">
                                                    </lord-icon>
                                                    <div class="mt-4 text-center">
                                                        <h4>Vous êtes sur le point d'acceptée <br>une demande d'inscription
                                                            ?
                                                        </h4>
                                                        <p class="text-muted fs-15 mb-4">
                                                            Voulez-vous, poursuivre cette opération
                                                        </p>
                                                        <div class="hstack gap-2 justify-content-center remove">
                                                            <button
                                                            class="btn btn-link link-success fw-medium text-decoration-none"
                                                            id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                                class="ri-close-line me-1 align-middle"></i> Non</button>

                                                            <form action="{{ route('accepter.identification', $identification->id) }}"
                                                                method="POST" id="accepter_identification_artisan">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn btn-danger" id="accepter_identification">Oui</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal -->

                                    <div class="modal fade flip" id="rejeterDemandeModal" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body p-5 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                        colors="primary:#405189,secondary:#f06548"
                                                        style="width:90px;height:90px">
                                                    </lord-icon>
                                                    <div class="mt-4 text-center">
                                                        <h4>Vous êtes sur le point de refusée <br>une demande de
                                                            d'inscription ?
                                                        </h4>
                                                        <p class="text-muted fs-15 mb-4">
                                                            Voulez-vous, poursuivre cette opération
                                                        </p>
                                                        <div class="hstack gap-2 justify-content-center remove">
                                                            <button
                                                                class="btn btn-link link-success fw-medium text-decoration-none"
                                                                id="AnnulerRecord-close" data-bs-dismiss="modal"><i
                                                                    class="ri-close-line me-1 align-middle"></i>
                                                                Annuler</button>

                                                            <button type="submit" class="btn btn-danger"
                                                                id="refuser_identification">Oui</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($identification->avis == 'En Attente')
                                    <form action="{{ route('refuser.identification', $identification->id) }}"
                                        method="POST" id="refuser_identification_artisan"
                                        class="needs-validation @if ($errors->has('motif_refus')) was-validated @endif"
                                        novalidate style="@if (!$errors->has('motif_refus')) display: none; @endif">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-center">
                                            <div class="col-10">
                                                <label for="motif_refus" class="form-label">Motif du refus<span
                                                        class="text-danger fw-bold">*</span></label>
                                                <textarea name="motif_refus" id="motif_refus"
                                                    class="form-control no-resize @error('motif_refus') is-invalid @enderror" rows="4"
                                                    placeholder="Entrer le motif" autocomplete="motif_refus" autofocus required>{{ old('motif_refus') }}</textarea>
                                                @error('motif_refus')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p><span class="text-danger fw-bold">*</span>Champs obligatoires.</p>
                                        </div>
                                        <div class="row g-3 ">
                                            <div class="col-10">
                                                <div class="mx-auto d-flex justify-content-center">

                                                    <a id="btn_annuler" href=""
                                                        class="btn btn-danger text-white  mx-2">Annuler</a>
                                                    <a id="btn_valider_rejet"
                                                        class="btn btn-success text-white  mx-2">Valider</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                            @if ($identification->avis == 'Refusée')
                                <div class="row">
                                    <h6><u>Motif du refut :</u></h6>
                                    <div class="col-12">
                                        <p class="fs-6">{{ $identification->motif_refus }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Vendors JS -->
    <script src="{{ asset('assets/dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <script src="{{ asset('assets/dashboard/vendor/libs/select2/select2.js') }}"></script>

    <script>
        $(document).ready(function() {
            // $('#motif_refus_approbation').siblings('.invalid-feedback').remove();
            $('#motif_refus').siblings('.invalid-feedback').remove();

            $('#btn_rejeter').click(function() {
                $('#refuser_identification_artisan').show();
                // $('#accepter_identification_artisan').hide();
                resetForms(); // Réinitialiser les formulaires
            });

            $('#btn_approuver').click(function(e) { // Empêche le comportement par défaut du lien
                e.preventDefault();
                $('#refuser_identification_artisan').hide();
                $('#accepterIdentificationModal').modal('show');
                resetForms();

            });

            $('#btn_annuler').click(function(e) {
                e.preventDefault(); // Empêche le comportement par défaut du lien
                $('#refuser_identification_artisan').hide();
                // $('#accepter_identification_artisan').hide();
                resetForms(); // Réinitialiser les formulaires
            });

            $('#btn_valider_rejet').click(function(e) {
                e.preventDefault();
                var validationStatusCom = {
                    isValidCom: true
                };

                validatemotif_refusRejet(validationStatusCom)

                if (validationStatusCom.isValidCom) {
                    $('#rejeterDemandeModal').modal('show');
                }
            });

            $("#accepter_identification").click(function(){
                e.preventDefault();
                $('#refuser_identification_artisan').hide();
                $("#accepter_identification_artisan").submit();
            });

            // Affiche un message par défaut lorsque le champ est vide

            // Ecouteurs d'événements pour la saisie

            $('#motif_refus').on('input', function() {
                var validationStatusCom = {
                    isValidCom: true
                };
                validatemotif_refusRejet(validationStatusCom);
            });

            function validatemotif_refusRejet(validationStatusCom) {
                // var validationStatusCom = {
                //     isValidCom: true
                // };

                var motif_refusRejetInput = $('#motif_refus');
                var motif_refusRejetValue = motif_refusRejetInput.val();

                motif_refusRejetInput.removeClass('is-invalid is-valid');
                motif_refusRejetInput.next('.invalid-feedback').remove();

                if (motif_refusRejetValue.trim() === "") {
                    motif_refusRejetInput.addClass('is-invalid');
                    motif_refusRejetInput.after(
                        '<div class="invalid-feedback">Veuillez entrer le motif.</div>');
                    validationStatusCom.isValidCom = false;
                } else if (!/^[a-zA-Z0-9\s'àâäçéèêëîïôöùûüÿÀÂÄÇÉÈÊËÎÏÔÖÙÛÜŸ-]+$/.test(motif_refusRejetValue)) {
                    motif_refusRejetInput.addClass('is-invalid');
                    motif_refusRejetInput.after(
                        '<div class="invalid-feedback">Veuillez entrer un texte valide.</div>');
                    validationStatusCom.isValidCom = false;
                } else if (motif_refusRejetValue.length < 3) {
                    motif_refusRejetInput.addClass('is-invalid');
                    motif_refusRejetInput.after('<div class="invalid-feedback">Minimum 3 caractères.</div>');
                    validationStatusCom.isValidCom = false;
                } else if (motif_refusRejetValue.length >= 3) {
                    motif_refusRejetInput.addClass('is-valid');
                }
            }

            function validatemotif_refus(validationStatus) {
                var motif_refusApprobationInput = $('#motif_refus_approbation');
                var motif_refusValue = motif_refusApprobationInput.val();

                motif_refusApprobationInput.removeClass('is-invalid is-valid');
                motif_refusApprobationInput.next('.invalid-feedback').remove();

                if (motif_refusValue.trim() === "") {
                    return; // Pas de validation nécessaire si vide
                }

                if (!/^[a-zA-Z0-9\s'àâäçéèêëîïôöùûüÿÀÂÄÇÉÈÊËÎÏÔÖÙÛÜŸ-]+$/.test(motif_refusValue)) {
                    motif_refusApprobationInput.addClass('is-invalid');
                    motif_refusApprobationInput.after(
                        '<div class="invalid-feedback">Veuillez entrer un texte valide.</div>');
                    validationStatus.isValid = false;
                } else if (motif_refusValue.length < 3) {
                    motif_refusApprobationInput.addClass('is-invalid');
                    motif_refusApprobationInput.after(
                        '<div class="invalid-feedback">Minimum 3 caractères requis.</div>');
                    validationStatus.isValid = false;
                } else {
                    motif_refusApprobationInput.addClass('is-valid');
                }
            };

            // Réinitialiser les formulaires
            function resetForms() {
                // $('#accepter_identification_artisan')[0].reset(); // Réinitialiser le formulaire d'approbation
                // $('#accepter_identification_artisan').find('.form-text').text(''); // Effacer les messages d'erreur

                $('#refuser_identification_artisan')[0].reset(); // Réinitialiser le formulaire de rejet
                $('#refuser_identification_artisan').find('.form-text').text(''); // Effacer les messages d'erreur

                // Autres champs à réinitialiser si nécessaire
            }

            $("#refuser_identification").click(function(e) {
                e.preventDefault();
                var validationStatusCom = {
                    isValidCom: true
                };

                validatemotif_refusRejet(validationStatusCom);

                if (validationStatusCom.isValidCom) {
                    $("#refuser_identification_artisan").submit();
                } else {
                    $('#rejeterDemandeModal').modal('hide');
                }
            });



        });
    </script>
@endpush
