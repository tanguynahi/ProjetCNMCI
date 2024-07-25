@push('css')
@endpush

<div class="row g-3">

    <div class="row mt-6">
        <div class="col-lg-3 col-md-3 col-12" data-select2-id="select2-data-19-lrou">
            <label class="form-label">Type Entreprise <span class="text-danger">*</span></label>
            <select
                class="form-control show-tick ms select2 select2-hidden-accessible @error('type_entreprise_id') is-invalid @enderror"
                data-placeholder="Select" data-select2-id="select2-data-1-4ue7" tabindex="-1" aria-hidden="true"
                name="type_entreprise_id" autocomplete="type_entreprise_id" autofocus>
                <option value="">--
                    Séléctionner
                    un type d'entreprise --</option>
                @foreach ($typeEntreprises as $typeEntreprise)
                    <option data-select2-id="select2-data-22-ekqo" value="{{ $typeEntreprise['id'] }}"
                        {{ old('type_entreprise_id') == $typeEntreprise['id'] ? 'selected' : '' }}>
                        {{ $typeEntreprise['libelle'] }}
                    </option>
                @endforeach
            </select>
            @error('type_entreprise_id')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Dénomination <span class="text-danger">*</span></label>
            <input type="text" name="denomination_entreprise"
                class="form-control @error('denomination_entreprise') is-invalid @enderror" placeholder="Dénomination"
                required autocomplete="denomination_entreprise" autofocus required
                value="{{ old('denomination_entreprise') }}" onKeyPress="if(this.value.length==50) return false;">
            @error('denomination_entreprise')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}

                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email_entreprise"
                class="form-control @error('email_entreprise') is-invalid @enderror" placeholder="CNMCI@gmail.com"
                autocomplete="email_entreprise" autofocus value="{{ old('email_entreprise') }}"
                onKeyPress="if(this.value.length==50) return false;">
            @error('email_entreprise')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Télèphone <span class="text-danger">*</span></label>
            <fieldset class="form-icon-group left-icon position-relative">
                <input type="tel" name="contact_entreprise" id="contact_entreprise"
                    class="form-control  phone-number @error('contact_entreprise') is-invalid @enderror"
                    placeholder="Ex:(+225)00-00-00-00-00" autocomplete="contact_entreprise"
                    value="{{ old('contact_entreprise') }}"autofocus required
                    onKeyPress="if(this.value.length==20) return false;">
                @error('contact_entreprise')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
                <div class="form-icon position-absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-phone" viewBox="0 0 16 16">
                        <path
                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                </div>
            </fieldset>

        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-2 col-lg-2 col-6">
            <input class="form-check-input exclusive-radio " type="radio" name="registre_entreprise" value="RCCM"
                id="RCCM">
            <label class="form-check-label" for="RCCM">RCCM</label>
        </div>
        <div class="col-md-1 col-lg-1 col-6">
            <input class="form-check-input exclusive-radio " type="radio" name="registre_entreprise" value="RSC"
                id="RSC">

            <label class="form-check-label" for="RSC">RSC</label>
        </div>
        <div class="col-md-6 col-lg-6 col-12">
            <input type="text" class="form-control " placeholder="Numero"
                value="{{ old('numero_registre', $registre) }}" disabled>
            <input type="text" name="numero_registre"
                class="form-control @error('numero_registre') is-invalid @enderror" placeholder="Numero"
                autocomplete="numero_registre" autofocus value="{{ old('numero_registre', $registre) }}" readonly
                hidden>
            @error('numero_registre')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <div class="input-group">
                <input type="number" name="capital_social"
                    class="form-control @error('capital_social') is-invalid @enderror " placeholder="Capital Social"
                    autocomplete="capital_social" autofocus value="{{ old('capital_social') }}" required>
                <div class="input-group-append">
                    <span class="input-group-text">CFA</span>
                </div>
            </div>
            @error('capital_social')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-3 col-md-3 col-12" data-select2-id="select2-data-19-lrou">
            <label class="form-label">Branche Activites <span class="text-danger">*</span></label>
            <select name="branche_activite_id"
                class="form-control  select2  @error('branche_activite_id') is-invalid @enderror"
                id="branche_activite_id" required autofocus autocomplete="branche_activite_id">
                <option value="">-- Séléctionner un type d'activité
                    --</option>
                @foreach ($brancheActivites as $brancheActivite)
                    <option data-select2-id="select2-data-22-ekqo" value="{{ $brancheActivite['id'] }}"
                        {{ old('branche_activite_id') == $brancheActivite['id'] ? 'selected' : '' }}>
                        {{ $brancheActivite['libelle'] }}
                    </option>
                @endforeach
            </select>
            @error('branche_activite_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
{{--
        <div class="col-lg-6 col-md-6 col-12" data-select2-id="select2-data-19-lrou">
            <label class="form-label">Metiers <span class="text-danger">*</span></label>
            <select name="type_activite_id" class="form-control  @error('type_activite_id') is-invalid @enderror"
                data-placeholder="Select" data-select2-id="select2-data-1-4ue7" tabindex="-1" aria-hidden="true"
                id="type_activite_id">
            </select>
            @error('type_activite_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}
        <div class="col-lg-6 col-md-6 col-12" data-select2-id="select2-data-19-lrou">
            <label class="form-label">Metiers <span class="text-danger">*</span></label>
            <select name="type_activite_id" class="form-control @error('type_activite_id') is-invalid @enderror"
                data-placeholder="Select" data-select2-id="select2-data-1-4ue7" tabindex="-1" aria-hidden="true"
                id="type_activite_id">
                <!-- Options seront ajoutées par le script JavaScript -->
            </select>
            @error('type_activite_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Activité Secondaire </label>
            <input type="text" name="activite_secondaire"
                class="form-control @error('activite_secondaire') is-invalid @enderror"
                placeholder="Activité secondaire" autocomplete="activite_secondaire"
                value="{{ old('activite_secondaire') }}" autofocus
                onKeyPress="if(this.value.length==250) return false;">
            @error('activite_secondaire')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Date de début d'activité <span class="text-danger">*</span></label>
            <input type="date" name="date_debut_activite"
                class="form-control @error('date_debut_activite') is-invalid @enderror"
                autocomplete="date_debut_activite" autofocus value="{{ old('date_debut_activite') }}" required
                onKeyPress="if(this.value.length==11) return false;">
            @error('date_debut_activite')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>

        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Raison social <span class="text-danger">*</span></label>
            <input type="text" name="raison_social"
                class="form-control @error('raison_social') is-invalid @enderror" placeholder="Raison sociale"
                autocomplete="raison_social" autofocus value="{{ old('raison_social') }}" required
                onKeyPress="if(this.value.length==50) return false;">
            @error('raison_social')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Sigle ou Enseigne <span class="text-danger">*</span></label>
            <input type="text" name="sigle_ou_enseigne"
                class="form-control @error('sigle_ou_enseigne') is-invalid @enderror" placeholder="Sigle ou Enseigne"
                autocomplete="sigle_ou_enseigne" autofocus value="{{ old('sigle_ou_enseigne') }}"
                onKeyPress="if(this.value.length==50) return false;" required>
            @error('sigle_ou_enseigne')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Objet Social <span class="text-danger">*</span></label>
            <input type="text" name="objet_social"
                class="form-control @error('objet_social') is-invalid @enderror" placeholder="Objet Social"
                autocomplete="objet_social" autofocus value="{{ old('objet_social') }}"
                onKeyPress="if(this.value.length==50) return false;" required>
            @error('objet_social')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Nombre d'associer <span class="text-danger">*</span></label>
            <input type="number" name="nombre_associes"
                class="form-control @error('nombre_associes') is-invalid @enderror" min="0"
                autocomplete="nombre_associes" autofocus placeholder="nombre d'associe"
                value="{{ old('nombre_associes') }}">
            @error('nombre_associes')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Durée de la personne morale <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="number" name="duree_personne_morale"
                    class="form-control @error('duree_personne_morale') is-invalid @enderror"
                    placeholder="duree de la personne morale" autocomplete="duree_personne_morale" autofocus
                    value="{{ old('duree_personne_morale') }}" onKeyPress="if(this.value.length==50) return false;"
                    required>
                <div>
                    <select name="annee_duree_personne_morale" id="annee_duree_personne_morale"
                        class=" form-control text-primary select2 @error('annee_duree_personne_morale') is-invalid @enderror"
                        style="width:80px; background-color:rgba(128, 128, 128, 0.282);"
                        autocomplete="annee_duree_personne_morale" autofocus required>
                        <option value="JOURS" {{ old('annee_duree_personne_morale') == 'JOURS' ? 'selected' : '' }}>
                            JOURS
                        </option>
                        <option value="MOIS" {{ old('annee_duree_personne_morale') == 'MOIS' ? 'selected' : '' }}>
                            MOIS</option>
                        <option value="ANS" {{ old('annee_duree_personne_morale') == 'ANS' ? 'selected' : '' }}>ANS
                        </option>
                    </select>
                    @error('annee_duree_personne_morale')
                        <span class="invalid-feedback" role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                    @enderror
                </div>
            </div>
            @error('duree_personne_morale')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Numero CNPS de l'entreprise <span class="text-danger">*</span></label>
            <input type="text" name="numero_cnps" class="form-control @error('numero_cnps') is-invalid @enderror"
                placeholder="Numero CNPS de l'entreprise"autocomplete="numero_cnps" autofocus
                value="{{ old('numero_cnps') }}" onKeyPress="if(this.value.length==50) return false;">
            @error('numero_cnps')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Numero Compte Contribuable <span class="text-danger">*</span></label>
            <input type="text" name="numero_compte_contribuable"
                class="form-control @error('numero_compte_contribuable') is-invalid @enderror"
                placeholder="Numero Compte Contribuable" autocomplete="numero_compte_contribuable" autofocus
                value="{{ old('numero_compte_contribuable') }}" onKeyPress="if(this.value.length==50) return false;"
                required>
            @error('numero_compte_contribuable')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Lot N°<span class="text-danger">*</span></label>
            <input type="text" name="numero_lot" class="form-control @error('numero_lot') is-invalid @enderror"
                placeholder="Numero du lot" autocomplete="numero_lot" autofocus value="{{ old('numero_lot') }}"
                onKeyPress="if(this.value.length==50) return false;" required>
            @error('numero_lot')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">ILot N°<span class="text-danger">*</span></label>
            <input type="text" name="numero_ilot" class="form-control @error('numero_ilot') is-invalid @enderror"
                placeholder="Numero du Ilot" autocomplete="numero_ilot" autofocus value="{{ old('numero_ilot') }}"
                onKeyPress="if(this.value.length==50) return false;" required>
            @error('numero_ilot')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-3 col-md-3 col-12" data-select2-id="select2-data-19-lrou">
            <label class="form-label">Regime Fiscal <span class="text-danger">*</span></label>
            <select name="regime_fiscal"
                class="form-control show-tick ms select2 select2-hidden-accessible @error('regime_fiscal') is-invalid @enderror"
                data-placeholder="Select" data-select2-id="select2-data-1-4ue7" tabindex="-1" aria-hidden="true"
                autocomplete="regime_fiscal" autofocus required>
                <option value="" data-select2-id="select2-data-3-o5ur">--
                    Séléctionner
                    un regime --</option>
                <option data-select2-id="select2-data-22-ekqo" value="Taxe communale de l'Entreprenant"
                    {{ old('regime_fiscal') == "Taxe communale de l'Entreprenant" ? 'selected' : '' }}>Taxe
                    communale
                    de l'Entreprenant
                </option>
                <option data-select2-id="select2-data-23-9qx4"
                    value="Taxe d'Etat de l'Entreprenant"{{ old('regime_fiscal') == "Taxe d'Etat de l'Entreprenant" ? 'selected' : '' }}>
                    Taxe d'Etat
                    de
                    l'Entreprenant
                </option>
                <option data-select2-id="select2-data-24-1ajb"
                    value="Autres"{{ old('regime_fiscal') == 'Autres' ? 'selected' : '' }}>Autres
                </option>
            </select>
            @error('regime_fiscal')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Departement <span class="text-danger">*</span></label>
            <input type="text" name="departement" class="form-control @error('departement') is-invalid @enderror"
                placeholder="departement" autocomplete="departement" autofocus value="{{ old('departement') }}"
                onKeyPress="if(this.value.length==50) return false;">
            @error('departement')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-lg-3 col-lg-3 col-md-4" data-select2-id="select2-data-19-lrou">
            <label class="form-label">Commune <span class="text-danger">*</span> </label>
            <select name="commune_id"
                class="form-control show-tick ms select2 select2-hidden-accessible @error('commune_id') is-invalid @enderror"
                data-placeholder="Select" data-select2-id="select2-data-1-4ue7" tabindex="-1" aria-hidden="true"
                autocomplete="commune_id" autofocus required>
                <option value="" data-select2-id="select2-data-3-o5ur">--
                    Séléctionner
                    un commune --</option>
                @foreach ($communes as $commune)
                    <option data-select2-id="select2-data-22-ekqo" value="{{ $commune['id'] }}"
                        {{ old('commune_id') == $commune['id'] ? 'selected' : '' }}>
                        {{ $commune['libelle'] }}
                    </option>
                @endforeach
            </select>
            @error('commune_id')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-3 col-12 col-md-3" data-select2-id="select2-data-19-lrou">
            <label class="form-label">Sous préfecture <span class="text-danger">*</span></label>
            <select name="sous_prefecture_id"
                class="form-control show-tick ms select2 select2-hidden-accessible @error('sous_prefecture_id') is-invalid @enderror"
                data-placeholder="Select" data-select2-id="select2-data-1-4ue7" tabindex="-1" aria-hidden="true"
                autocomplete="sous_prefecture_id" autofocus required>
                <option data-select2-id="select2-data-3-o5ur" value="">--
                    Séléctionner
                    une sous préfecture --</option>
                @foreach ($sousPrefectures as $sousPrefecture)
                    <option data-select2-id="select2-data-22-ekqo" value="{{ $sousPrefecture['id'] }}"
                        {{ old('sous_prefecture_id') == $sousPrefecture['id'] ? 'selected' : '' }}>
                        {{ $sousPrefecture['libelle'] }}
                    </option>
                @endforeach
            </select>
            @error('sous_prefecture_id')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Village</label>
            <input type="text" name="village" class="form-control @error('village') is-invalid @enderror"
                placeholder="village" autocomplete="village" value="{{ old('village') }}" autofocus
                onKeyPress="if(this.value.length==50) return false;">
            @error('village')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Quartier <span style="color: red;">*</span></label>
            <input type="text" name="quartier" class="form-control @error('quartier') is-invalid @enderror"
                placeholder="quartier" autocomplete="quartier" autofocus value="{{ old('quartier') }}" required
                onKeyPress="if(this.value.length==50) return false;">
            @error('quartier')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-12 ">
            <div class="form-group">
                <label for="adresse_postale">Adresse Entreprise <span style="color: red;">*</span></label>
                <input type="text" class="form-control @error('adresse_postale') is-invalid @enderror" value="{{ old('adresse_postale') }}"
                    id="adresse_postale" name="adresse_postale" placeholder="Entrez l'adresse de l'entreprise"
                    required onKeyPress="if(this.value.length==50) return false;">
                @error('adresse_postale')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <input type="text" name="lien_google_map" id="lien_google_map" class="" hidden required
                value="{{ old('lien_google_map') }}">
        </div>
    </div>
    <style>
        #map {
            height: 400px;
            width: 1250px;
        }
    </style>

    <div class="container mt-4">
        <!-- .row end -->
        <div class="row g-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body"id="map">
                        @error('lien_google_map')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
    </div>
    <div class="mt-3">
        <p><span class="text-danger fw-bold">*</span> Champs obligatoires.</p>
    </div>
    <div class="step-footer d-flex justify-content-between">
        <hr>
        <button data-step-action="prev" class="btn btn-primary step-btn">Précédents</button>
        <button data-step-action="next" class="btn btn-primary step-btn">Suivant
        </button>
    </div>
</div> <!-- .row end -->

@push('js')
    <script>
        let map, marker, autocomplete;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8
            });

            marker = new google.maps.Marker({
                map: map,
                draggable: true
            });

            autocomplete = new google.maps.places.Autocomplete(document.getElementById('adresse_postale'), {
                types: ['geocode']
            });
            autocomplete.addListener('place_changed', onPlaceChanged);

            google.maps.event.addListener(marker, 'dragend', function() {
                const position = marker.getPosition();
                map.setCenter(position);
                document.getElementById('lien_google_map').value = position.lat() + ", " + position.lng();
            });
        }

        function onPlaceChanged() {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                alert("No details available for input: '" + place.name + "'");
                return;
            }

            map.setCenter(place.geometry.location);
            map.setZoom(14);
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            document.getElementById('lien_google_map').value = place.geometry.location.lat() + ", " + place.geometry
                .location
                .lng();
        }

        function showLocation() {
            const address = document.getElementById('lien_google_map').value;
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'adresse_postale': address
            }, function(results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    marker.setVisible(true);

                    document.getElementById('lien_google_map').value = results[0].formatted_address + " (" +
                        results[0]
                        .geometry.location.lat() + ", " + results[0].geometry.location.lng() + ")";
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiw_DCMqoSQ5MoxmNqwbMKN_JEy-qQAS0&libraries=places&callback=initMap"
        async defer></script>

    {{-- trier du metier en fonction de la branche d'activites --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const brancheSelect = document.getElementById('branche_activite_id');
            const metierSelect = document.getElementById('type_activite_id');

            // Ajouter une option par défaut au chargement
            const defaultOption = document.createElement("option");
            defaultOption.text = "Sélectionner une branche d'activité d'abord";
            defaultOption.value = "";
            metierSelect.appendChild(defaultOption);

            brancheSelect.addEventListener("change", function() {
                const selectedBrancheId = brancheSelect.value;

                // Désactiver le menu déroulant des métiers si aucune branche n'a été sélectionnée
                metierSelect.disabled = !selectedBrancheId;

                // Effacer les options précédentes
                metierSelect.innerHTML = "";

                if (selectedBrancheId) {
                    @foreach ($typeActivites as $typeActivite)
                        if ({{ $typeActivite['branche_activite_id'] }} == selectedBrancheId) {
                            const option = document.createElement("option");
                            option.value = {{ $typeActivite['id'] }};
                            option.text = "{{ $typeActivite['libelle'] }}";
                            metierSelect.appendChild(option);
                        }
                    @endforeach
                } else {
                    // Réafficher l'option par défaut si aucune branche n'est sélectionnée
                    const option = document.createElement("option");
                    option.text = "Sélectionner une branche d'activité d'abord";
                    option.value = "";
                    metierSelect.appendChild(option);
                }
            });
        });
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const brancheSelect = document.getElementById('branche_activite_id');
            const metierSelect = document.getElementById('type_activite_id');
            const oldTypeActiviteId = "{{ old('type_activite_id') }}"; // Récupérer la valeur ancienne

            // Ajouter une option par défaut au chargement
            const defaultOption = document.createElement("option");
            defaultOption.text = "Sélectionner une branche d'activité d'abord";
            defaultOption.value = "";
            metierSelect.appendChild(defaultOption);

            brancheSelect.addEventListener("change", function() {
                const selectedBrancheId = brancheSelect.value;

                // Désactiver le menu déroulant des métiers si aucune branche n'a été sélectionnée
                metierSelect.disabled = !selectedBrancheId;

                // Effacer les options précédentes
                metierSelect.innerHTML = "";

                if (selectedBrancheId) {
                    @foreach ($typeActivites as $typeActivite)
                        if ({{ $typeActivite['branche_activite_id'] }} == selectedBrancheId) {
                            const option = document.createElement("option");
                            option.value = {{ $typeActivite['id'] }};
                            option.text = "{{ $typeActivite['libelle'] }}";
                            if (oldTypeActiviteId == {{ $typeActivite['id'] }}) {
                                option.selected = true; // Sélectionner l'option si elle correspond à l'ancienne valeur
                            }
                            metierSelect.appendChild(option);
                        }
                    @endforeach
                } else {
                    // Réafficher l'option par défaut si aucune branche n'est sélectionnée
                    const option = document.createElement("option");
                    option.text = "Sélectionner une branche d'activité d'abord";
                    option.value = "";
                    metierSelect.appendChild(option);
                }
            });

            // Déclencher l'événement change pour charger les options au chargement de la page
            if (brancheSelect.value) {
                brancheSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>

@endpush
