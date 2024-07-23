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
                        <form action="{{ route('administrateurs.update', $administrateur->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
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
                            </div>
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
        <!-- Form with Tabs -->
        <div class="row">
            <div class="col">
                <h6 class="mt-4"> Information sur le site </h6>
                <div class="card mb-3">
                    <div class="card-header pt-2">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-personal"
                                    role="tab" aria-selected="true"> Info Site</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-social"
                                    role="tab" aria-selected="false">Reseau Sociaux</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                            <form action="{{ route('parametres.update', $parametre->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="row">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            @if (!empty($parametre->lien_logo))
                                                                <img src="{{ $parametre->lien_logo }}" alt="Logo"
                                                                    class="d-block w-px-100 h-px-100 rounded"
                                                                    id="logoImage" />
                                                            @else
                                                                <img src="{{ asset('assets/dashboard/img/avatars/14.png') }}"
                                                                    alt="Logo"
                                                                    class="d-block w-px-100 h-px-100 rounded"
                                                                    id="logoImage" />
                                                            @endif
                                                            <div class="button-wrapper">
                                                                <label for="lien_logo" class="btn btn-primary me-2 mb-3"
                                                                    tabindex="0">
                                                                    <i class="ti ti-upload d-block d-sm-none"></i> logo
                                                                    <input type="file" id="lien_logo"
                                                                        class="account-file-input" hidden
                                                                        accept="image/png, image/jpeg"
                                                                        name="lien_photo" />
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="row">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            @if (!empty($parametre->lien_photo_directeur))
                                                                <img src="{{ $parametre->lien_photo_directeur }}"
                                                                    alt="Image Directeur"
                                                                    class="d-block w-px-100 h-px-100 rounded"
                                                                    id="DGImage" />
                                                            @else
                                                                <img src="{{ asset('assets/dashboard/img/avatars/14.png') }}"
                                                                    alt="Image Directeur"
                                                                    class="d-block w-px-100 h-px-100 rounded"
                                                                    id="DGImage" />
                                                            @endif
                                                            <div class="button-wrapper">
                                                                <label for="lien_photo_directeur"
                                                                    class="btn btn-primary me-2 mb-3" tabindex="0">
                                                                    <i class="ti ti-upload d-block d-sm-none"></i> Photo
                                                                    Directeur
                                                                    <input type="file" id="lien_photo_directeur"
                                                                        class="account-file-input" hidden
                                                                        accept="image/png, image/jpeg"
                                                                        name="lien_photo_directeur" />
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" id="nom_site_web" name="nom_site_web"
                                                        class="form-control @error('nom_site_web') is-invalid @enderror"
                                                        value="{{ old('nom_site_web', $parametre->nom_site_web) }}"
                                                        placeholder="Nom de la platforme" autocomplete="nom_site_web"
                                                        autofocus required>
                                                    <label>Entrez le nom de la plateforme<span
                                                            class="text-danger fw-bold">*</span></label>
                                                    @error('nom_site_web')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control @error('adresse') is-invalid @enderror"
                                                            id="adresse" name="adresse"
                                                            value="{{ old('adresse', $parametre->adresse) }}"
                                                            placeholder="adresse" autocomplete="adresse" autofocus>
                                                        @error('adresse')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <label>Entrez une adresse</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control @error('contact_1') is-invalid @enderror"
                                                            id="contact_1" name="contact_1"
                                                            value="{{ old('contact_1', $parametre->contact_1) }}"
                                                            minlength="10" maxlenghth="10" placeholder="Ex: 0777007700"
                                                            autocomplete="contact_1" autofocus required>
                                                        @error('contact_1')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <label>Entrez le contact 1<span
                                                                class="text-danger fw-bold">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <div class="form-floating">
                                                        <input type="text"
                                                            class="form-control @error('contact_2') is-invalid @enderror"
                                                            id="contact_2" name="contact_2"
                                                            value="{{ old('contact_2', $parametre->contact_2) }}"
                                                            minlength="10" maxlenghth="10" placeholder="Ex: 0777007700"
                                                            autocomplete="contact_2" autofocus>
                                                        @error('contact_2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <label>Entrez le contact 2<span
                                                                class="text-danger fw-bold"></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="email_1"
                                                        class="form-control @error('email_1') is-invalid @enderror"
                                                        id="email_1" name="email_1"
                                                        value="{{ old('email_1', $parametre->email_1) }}"
                                                        placeholder="Email 1" autocomplete="email_1" autofocus required>
                                                    @error('email_1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <label>Entrez l'email 1<span
                                                            class="text-danger fw-bold">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="email_2"
                                                        class="form-control @error('email_2') is-invalid @enderror"
                                                        id="email_1" name="email_2"
                                                        value="{{ old('email_2', $parametre->email_2) }}"
                                                        placeholder="Email 2" autocomplete="email_2" autofocus>
                                                    @error('email_2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <label>Entrez l'email 2<span
                                                            class="text-danger fw-bold"></span></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="file" id="lien_video" name="lien_video"
                                                        class="form-control @error('lien_video') is-invalid @enderror"
                                                        value="{{ old('lien_video', $parametre->lien_video) }}"
                                                        placeholder="Lien-Vidéo de présentation" autocomplete="lien_video"
                                                        autofocus>
                                                    <label for="lien_video">Sihii-tech (Image)<span
                                                            class="text-danger fw-bold"></span></label>
                                                    @error('lien_video')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="url" id="lien_google_map" name="lien_google_map"
                                                        class="form-control @error('lien_google_map') is-invalid @enderror"
                                                        value="{{ old('lien_google_map', $parametre->lien_google_map) }}"
                                                        placeholder="Lien google map" autocomplete="lien_google_map"
                                                        autofocus>
                                                    <label for="lien_google_map">Lien google map<span
                                                            class="text-danger fw-bold"></span></label>
                                                    @error('lien_google_map')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <label for="mot_du_directeur" class="form-label">Mot du Directeur <span
                                                        class="text-danger fw-bold">*</span></label>
                                                <textarea cols="30" rows="10" name="mot_du_directeur"
                                                    class="form-control no-resize @error('mot_du_directeur') is-invalid @enderror" autocomplete="mot_du_directeur"
                                                    autofocus required>{{ old('mot_du_directeur', $parametre->mot_du_directeur) }}</textarea>
                                                @error('mot_du_directeur')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <p><span
                                            class="text-danger fw-bold">*</span> Champs Obligatoire</p>

                                        <div class="pt-4 text-center">
                                            <button type="submit"
                                                class="btn btn-primary me-sm-3 me-1">Enregistrer</button>
                                            <button type="reset" class="btn btn-label-secondary">Annuler</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="form-tabs-social" role="tabpanel">
                            <form action="{{ route('paramtre.reseauSociaux', $parametre->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-md-4 col-lg-4 col-12">
                                        <label class="form-label" for="formtabs-twitter">Twitter</label>
                                        <input type="url" id="lien_twitter" name="lien_twitter"
                                            class="form-control @error('lien_twitter') is-invalid @enderror"
                                            value="{{ old('lien_twitter', $parametre->lien_twitter) }}"
                                            placeholder="https://twitter.com/abc" />
                                        @error('lien_twitter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-12">
                                        <label class="form-label" for="formtabs-facebook">Facebook</label>
                                        <input type="url" id="lien_facebook" name="lien_facebook"
                                            class="form-control @error('lien_facebook') is-invalid @enderror"
                                            value="{{ old('lien_facebook', $parametre->lien_facebook) }}"
                                            placeholder="https://facebook.com/abc" />
                                            @error('lien_facebook')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-12">
                                        <label class="form-label" for="formtabs-linkedin">Linkedin</label>
                                        <input type="url" id="lien_linkedin" name="lien_linkedin"
                                            class="form-control @error('lien_linkedin') is-invalid @enderror"
                                            placeholder="https://linkedin.com/abc"
                                            value="{{ old('lien_linkedin', $parametre->lien_linkedin) }}" />
                                        @error('lien_linkedin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 col-12">
                                        <label class="form-label" for="formtabs-instagram">Instagram</label>
                                        <input type="url" id="lien_instagram" name="lien_instagram"
                                            class="form-control @error('lien_instagram') is-invalid @enderror"
                                            value="{{ old('lien_instagram', $parametre->lien_instagram) }}"
                                            placeholder="https://instagram.com/abc" />
                                            @error('lien_instagram')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-12">
                                        <label class="form-label" for="lien_youtube">Youtube</label>
                                        <input type="url"  name="lien_youtube" id="lien_youtube" class="form-control @error('lien_youtube') is-invalid @enderror"
                                        value="{{ old('lien_youtube', $parametre->lien_youtube) }}" placeholder="https://youtube.com/abc" />
                                        @error('lien_youtube')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-12">
                                        <label class="form-label" for="lien_whatsapp">Youtube</label>
                                        <input type="url"  name="lien_whatsapp" id="lien_whatsapp" class="form-control @error('lien_whatsapp') is-invalid @enderror"
                                        value="{{ old('lien_whatsapp', $parametre->lien_whatsapp) }}" placeholder="https://whatsapp.com/abc" />
                                        @error('lien_whatsapp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="pt-4 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Enregistré</button>
                                    <button type="reset" class="btn btn-label-secondary">Annuler</button>
                                </div>
                            </form>
                        </div>
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
