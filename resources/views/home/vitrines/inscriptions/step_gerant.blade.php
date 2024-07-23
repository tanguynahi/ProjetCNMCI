<div class="row g-3">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .confirmation-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .confirmation-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .confirmation-container button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .confirmation-container .btn-oui {
            background-color: #4CAF50;
            color: white;
        }

        .confirmation-container .btn-non {
            background-color: #f44336;
            color: white;
        }

        .confirmation-container button:hover {
            opacity: 0.8;
        }
    </style>
    <div class="confirmation-container">
        <h2>Êtes-vous le gérant ?</h2>
        <button id="btn-oui" class="btn-oui" >Oui</button>
        <button id="btn-non" class="btn-non" >Non</button>
        <input type="text" name="etes_gerant" id="etes_gerant" value="" hidden>
    </div>

    <div id="gerant-details" style="display: none;">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-lg-4 col-12">
                <div class="image-input avatar xxl rounded-4"
                    style="background-image: url({{ asset('assets/home/img/avatar.png') }})">
                    <div class="avatar-wrapper rounded-4"
                        style="background-image: url({{ asset('assets/home/img/profile_av.png') }})">
                    </div>
                    <div class="file-input">
                        <input type="file" class="form-control @error('lien_photo_gerant') is-invalid @enderror "
                            value="{{ old('lien_photo_gerant') }}" name="lien_photo_gerant" id="lien_photo_gerant">
                        @error('lien_photo_gerant')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="lien_photo_gerant" class="fa fa-pencil shadow text-muted"></label>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-8 col-md-8 col-sm-8 col-12 mt-3">
                <input class="form-check-input exclusive-checkbox" type="checkbox" id="ouiMoi"
                    onclick="copyArtisanToGerant()">
                <label class="form-check-label" for="ouiMoi"> <strong class="form-label"> C'est Moi le gérant</strong>
                </label>
            </div> --}}
        </div>
        <div class="row  mb-2">
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Nom <span class="text-danger">*</span></label>
                <input type="text" name="nom_gerant" id="nom_gerant"
                    class="form-control @error('nom_gerant') is-invalid @enderror" placeholder="Nom"
                    value="{{ old('nom_gerant') }}" required>
                @error('nom_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Prénoms <span class="text-danger">*</span></label>
                <input type="text" name="prenom_gerant" id="prenom_gerant"
                    class="form-control @error('prenom_gerant') is-invalid @enderror" placeholder="Prénoms"
                    value="{{ old('prenom_gerant') }}" required>
                @error('prenom_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Sexe <span class="text-danger">*</span></label>
                <select name="sexe_gerant" id="sexe_gerant"
                    class="country form-control select2 @error('sexe_gerant') is-invalid @enderror"
                    aria-label="example">
                    <option selected>-- Selectionner un Sexe --</option>
                    <option value="Masculin" {{ old('sexe_gerant') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                    <option value="Feminin" {{ old('sexe_gerant') == 'Feminin' ? 'selected' : '' }}>Feminin</option>
                </select>
                @error('sexe_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Etat Civil <span class="text-danger">*</span></label>
                <select name="etat_civil_gerant" id="etat_civil_gerant"
                    class="country form-control select2 @error('etat_civil_gerant') is-invalid @enderror"
                    aria-label="example">
                    <option selected>-- Selectionner votre statut --</option>
                    <option value="Marié(e)" {{ old('etat_civil_gerant') == 'Marié(e)' ? 'selected' : '' }}>Marié(e)
                    </option>
                    <option value="Célibataire" {{ old('etat_civil_gerant') == 'Célibataire' ? 'selected' : '' }}>
                        Célibataire</option>
                    <option value="Divorcé" {{ old('etat_civil_gerant') == 'Divorcé' ? 'selected' : '' }}>Divorcé
                    </option>
                    <option value="Veuf(ve)" {{ old('etat_civil_gerant') == 'Veuf(ve)' ? 'selected' : '' }}>Veuf(ve)
                    </option>
                </select>
                @error('etat_civil_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Nationalité <span class="text-danger">*</span></label>
                <input type="text" name="nationalite_gerant" id="nationalite_gerant"
                    class="form-control @error('nationalite_gerant') is-invalid @enderror" placeholder="Nationalité"
                    value="{{ old('nationalite_gerant') }}">
                @error('nationalite_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Date de naissance <span class="text-danger">*</span></label>
                <input type="date" name="date_naissance_gerant" id="date_naissance_gerant"
                    class="form-control @error('date_naissance_gerant') is-invalid @enderror"
                    value="{{ old('date_naissance_gerant') }}">
                @error('date_naissance_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Lieu De naissance <span class="text-danger">*</span></label>
                <input type="text" name="lieu_naissance_gerant" id="lieu_naissance_gerant"
                    class="form-control @error('lieu_naissance_gerant') is-invalid @enderror"
                    placeholder="Lieu de naissance" value="{{ old('lieu_naissance_gerant') }}">
                @error('lieu_naissance_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Adresse Gerant <span class="text-danger">*</span></label>
                <input type="text" name="adresse_gerant" id="adresse_gerant"
                    class="form-control @error('adresse_gerant') is-invalid @enderror" placeholder="Adresse Postale"
                    value="{{ old('adresse_gerant') }}">
                @error('adresse_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-4 col-lg-4 col-12">
                <label class="form-label">Apprentissage du metiers <span class="text-danger">*</span></label>
                <select name="apprentissage_metier_gerant"
                    class="country form-control select2 @error('apprentissage_metier_gerant') is-invalid @enderror"
                    aria-label="example" id="apprentissage_metier_gerant">
                    <option selected>-- Selectionner metier --</option>
                    <option value="Sur le Tas"
                        {{ old('apprentissage_metier_gerant') == 'Sur le Tas' ? 'selected' : '' }}>
                        Sur le Tas</option>
                    <option value="Centre de formation professionnel"
                        {{ old('apprentissage_metier_gerant') == 'Centre de formation professionnel' ? 'selected' : '' }}>
                        Centre de formation professionnel</option>
                </select>
                @error('apprentissage_metier_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4 col-lg-4 col-12">
                <label class="form-label">Niveau métier</label>
                <input type="text" name="niveau_metier_gerant" id="niveau_metier_gerant"
                    class="form-control @error('niveau_metier_gerant') is-invalid @enderror"
                    placeholder="Niveau métier" value="{{ old('niveau_metier_gerant') }}" required>
                @error('niveau_metier_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4 col-lg-4 col-12">
                <label class="form-label">Diplome Obtenu <span class="text-danger">*</span></label>
                <input type="text" name="diplome_metier_obtenu_gerant" id="diplome_metier_obtenu_gerant"
                    class="form-control @error('diplome_metier_obtenu_gerant') is-invalid @enderror"
                    value="{{ old('diplome_metier_obtenu_gerant') }}" required>
                @error('diplome_metier_obtenu_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-4 col-lg-4 col-12">
                <label class="form-label">Email </label>
                <input type="email" name="email_gerant" id="email_gerant"
                    class="form-control @error('email_gerant') is-invalid @enderror" placeholder="xxxx@gmail.com"
                    value="{{ old('email_gerant') }}">
                @error('email_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <label class="form-label">Numero de Téléphone <span class="text-danger">*</span></label>
                <fieldset class="form-icon-group left-icon position-relative">
                    <input type="tel" name="contact_gerant" id="contact_gerant"
                        class="form-control phone-number @error('contact_gerant') is-invalid @enderror"
                        placeholder="Ex: (+225) 00-00-00-00-00" value="{{ old('contact_gerant') }}">
                    @error('contact_gerant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
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
            <div class="col-md-4 col-lg-4 col-12">
                <label class="form-label">WhatsApp <span class="text-danger">*</span></label>
                <fieldset class="form-icon-group left-icon position-relative">
                    <input type="tel" name="contact_whatsapp_gerant" id="contact_whatsapp_gerant"
                        class="form-control phone-number @error('contact_whatsapp_gerant') is-invalid @enderror"
                        placeholder="Ex: (+225) 00-00-00-00-00" value="{{ old('contact_whatsapp_gerant') }}">
                    @error('contact_whatsapp_gerant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
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
        <div class="row mb-2">
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Type de piece Gérant <span class="text-danger">*</span></label>
                <select name="gerant_type_document_id"
                    class="country form-control select2 @error('gerant_type_document_id') is-invalid @enderror"
                    aria-label="example" id="type-gerant-piece">
                    <option>-- Selectionner une piece --</option>
                    @foreach ($typeDocuments as $typeDocument)
                        <option value="{{ $typeDocument->id }}"
                            {{ old('gerant_type_document_id') == $typeDocument->id ? 'selected' : '' }}>
                            {{ $typeDocument->libelle }}
                        </option>
                    @endforeach
                </select>
                @error('gerant_type_document_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-9 col-lg-9 col-12" id="preciser-gerant-piece" style="display: none;">
                <label class="form-label">Preciser <span class="text-danger">*</span></label>
                <input type="text" name="autre_document_gerant" id="autre_document_gerant"
                    class="form-control @error('autre_document_gerant') is-invalid @enderror"
                    placeholder="Preciser la piece" value="{{ old('autre_document_gerant') }}">
                @error('autre_document_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12" id="lien-gerant-piece" style="display: none;">
                <label class="form-label">Enregistre le document <span class="text-danger">*</span></label>
                <input type="file" name="lien_type_document_gerant" id="lien_type_document_gerant"
                    class="form-control @error('lien_type_document_gerant') is-invalid @enderror" placeholder=""
                    value="{{ old('lien_type_document_gerant') }}">
                @error('lien_type_document_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12" id="numero-gerant-piece" style="display: none;">
                <label class="form-label">Numero de Pieces <span class="text-danger">*</span></label>
                <input type="text" name="numero_document_gerant" id="numero_document_gerant"
                    class="form-control @error('numero_document_gerant') is-invalid @enderror"
                    placeholder="Numero de la pieces" value="{{ old('numero_document_gerant') }}">
                @error('numero_document_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12" id="delivre-gerant-piece" style="display: none;">
                <label class="form-label">Délivré à <span class="text-danger">*</span></label>
                <input type="text" name="lieu_delivrance_document_gerant" id="lieu_delivrance_document_gerant"
                    class="form-control @error('lieu_delivrance_document_gerant') is-invalid @enderror"
                    placeholder="Délivré à" value="{{ old('lieu_delivrance_document_gerant') }}">
                @error('lieu_delivrance_document_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12" id="le-gerant-piece" style="display: none;">
                <label class="form-label">le <span class="text-danger">*</span></label>
                <input type="date" name="date_delivrance_document_gerant" id="date_delivrance_document_gerant"
                    class="form-control @error('date_delivrance_document_gerant') is-invalid @enderror"
                    value="{{ old('date_delivrance_document_gerant') }}">
                @error('date_delivrance_document_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Niveau d'etude <span class="text-danger">*</span></label>
                <select name="niveau_etude_gerant"
                    class="country form-control select2 @error('niveau_etude_gerant') is-invalid @enderror"
                    aria-label="example" id="niveau-etude-gerants">
                    <option>-- Selectionner votre niveau d'etude --</option>
                    <option value="Non Scolariser"
                        {{ old('niveau_etude_gerant') == 'Non Scolariser' ? 'selected' : '' }}>
                        Non Scolariser</option>
                    <option value="Primaire" {{ old('niveau_etude_gerant') == 'Primaire' ? 'selected' : '' }}>Primaire
                    </option>
                    <option value="Secondaire" {{ old('niveau_etude_gerant') == 'Secondaire' ? 'selected' : '' }}>
                        Secondaire</option>
                    <option value="Superieur" {{ old('niveau_etude_gerant') == 'Superieur' ? 'selected' : '' }}>
                        Superieur
                    </option>
                </select>
                @error('niveau_etude_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-2 col-lg-2 col-12" id="div-classe-gerants" style="display: none;">
                <label class="form-label">La Classe <span class="text-danger">*</span> </label>
                <input type="text" name="classe_gerant" id="classe_gerant"
                    class="form-control @error('classe_gerant') is-invalid @enderror"
                    placeholder="Preciser la classe" value="{{ old('classe_gerant') }}">
                @error('classe_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-2  col-lg-2col-12" id="div-diplome-gerants" style="display: none;">
                <label class="form-label">Dernier Diplôme <span class="text-danger">*</span></label>
                <select name="diplome_etude_obtenu_gerant" id="diplome_etude_obtenu_gerant"
                    class="country form-control select2 @error('diplome_etude_obtenu_gerant') is-invalid @enderror"
                    aria-label="example" required>
                    <option>-- Sélectionner votre dernier Diplôme --</option>
                    <option value="CEPE" {{ old('diplome_etude_obtenu_gerant') == 'CEPE' ? 'selected' : '' }}>CEPE
                        (Certificat d'Études Primaires Élémentaires)</option>
                    <option value="BEPC" {{ old('diplome_etude_obtenu_gerant') == 'BEPC' ? 'selected' : '' }}>BEPC
                        (Brevet d'Études du Premier Cycle)</option>
                    <option value="CAP" {{ old('diplome_etude_obtenu_gerant') == 'CAP' ? 'selected' : '' }}>CAP
                        (Certificat d'Aptitude Professionnelle)</option>
                    <option value="BEP" {{ old('diplome_etude_obtenu_gerant') == 'BEP' ? 'selected' : '' }}>BEP
                        (Brevet
                        d'Études Professionnelles)</option>
                    <option value="BAC" {{ old('diplome_etude_obtenu_gerant') == 'BAC' ? 'selected' : '' }}>BAC
                        (Baccalauréat)</option>
                    <option value="BTS" {{ old('diplome_etude_obtenu_gerant') == 'BTS' ? 'selected' : '' }}>BTS
                        (Brevet
                        de Technicien Supérieur)</option>
                    <option value="DUT" {{ old('diplome_etude_obtenu_gerant') == 'DUT' ? 'selected' : '' }}>DUT
                        (Diplôme Universitaire de Technologie)</option>
                    <option value="DEUG" {{ old('diplome_etude_obtenu_gerant') == 'DEUG' ? 'selected' : '' }}>DEUG
                        (Diplôme d'Études Universitaires Générales)</option>
                    <option value="Licence" {{ old('diplome_etude_obtenu_gerant') == 'Licence' ? 'selected' : '' }}>
                        Licence</option>
                    <option value="Master" {{ old('diplome_etude_obtenu_gerant') == 'Master' ? 'selected' : '' }}>
                        Master
                    </option>
                    <option value="Doctorat" {{ old('diplome_etude_obtenu_gerant') == 'Doctorat' ? 'selected' : '' }}>
                        Doctorat</option>
                </select>
                @error('diplome_etude_obtenu_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-3 col-lg-3 col-12">
                <label class="form-label">Avez-vous un diplome CNMCI
                    ?</label><br>
                <input class="form-check-input exclusive-checkbox" type="checkbox" id="checkbox-gerant_ok">
                <label class="form-check-label" for="checkbox-oui">Oui</label>
                <input class="form-check-input exclusive-checkbox" type="checkbox" id="checkbox-gerant_non">
                <label class="form-check-label" for="checkbox-non">Non</label>
            </div>
            <div class="col-md-2 col-lg-2 col-12" id="div-diplome_cnmci_gerant" style="display: none;">
                <label class="form-label">Lequel ? <span class="text-danger">*</span></label>
                <select name="diplome_cnmci_gerant" id="diplome_cnmci_gerant"
                    class="country form-control select2 @error('diplome_cnmci_gerant') is-invalid @enderror"
                    aria-label="example">
                    <option value="">-- Selectionner votre dernier Diplôme --</option>
                    <option value="Maître artisan"
                        {{ old('diplome_cnmci_gerant') == 'Maître artisan' ? 'selected' : '' }}>Maître artisan</option>
                    <option value="Fin apprentissage"
                        {{ old('diplome_cnmci_gerant') == 'Fin apprentissage' ? 'selected' : '' }}>Fin apprentissage
                    </option>
                </select>
                @error('diplome_cnmci_gerant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="mt-3">
            <p><span class="text-danger fw-bold">*</span> Champs obligatoires.</p>
        </div>
    </div>


    <div class="step-footer d-flex justify-content-between">
        <button data-step-action="prev" class="btn btn-primary step-btn">Précédents</button>
        <button data-step-action="next" class="btn btn-primary step-btn" >Suivant
        </button>
    </div>
</div> <!-- .row end -->
