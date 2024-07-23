@extends('layouts.dashboard', ['title' => 'Modifier  d\'actualité'])
@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Actualites /</span> Modifier
        </h4>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Renseignez le formulaire</h5>
                    <div class="card-body">
                        {{-- <form class="row g-3" action="{{ route('actualites.update', $actualite->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <h6>Veuillez remplir les informations pour la creation d'une actualites</h6>
                                <hr class="mt-0" />
                            </div>
                            <div class="row mb-3">
                                @if ($actualite->lien_photo)
                                    <span>Image(s)</span>
                                    <div class="col-lg-4 col-md-4">
                                        <img src="{{ asset($actualite->lien_photo) }}" alt="Image Actualité"
                                            class="img-thumbnail mt-3" width="70" height="70">
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-12">
                                    <label class="form-label" for="formValidationName">Libellé</label>
                                    <input type="text" id="libelle" name="libelle"
                                        class="form-control @error('libelle') is-invalid @enderror"
                                        value="{{ old('libelle', $actualite->libelle) }}" placeholder="Actualité"
                                        autocomplete="libelle" autofocus required>
                                    @error('libelle')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-lg-4 col-12">
                                    <div class="form-password-toggle">
                                        <label class="form-label" for="lien_photo">Images</label>
                                        <input class="form-control @error('lien_photo') is-invalid @enderror" type="file"
                                            id="lien_photo" name="lien_photo" />
                                        @error('lien_photo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-2 col-lg-2 col-12">
                                    <div class="form-password-toggle">
                                        <label class="form-label" for="date_actualite">Date de l'actualité</label>
                                        <input class="form-control @error('date_actualite') is-invalid @enderror"
                                            type="date" id="date_actualite" name="date_actualite"
                                            value="{{ old('date_actualite', $actualite->date_actualite) }}" />
                                        @error('date_actualite')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-12">
                                    <label class="form-label" for="formValidationEmail">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" type="text" id="description"
                                        name="description" cols="30" rows="10"> {{ old('description', $actualite->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </form> --}}
                        <form action="{{ route('actualites.update', $actualite->id) }}" method="POST" id="edit_actualite_form"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                @if ($actualite->lien_photo)
                                    <div class="col-lg-4 col-md-4">
                                        <img src="{{ asset($actualite->lien_photo) }}" alt="Image Actualité"
                                            class="img-thumbnail mt-3" width="70" height="70">
                                    </div>
                                @endif
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-floating">
                                        <input type="file" id="lien_photo" name="lien_photo"
                                            class="form-control @error('lien_photo') is-invalid @enderror" placeholder="Photo"
                                            autocomplete="lien_photo" autofocus>
                                        <label for="lien_photo">Photo<span class="text-danger fw-bold"></span></label>
                                        @error('lien_photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5">
                                    <div class="form-floating">
                                        <input type="text" id="libelle" name="libelle"
                                            class="form-control @error('libelle') is-invalid @enderror"
                                            value="{{ old('libelle', $actualite->libelle) }}" placeholder="Actualité"
                                            autocomplete="libelle" autofocus required>
                                        <label>Entrez le libelle<span class="text-danger fw-bold">*</span></label>
                                        @error('libelle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-floating">
                                        <input type="date" id="date_actualite" name="date_actualite"
                                            class="form-control @error('date_actualite') is-invalid @enderror"
                                            value="{{ old('date_actualite', $actualite->date_actualite) }}"
                                            placeholder="Date actualité" autocomplete="date_actualite" autofocus required>
                                        <label>Entrez la date<span class="text-danger fw-bold">*</span></label>
                                        @error('date_actualite')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                {{-- <div class="col-lg-12 col-md-12">
                                    <label for="description" class="form-label">Description<span
                                            class="text-danger fw-bold">*</span></label>
                                    <textarea  name="description" class="form-control no-resize @error('description') is-invalid @enderror"
                                        autocomplete="description" autofocus required>{{ old('description', $actualite->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="col-md-12 col-lg-12 col-12">
                                    <label class="form-label" for="formValidationEmail">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" type="text" id="description"
                                        name="description" cols="30" rows="10"> {{ old('description', $actualite->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <p><span class="text-danger fw-bold">*</span>Champs obligatoires.</p>
                            </div>
                            <div class="row g-3 ">
                                <div class="mx-auto d-flex justify-content-center">

                                    <a href="{{ route('actualites.index') }}" class="btn btn-secondary w-25 mx-2">Annuler</a>
                                    <button type="submit" id="add_admin_btn"
                                        class="btn btn-primary w-25 mx-2">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /FormValidation -->
        </div>

    </div>
@endsection
@push('js')
@endpush
