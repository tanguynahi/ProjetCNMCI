<div class="row g-3">
    <div class="col-md-12 col-sm-8">
        <div class="image-input avatar xxl rounded-4"
            style="background-image: url({{ asset('assets/home/img/avatar.png') }})">
            <div class="avatar-wrapper rounded-4"
                style="background-image: url({{ asset('assets/home/img/profile_av.png') }})">
            </div>
            <div class="file-input">
                <input type="file" class="form-control" name="lien_photo_artisan" id="file-input"
                    value="{{ old('lien_photo_artisan') }}">
                <label for="file-input" class="fa fa-pencil shadow text-muted"></label>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-3 col-12">
            <label class="form-label">Nom Artisan<span class="text-danger">*</span></label>
            <input type="text" name="nom_artisan" class="form-control @error('nom_artisan') is-invalid @enderror"
                placeholder="Nom" autocomplete="nom_artisan" id="nom_artisan" autofocus value="{{ old('nom_artisan') }}"
                required onKeyPress="if(this.value.length==20) return false;">
            @error('nom_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-12">
            <label class="form-label">Prénoms Artisan <span class="text-danger">*</span></label>
            <input type="text" name="prenom_artisan" id="prenom_artisan"
                class="form-control @error('prenom_artisan') is-invalid @enderror" placeholder="Prenoms"
                autocomplete="prenom_artisan" autofocus value="{{ old('prenom_artisan') }}" onKeyPress="if(this.value.length==70) return false;" required>
            @error('prenom_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-12">
            <label class="form-label">Sexe Artisan <span class="text-danger">*</span></label>
            <select name="sexe_artisan" id="sexe_artisan"
                class="country form-control select2 @error('sexe_artisan') is-invalid @enderror" aria-label="example"
                autocomplete="sexe_artisan" autofocus required>
                <option>-- Selectionner un Sexe --</option>
                <option value="1" {{ old('sexe_artisan') == '1' ? 'selected' : '' }}>Monsieur</option>
                <option value="2" {{ old('sexe_artisan') == '2' ? 'selected' : '' }}>Madame</option>
                <option value="3" {{ old('sexe_artisan') == '3' ? 'selected' : '' }}>Mademoiselle</option>
            </select>
            @error('sexe_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-12">
            <label class="form-label">Etat Civil Artisan <span class="text-danger">*</span></label>
            <select name="etat_civil_artisan" id="etat_civil_artisan" class="country form-control select2"
                aria-label="example">
                <option>-- Selectionner votre statut --</option>
                <option value="Marié(e)" {{ old('etat_civil_artisan') == 'Marié(e)' ? 'selected' : '' }}>Marié(e)
                </option>
                <option value="Célibataire" {{ old('etat_civil_artisan') == 'Célibataire' ? 'selected' : '' }}>
                    Célibataire</option>
                <option value="Divorcé" {{ old('etat_civil_artisan') == 'Divorcé' ? 'selected' : '' }}>Divorcé</option>
                <option value="Veuf(ve)" {{ old('etat_civil_artisan') == 'Veuf(ve)' ? 'selected' : '' }}>Veuf(ve)
                </option>
            </select>
            @error('etat_civil_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
        </div>

    </div>
    <div class="row mb-2">
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Nationalité Artisan <span class="text-danger">*</span></label>
            <input type="text" name="nationalite_artisan" id="nationalite_artisan"
                class="form-control @error('nationalite_artisan') is-invalid @enderror" placeholder="Nationalité"
                value="{{ old('nationalite_artisan') }}" required>
            @error('nationalite_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror

        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Date de naissance <span class="text-danger">*</span></label>
            <input type="date" name="date_naissance_artisan" id="date_naissance_artisan"
                class="form-control @error('date_naissance_artisan') is-invalid @enderror"
                value="{{ old('date_naissance_artisan') }}" required>
            @error('date_naissance_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Lieu De naissance <span class="text-danger">*</span></label>
            <input type="text" name="lieu_naissance_artisan" id="lieu_naissance_artisan"
                class="form-control @error('lieu_naissance_artisan') is-invalid @enderror"
                placeholder="Lieu de naissance" value="{{ old('lieu_naissance_artisan') }}" onKeyPress="if(this.value.length==50) return false;" required>
            @error('lieu_naissance_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Adresse Artisan <span class="text-danger">*</span></label>
            <input type="text" name="adresse_artisan" id="adresse_artisan"
                class="form-control @error('adresse_artisan') is-invalid @enderror" placeholder="Adresse Postale"
                value="{{ old('adresse_artisan') }}" onKeyPress="if(this.value.length==50) return false;" required>
            @error('adresse_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-4 col-lg-4 col-12">
            <label class="form-label">Apprentissage du métier <span class="text-danger">*</span></label>
            <select name="apprentissage_metier"
                class="country form-control select2 @error('apprentissage_metier') is-invalid @enderror"
                aria-label="example" id="apprentissage_metier">
                <option value="">-- Selectionner votre niveau d'étude --</option>
                <option value="Sur le Tas" {{ old('apprentissage_metier') == 'Sur le Tas' ? 'selected' : '' }}>Sur le
                    Tas
                </option>
                <option value="Centre de formation professionnel"
                    {{ old('apprentissage_metier') == 'Centre de formation professionnel' ? 'selected' : '' }}>Centre
                    de
                    formation professionnel</option>
            </select>
            @error('apprentissage_metier')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-4 col-lg-4 col-12">
            <label class="form-label">Niveau métier</label>
            <input type="text" name="niveau_metier_artisan" id="niveau_metier_artisan"
                class="form-control @error('niveau_metier_artisan') is-invalid @enderror" placeholder="Niveau métier"
                value="{{ old('niveau_metier_artisan') }}" onKeyPress="if(this.value.length==30) return false;" required>
            @error('niveau_metier_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <label class="form-label">Diplôme métier <span class="text-danger">*</span></label>
            <input type="text" name="diplome_metier_obtenu" id="diplome_metier_obtenu"
                class="form-control  @error('diplome_metier_obtenu') is-invalid @enderror"
                placeholder="Diplôme métier " value="{{ old('diplome_metier_obtenu') }}" onKeyPress="if(this.value.length==50) return false;" required>
            @error('diplome_metier_obtenu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

    </div>
    <div class="row mb-2">
        <div class="col-md-4 col-lg-4 col-12">
            <label class="form-label">Email Artisan</label>
            <input type="email" name="email_artisan" id="email_artisan"
                class="form-control @error('email_artisan') is-invalid @enderror" placeholder="xxxx@gmail.com"
                value="{{ old('email_artisan') }}" required onKeyPress="if(this.value.length==50) return false;">
            @error('email_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
            <label class="form-label">Numero de Téléphone <span class="text-danger">*</span></label>
            <fieldset class="form-icon-group left-icon position-relative">
                <input type="tel" name="contact_artisan" id="contact_artisan"
                    class="form-control @error('contact_artisan') is-invalid @enderror"
                    placeholder="9999999999" value="{{ old('contact_artisan') }}" required onKeyPress="if(this.value.length==10) return false;">
                @error('contact_artisan')
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
            <div class="mt-3">
                <p><span class="text-danger fw-bold">Ce numero sera utiliser comme login</span></p>
            </div>

        </div>
        <div class="col-md-4 col-lg-4 col-12">
            <label class="form-label">WhatsApp <span class="text-danger">*</span></label>
            <fieldset class="form-icon-group left-icon position-relative">
                <input type="tel" name="contact_whatsapp" id="contact_whatsapp"
                    class="form-control  @error('contact_whatsapp') is-invalid @enderror"
                    placeholder="9999999999" value="{{ old('contact_whatsapp') }}"onKeyPress="if(this.value.length==10) return false;" required>
                @error('contact_whatsapp')
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
            <label class="form-label">Type de piece Artisan <span class="text-danger">*</span></label>
            <select name="type_document_id"
                class="country form-control select2 @error('type_document_id') is-invalid @enderror"
                aria-label="example" id="type-artisan-piece" required>
                <option>-- Selectionner une piece --</option>
                @foreach ($typeDocuments as $typeDocument)
                    <option value="{{ $typeDocument['id'] }}"
                        {{ old('type_document_id') == $typeDocument['id'] ? 'selected' : '' }}>
                        {{ $typeDocument['libelle'] }}
                    </option>
                @endforeach
            </select>
            @error('type_document_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-9 col-lg-9 col-12" id="preciser-artisan-piece" style="display: none;">
            <label class="form-label">Preciser <span class="text-danger">*</span></label>
            <input type="text" name="autre_document_artisan" id="autre_document_artisan"
                class="form-control @error('autre_document_artisan') is-invalid @enderror"
                placeholder="Preciser la piece" value="{{ old('autre_document_artisan') }}">
            @error('autre_document_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12" id="lien-artisan-piece" style="display: none;">
            <label class="form-label">Enregistre le document <span class="text-danger">*</span></label>
            <input type="file" name="lien_type_document_artisan" id="lien_type_document_artisan"
                class="form-control @error('lien_type_document_artisan') is-invalid @enderror" placeholder=""
                value="{{ old('lien_type_document_artisan') }}">
            @error('lien_type_document_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12" id="numero-artisan-piece" style="display: none;">
            <label class="form-label">Numero de Pieces <span class="text-danger">*</span></label>
            <input type="text" name="numero_document_artisan" id="numero_document_artisan"
                class="form-control @error('numero_document_artisan') is-invalid @enderror"
                placeholder="Numero de la pieces" value="{{ old('numero_document_artisan') }}" onKeyPress="if(this.value.length==50) return false;">
            @error('numero_document_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12" id="delivre-artisan-piece" style="display: none;">
            <label class="form-label">Délivré à <span class="text-danger">*</span></label>
            <input type="text" name="lieu_delivrance_document_artisan" id="lieu_delivrance_document_artisan"
                class="form-control @error('lieu_delivrance_document_artisan') is-invalid @enderror"
                placeholder="Délivré à" value="{{ old('lieu_delivrance_document_artisan') }}" onKeyPress="if(this.value.length==50) return false;">
            @error('lieu_delivrance_document_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12" id="le-artisan-piece" style="display: none;">
            <label class="form-label">le <span class="text-danger">*</span></label>
            <input type="date" name="date_delivrance_document_artisan" id="date_delivrance_document_artisan"
                class="form-control @error('date_delivrance_document_artisan') is-invalid @enderror"
                value="{{ old('date_delivrance_document_artisan') }}" onKeyPress="if(this.value.length==11) return false;">
            @error('date_delivrance_document_artisan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Niveau d'etude <span class="text-danger">*</span></label>
            <select name="niveau_etude"
                class="country form-control select2 @error('niveau_etude') is-invalid @enderror" aria-label="example"
                id="niveau-etude-artisan" required>
                <option value="">-- Selectionner votre niveau d'etude --</option>
                <option value="Non Scolariser" {{ old('niveau_etude') == 'Non Scolariser' ? 'selected' : '' }}>Non
                    Scolariser</option>
                <option value="Primaire" {{ old('niveau_etude') == 'Primaire' ? 'selected' : '' }}>Primaire</option>
                <option value="Secondaire" {{ old('niveau_etude') == 'Secondaire' ? 'selected' : '' }}>Secondaire
                </option>
                <option value="Superieur" {{ old('niveau_etude') == 'Superieur' ? 'selected' : '' }}>Superieur
                </option>
            </select>
            @error('niveau_etude')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-2 col-lg-2 col-12" id="div-classe-artisan" style="display: none;">
            <label class="form-label">La Classe <span class="text-danger">*</span> </label>
            <input type="text" name="classe" id="classe"
                class="form-control @error('classe') is-invalid @enderror" placeholder="Preciser la classe"
                value="{{ old('classe') }}" onKeyPress="if(this.value.length==30) return false;">
            @error('classe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-2 col-lg-2 col-12" id="div-diplome-artisan" style="display: none;">
            <label class="form-label">Dernier Diplôme artisan <span class="text-danger">*</span></label>
            <select name="diplome_etude_obtenu" id="diplome_etude_obtenu"
                class="country form-control select2 @error('diplome_etude_obtenu') is-invalid @enderror"
                aria-label="example">
                <option value="">-- Sélectionner votre dernier Diplôme --</option>
                <option value="CEPE" {{ old('diplome_etude_obtenu') == 'CEPE' ? 'selected' : '' }}>CEPE (Certificat
                    d'Études Primaires Élémentaires)</option>
                <option value="BEPC" {{ old('diplome_etude_obtenu') == 'BEPC' ? 'selected' : '' }}>BEPC (Brevet
                    d'Études
                    du Premier Cycle)</option>
                <option value="CAP" {{ old('diplome_etude_obtenu') == 'CAP' ? 'selected' : '' }}>CAP (Certificat
                    d'Aptitude Professionnelle)</option>
                <option value="BEP" {{ old('diplome_etude_obtenu') == 'BEP' ? 'selected' : '' }}>BEP (Brevet
                    d'Études
                    Professionnelles)</option>
                <option value="BAC" {{ old('diplome_etude_obtenu') == 'BAC' ? 'selected' : '' }}>BAC (Baccalauréat)
                </option>
                <option value="BTS" {{ old('diplome_etude_obtenu') == 'BTS' ? 'selected' : '' }}>BTS (Brevet de
                    Technicien Supérieur)</option>
                <option value="DUT" {{ old('diplome_etude_obtenu') == 'DUT' ? 'selected' : '' }}>DUT (Diplôme
                    Universitaire de Technologie)</option>
                <option value="DEUG" {{ old('diplome_etude_obtenu') == 'DEUG' ? 'selected' : '' }}>DEUG (Diplôme
                    d'Études Universitaires Générales)</option>
                <option value="Licence" {{ old('diplome_etude_obtenu') == 'Licence' ? 'selected' : '' }}>Licence
                </option>
                <option value="Master" {{ old('diplome_etude_obtenu') == 'Master' ? 'selected' : '' }}>Master</option>
                <option value="Doctorat" {{ old('diplome_etude_obtenu') == 'Doctorat' ? 'selected' : '' }}>Doctorat
                </option>
            </select>
            @error('diplome_etude_obtenu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            <label class="form-label">Avez-vous un diplome CNMCI
                ?</label><br>
            <input class="form-check-input exclusive-checkbox" type="checkbox" id="checkbox-artisan-ok">
            <label class="form-check-label" for="checkbox-artisan-ok">Oui</label>
            <input class="form-check-input exclusive-checkbox" type="checkbox" id="checkbox-artisan-no">
            <label class="form-check-label" for="checkbox-artisan-no">Non</label>
        </div>
        <div class="col-md-2 col-lg-2 col-12" id="div-diplome_cnmci" style="display: none;">
            <label class="form-label">lequel ? <span class="text-danger">*</span></label>
            <select name="diplome_cnmci" id="diplome_cnmci"
                class="country form-control select2 @error('diplome_cnmci') is-invalid @enderror"
                aria-label="example">
                <option value=""> -- Selectionner votre dernier Diplôme --</option>
                <option value="Maître artisan" {{ old('diplome_cnmci') == 'Maître artisan' ? 'selected' : '' }}>Maître
                    artisan</option>
                <option value="Fin apprentissage" {{ old('diplome_cnmci') == 'Fin apprentissage' ? 'selected' : '' }}>
                    Fin
                    apprentissage</option>
            </select>
            @error('diplome_cnmci')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="mt-3">
        <p><span class="text-danger fw-bold">*</span> Champs obligatoires.</p>
    </div>
    <div class="step-footer d-flex justify-content-between">
        <button data-step-action="prev" class="btn btn-primary step-btn">Précédents</button>
        <button data-step-action="next" class="btn btn-primary step-btn">Suivant
        </button>
    </div>
</div>
<!-- .row end -->
@push('js')
    =
@endpush
