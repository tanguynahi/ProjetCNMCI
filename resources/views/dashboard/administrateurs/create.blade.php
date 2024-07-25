@extends('layouts.dashboard', ['title' => 'Les parametres'])
@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Parametre /</span> Formulaire d'enregistrement </h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Detail du Profil</h5>
                        <small class="text-muted float-end">Information sur l'administrateur</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('administrateurs.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <div class="row">
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="{{ Auth::check() && auth()->user()->administrateur->lien_photo ? auth()->user()->administrateur->lien_photo : asset('assets/dashboard/img/avatars/14.png') }}"
                                            alt="user-avatar" class="d-block w-px-100 h-px-100 rounded"
                                            id="uploadedAvatar" />
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                                <i class="ti ti-upload d-block d-sm-none"></i> Photo Profil
                                                <input type="file" id="upload" class="account-file-input" hidden
                                                    accept="image/png, image/jpeg" name="lien_photo" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Nom </label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text "><i
                                                    class="ti ti-user"></i></span>
                                            <input type="text" name="nom" id="nom"
                                                class="form-control @error('nom') is-invalid @enderror"
                                                placeholder="Nom administrateur"
                                                value="{{ old('nom', $administrateur->nom) }}" autocomplete="nom" autofocus
                                                required />
                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Prénom </label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-fullname2" class="input-group-text "><i
                                                    class="ti ti-user"></i></span>
                                            <input type="text" name="prenom" id="prenom"
                                                class="form-control @error('prenom') is-invalid @enderror"
                                                placeholder="Prénom administrateur"
                                                value="{{ old('prenom', $administrateur->prenom) }}" autocomplete="prenom"
                                                autofocus required />
                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Email</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="ti ti-mail"></i></span>
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email de L'administrateur"
                                                value="{{ old('email', $administrateur->email) }}" autocomplete="email"
                                                autofocus required />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Contact </label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                    class="ti ti-phone"></i></span>
                                            <input type="text" name="contact" id="contact"
                                                class="form-control @error('contact') is-invalid @enderror"
                                                placeholder="Prénom administrateur"
                                                value="{{ old('contact', $administrateur->contact) }}"
                                                autocomplete="contact" autofocus required />
                                            @error('contact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Ville</label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-phone2" class="input-group-text"><i
                                                    class="fa-solid fa-city"></i></span>
                                            <select id="ville_id" name="ville_id"
                                                class="select2 form-select @error('ville_id') is-invalid @enderror"
                                                data-allow-clear="true">
                                                <option value="">Selectionner la Ville</option>
                                                @foreach ($villes as $ville)
                                                    <option value="{{ $ville->id }} "
                                                        {{ old('ville_id', $administrateur->ville_id) == $ville->id ? 'selected' : '' }}>
                                                        {{ $ville->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sexe')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Sexe</label>
                                        <div class="input-group input-group-merge">
                                            <select id="sexe" name="sexe"
                                                class="select2 form-select @error('sexe') is-invalid @enderror"
                                                data-allow-clear="true">
                                                <option value="">Selectionner le sexe</option>
                                                @foreach (['M', 'F'] as $sexe)
                                                    <option value="{{ $sexe }} "
                                                        {{ old('sexe', $administrateur->sexe) == $sexe ? 'selected' : '' }}>
                                                        @if ($sexe === 'M')
                                                            {{ $sexe = 'Homme' }}
                                                        @else
                                                            {{ $sexe = 'Femme' }}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sexe')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">Adresse </label>
                                        <div class="input-group input-group-merge">
                                            <span id="basic-icon-default-message2" class="input-group-text"><i
                                                    class="ti ti-message-dots"></i></span>
                                            <input type="text" name="adresse" id="adresse"
                                                class="form-control @error('adresse') is-invalid @enderror"
                                                placeholder="adresse administrateur"
                                                value="{{ old('adresse', $administrateur->adresse) }}"
                                                autocomplete="adresse" autofocus required />
                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Enregistré</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Changer le mot de passe</h5> <small class="text-muted float-end">Changement le
                            mot de passe de l'administrateur</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('administrateur.password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="basic-default-fullname">Nom Prenoms </label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="{{ old('nom', $administrateur->nom) }} {{ old('prenom', $administrateur->prenom) }}"
                                        value="{{ old('nom', $administrateur->nom) }} {{ old('prenom', $administrateur->prenom) }}"
                                        disabled readonly />
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="basic-default-fullname">Email </label>
                                    <input type="email" class="form-control" id="basic-default-fullname"
                                        placeholder="{{ old('email', $administrateur->email) }}"
                                        value="{{ old('email', $administrateur->email) }}" disabled readonly />
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-12 col-md-12">
                                    <label class="form-label" for="password">Mot de passe Actuel</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" placeholder="XXXXXXXX" value="{{ old('password') }}" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="input-group-text cursor-pointer"
                                            id="toggle-password-visibility-password"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label class="form-label" for="new_password">Nouveau Mot de Passe</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="new_password" id="new_password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            placeholder="XXXXXXX"
                                            aria-describedby="toggle-password-visibility-new_password" min="6" />
                                        @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="input-group-text cursor-pointer"
                                            id="toggle-password-visibility-new_password"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <label class="form-label" for="new_password_confirmation">Confirmer Mot de
                                        Passe</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="new_password_confirmation"
                                            id="new_password_confirmation"
                                            class="form-control @error('new_password_confirmation') is-invalid @enderror"
                                            placeholder="XXXXXXX"
                                            aria-describedby="toggle-password-visibility-password_confirmation" />
                                        @error('new_password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <span class="input-group-text cursor-pointer"
                                            id="toggle-password-visibility-password_confirmation"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary mt-3">Enregistré</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
@push('js')
    <script>
        document.getElementById('upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('uploadedAvatar').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script>
        document.getElementById('lien_logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('logoImage').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script>
        document.getElementById('lien_photo_directeur').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('DGImage').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Array of password fields and their toggle buttons
            const passwordFields = [{
                    inputId: 'password',
                    toggleId: 'toggle-password-visibility-password'
                },
                {
                    inputId: 'new_password',
                    toggleId: 'toggle-password-visibility-new_password'
                },
                {
                    inputId: 'password_confirmation',
                    toggleId: 'toggle-password-visibility-password_confirmation'
                }
            ];

            // Loop through each password field and add event listener for toggle button
            passwordFields.forEach(field => {
                const passwordInput = document.getElementById(field.inputId);
                const toggleButton = document.getElementById(field.toggleId);
                const eyeIcon = toggleButton.querySelector('i');

                toggleButton.addEventListener('click', function() {
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        eyeIcon.classList.remove('ti-eye-off');
                        eyeIcon.classList.add('ti-eye');
                    } else {
                        passwordInput.type = 'password';
                        eyeIcon.classList.remove('ti-eye');
                        eyeIcon.classList.add('ti-eye-off');
                    }
                });
            });
        });
    </script>
@endpush
