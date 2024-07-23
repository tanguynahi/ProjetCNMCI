@extends('layouts.espace_home_layouts', ['title' => "Creation d'un Compagnon"])
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/%40form-validation/form-validation.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endpush
@section('content')
    

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">
                <a href="{{ back()->getTargetUrl() }}"> <i class="fa-solid fa-arrow-left"></i> Retour</a>
            </span> <br>
            <span class="text-muted fw-light">Compagnons /</span> Enregistrement
        </h4>
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <h5 class="card-header">Formulaire d'enregistrement d'un compagnon</h5>
                    <!-- Account -->
                    <hr class="my-0">
                    <div class="card-body">
                        <form id="formAccountSettings" method="Post" action="#">
                            {{-- onsubmit="return false" --}}
                            <div class="row">
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="{{ asset('assets/dashboard/img/avatars/14.png') }}" alt="user-avatar"
                                            class="d-block w-px-100 h-px-100 rounded " id="uploadedAvatar" />
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                                <span class="d-none d-sm-block">Ajouter une Photo</span>
                                                <i class="ti ti-upload d-block d-sm-none"></i>
                                                <input type="file" id="upload" class="account-file-input" hidden
                                                    accept="image/png, image/jpeg" name="lien_photo" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4  col-lg-4 col-12">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input class="form-control @error('nom') is-invalid @enderror" type="text"
                                            id="nom" name="nom" placeholder="Nom" value="{{ old('nom') }}"
                                            required autofocus />
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="prenom" class="form-label">Prénoms</label>
                                        <input class="form-control @error('prenom') is-invalid @enderror" type="text"
                                            id="prenom" placeholder="Prénoms" name="prenom"
                                            value="{{ old('prenom') }}" />
                                        @error('prenom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="sexe" class="form-label">Sexe</label>
                                        <select class="select2 form-select @error('sexe') is-invalid @enderror"
                                            name="sexe" id="sexe">
                                            <option value="">Sélectionner le sexe</option>
                                            <option value="Homme" {{ old('sexe') == 'Homme' ? 'selected' : '' }}>Homme
                                            </option>
                                            <option value="Femme" {{ old('sexe') == 'Femme' ? 'selected' : '' }}>Femme
                                            </option>
                                        </select>
                                        @error('sexe')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="date_naissance" class="form-label">Date de Naissance</label>
                                        <input class="form-control @error('date_naissance') is-invalid @enderror"
                                            type="date" id="date_naissance" name="date_naissance"
                                            value="{{ old('date_naissance') }}" autofocus />
                                        @error('date_naissance')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="lieu_naissance" class="form-label">Lieu de Naissance</label>
                                        <input class="form-control @error('lieu_naissance') is-invalid @enderror"
                                            type="text" id="lieu_naissance" placeholder="Lieu de Naissance"
                                            name="lieu_naissance" value="{{ old('lieu_naissance') }}" />
                                        @error('lieu_naissance')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="nationalite" class="form-label">Nationalité</label>
                                        <input class="form-control @error('nationalite') is-invalid @enderror"
                                            type="text" id="nationalite" placeholder="Nationalité" name="nationalite"
                                            value="{{ old('nationalite') }}" />
                                        @error('nationalite')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">État civil</label>
                                        <select id="etat_civil" name="etat_civil"
                                            class="select2 form-select @error('etat_civil') is-invalid @enderror">
                                            <option value="">Sélectionner l'état civil</option>
                                            <option value="marié(e)"
                                                {{ old('etat_civil') == 'marié(e)' ? 'selected' : '' }}>marié(e)</option>
                                            <option value="celibataire"
                                                {{ old('etat_civil') == 'celibataire' ? 'selected' : '' }}>célibataire
                                            </option>
                                            <option value="Divorcé"
                                                {{ old('etat_civil') == 'Divorcé' ? 'selected' : '' }}>Divorcé</option>
                                            <option value="Veuf(ve)"
                                                {{ old('etat_civil') == 'Veuf(ve)' ? 'selected' : '' }}>Veuf(ve)</option>
                                        </select>
                                        @error('etat_civil')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="adresse" class="form-label">Adresse</label>
                                        <input class="form-control @error('adresse') is-invalid @enderror" type="text"
                                            id="adresse" placeholder="Adresse" name="adresse"
                                            value="{{ old('adresse') }}" />
                                        @error('adresse')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="quartier" class="form-label">Quartier</label>
                                        <input class="form-control @error('quartier') is-invalid @enderror" type="text"
                                            id="quartier" placeholder="Quartier" name="quartier"
                                            value="{{ old('quartier') }}" />
                                        @error('quartier')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">contact</label>
                                        <input class="form-control @error('contact') is-invalid @enderror" type="text"
                                            id="contact" placeholder="contact" name="contact"
                                            value="{{ old('contact') }}" />
                                        @error('contact')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="contact_whatsapp" class="form-label">contact_whatsapp</label>
                                        <input class="form-control @error('contact_whatsapp') is-invalid @enderror"
                                            type="text" id="contact_whatsapp" placeholder="contact_whatsapp"
                                            name="contact_whatsapp" value="{{ old('contact_whatsapp') }}" />
                                        @error('contact_whatsapp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="email" class="form-label">email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                                            id="email" placeholder="email" name="email"
                                            value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="date_debut_compagnonnage"
                                            class="form-label">date_debut_compagnonnage</label>
                                        <input
                                            class="form-control @error('date_debut_compagnonnage') is-invalid @enderror"
                                            type="text" id="date_debut_compagnonnage"
                                            placeholder="date_debut_compagnonnage" name="date_debut_compagnonnage"
                                            value="{{ old('date_debut_compagnonnage') }}" />
                                        @error('date_debut_compagnonnage')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="activite_exerce" class="form-label">Activite exerce dans
                                            l'entreprise</label>
                                        <input class="form-control @error('activite_exerce') is-invalid @enderror"
                                            type="text" id="activite_exerce" placeholder="activite_exerce"
                                            name="activite_exerce" value="{{ old('activite_exerce') }}" />
                                        @error('activite_exerce')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="date_debut_compagnonnage_entreprise"
                                            class="form-label">date_debut_compagnonnage en entreprise</label>
                                        <input
                                            class="form-control @error('date_debut_compagnonnage_entreprise') is-invalid @enderror"
                                            type="text" id="date_debut_compagnonnage_entreprise"
                                            placeholder="date_debut_compagnonnage_entreprise"
                                            name="date_debut_compagnonnage_entreprise"
                                            value="{{ old('date_debut_compagnonnage_entreprise') }}" />
                                        @error('date_debut_compagnonnage_entreprise')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <diw class="row">
                                    <div class="mb-3 col-md-6 col-lg-6 col-12">
                                        <label for="etat_civil" class="form-label">numero_cnps</label>
                                        <input class="form-control @error('numero_cnps') is-invalid @enderror"
                                            type="text" id="numero_cnps" placeholder="numero_cnps" name="numero_cnps"
                                            value="{{ old('numero_cnps') }}" />
                                        @error('numero_cnps')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-6 col-lg-6 col-12">
                                        <label for="commune_id" class="form-label">Commune</label>
                                        <select id="commune_id"
                                            class="select2 form-select @error('commune_id') is-invalid @enderror"
                                            name="commune_id">
                                            <option value="">Sélectionner la commune</option>
                                            @foreach ($communes as $commune)
                                                <option value="{{ $commune->id }}"
                                                    {{ old('commune_id') == $commune->id ? 'selected' : '' }}>
                                                    {{ $commune->libelle }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('commune_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </diw>
                                <div class="row">
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="type_document_id" class="form-label">Type Document</label>
                                        <select id="type_document_id"
                                            class="select2 form-select @error('type_document_id') is-invalid @enderror"
                                            name="type_document_id">
                                            <option value="">Sélectionner typeDocument</option>
                                            @foreach ($typeDocuments as $typeDocument)
                                                <option value="{{ $typeDocument->id }}"
                                                    {{ old('type_document_id') == $typeDocument->id ? 'selected' : '' }}>
                                                    {{ $typeDocument->libelle }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('type_document_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">lien_type_document</label>
                                        <input class="form-control @error('lien_type_document') is-invalid @enderror"
                                            type="file" id="lien_type_document" placeholder="lien_type_document"
                                            name="lien_type_document" value="{{ old('lien_type_document') }}" />
                                        @error('lien_type_document')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">autre_document</label>
                                        <input class="form-control @error('autre_document') is-invalid @enderror"
                                            type="text" id="autre_document" placeholder="autre_document"
                                            name="autre_document" value="{{ old('autre_document') }}" />
                                        @error('autre_document')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">numero_document</label>
                                        <input class="form-control @error('numero_document') is-invalid @enderror"
                                            type="text" id="numero_document" placeholder="numero_document"
                                            name="numero_document" value="{{ old('numero_document') }}" />
                                        @error('numero_document')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">date_delivrance_document</label>
                                        <input
                                            class="form-control @error('date_delivrance_document') is-invalid @enderror"
                                            type="date" id="date_delivrance_document"
                                            placeholder="date_delivrance_document" name="date_delivrance_document"
                                            value="{{ old('date_delivrance_document') }}" />
                                        @error('date_delivrance_document')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">lieu_delivrance_document</label>
                                        <input
                                            class="form-control @error('lieu_delivrance_document') is-invalid @enderror"
                                            type="text" id="lieu_delivrance_document"
                                            placeholder="lieu_delivrance_document" name="lieu_delivrance_document"
                                            value="{{ old('lieu_delivrance_document') }}" />
                                        @error('lieu_delivrance_document')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <p>Information sur la formation professionnel</p>
                                <div class="row">
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="niveau_etude" class="form-label">Niveau d'étude</label>
                                        <select id="niveau_etude" name="niveau_etude"
                                            class="select2 form-select @error('niveau_etude') is-invalid @enderror">
                                            <option value="">Select Niveau d'étude</option>
                                            <option value="Non scolarisé"
                                                {{ old('niveau_etude') == 'Non scolarisé' ? 'selected' : '' }}>Non
                                                scolarisé</option>
                                            <option value="Primaire"
                                                {{ old('niveau_etude') == 'Primaire' ? 'selected' : '' }}>Primaire</option>
                                            <option value="Secondaire"
                                                {{ old('niveau_etude') == 'Secondaire' ? 'selected' : '' }}>Secondaire
                                            </option>
                                            <option value="Supérieur"
                                                {{ old('niveau_etude') == 'Supérieur' ? 'selected' : '' }}>Supérieur
                                            </option>
                                        </select>
                                        @error('niveau_etude')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">classe</label>
                                        <input class="form-control @error('classe') is-invalid @enderror" type="text"
                                            id="classe" placeholder="classe" name="classe"
                                            value="{{ old('classe') }}" />
                                        @error('classe')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">diplome_etude_obtenu</label>
                                        <input class="form-control @error('diplome_etude_obtenu') is-invalid @enderror"
                                            type="text" id="diplome_etude_obtenu" placeholder="diplome_etude_obtenu"
                                            name="diplome_etude_obtenu" value="{{ old('diplome_etude_obtenu') }}" />
                                        @error('diplome_etude_obtenu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="apprentissage_metier" class="form-label">Apprentissage du
                                            metiere</label>
                                        <select id="apprentissage_metier" name="apprentissage_metier"
                                            class="select2 form-select @error('apprentissage_metier') is-invalid @enderror">
                                            <option value="">Select Niveau d'étude</option>
                                            <option value="Sur le tas"
                                                {{ old('apprentissage_metier') == 'Sur le tas' ? 'selected' : '' }}>Sur le
                                                tas
                                            </option>
                                            <option value="Centre de Formation Professionnelle (CFP)"
                                                {{ old('apprentissage_metier') == 'Centre de Formation Professionnelle (CFP)' ? 'selected' : '' }}>
                                                Centre de Formation Professionnelle (CFP)</option>
                                        </select>
                                        @error('apprentissage_metier')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-4 col-lg-4 col-12">
                                        <label for="etat_civil" class="form-label">niveau</label>
                                        <input class="form-control @error('niveau') is-invalid @enderror" type="text"
                                            id="niveau" placeholder="niveau" name="niveau"
                                            value="{{ old('niveau') }}" />
                                        @error('niveau')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2 col-lg-2 col-12">
                                        <label for="etat_civil" class="form-label">diplome_metier_obtenu</label>
                                        <input class="form-control @error('diplome_metier_obtenu') is-invalid @enderror"
                                            type="text" id="diplome_metier_obtenu" placeholder="diplome_metier_obtenu"
                                            name="diplome_metier_obtenu" value="{{ old('diplome_metier_obtenu') }}" />
                                        @error('diplome_metier_obtenu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-2 col-lg-2 col-12">
                                        <label for="diplome_cnmci" class="form-label">Apprentissage du
                                            metiere</label>
                                        <select id="diplome_cnmci" name="diplome_cnmci"
                                            class="select2 form-select @error('diplome_cnmci') is-invalid @enderror">
                                            <option value="">Select Niveau d'étude</option>
                                            <option value="Maître artisan"
                                                {{ old('diplome_cnmci') == 'Maître artisan' ? 'selected' : '' }}>Maître artisan
                                            </option>
                                            <option value="Fin apprentissage"
                                                {{ old('diplome_cnmci') == 'Fin apprentissage' ? 'selected' : '' }}>
                                                Fin apprentissage</option>
                                        </select>
                                        @error('diplome_cnmci')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Envoyer</button>
                                {{-- <button type="reset" class="btn btn-label-secondary">A</button> --}}
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function validateForm(event, step) {
            event.preventDefault();
            let valid = true;
            const stepContainers = document.querySelectorAll('.content');
            const currentStep = stepContainers[step - 1];
            const inputs = currentStep.querySelectorAll('input, select');

            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    valid = false;
                }
            });

            if (valid) {
                stepContainers[step - 1].style.display = 'none';
                stepContainers[step].style.display = 'block';
            } else {
                alert('Veuillez remplir tous les champs requis.');
            }
        }
    </script>

    <script src="{{ asset('assets/dashboard/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/%40form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/%40form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/%40form-validation/auto-focus.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/form-wizard-numbered.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/form-wizard-validation.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/pages-account-settings-account.js') }}"></script>

    {{-- image --}}
    <script src="{{ asset('assets/dashboard/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endpush
