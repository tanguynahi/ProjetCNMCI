@extends('layouts.dashboard', ['title' => 'Ajouter une images'])
@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Slides /</span> Ajouter
        </h4>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Formulaire d'ajoute d'Images</h5>
                    <div class="card-body">
                        {{-- <form class="row g-3" action="{{ route('actualites.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <h6>Veuillez remplir les informations pour l'ajoute d'une images</h6>
                                <hr class="mt-0" />
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-12">
                                    <label class="form-label" for="formValidationName">Libellé</label>
                                    <input type="text" id="formValidationName"
                                        class="form-control @error('libelle') is-invalid @enderror"
                                        placeholder="Libellé de l'actualité" name="libelle" value="{{ old('libelle') }}" />
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
                                            value="{{ old('date_actualite') }}" />
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
                                        name="description" placeholder="Description" value="{{ old('description') }}" cols="30" rows="10"></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <a href="{{ route('actualites.index') }}" class="btn btn-secondary w-25 mx-2">Annuler</a>
                                <button  type="submit" class="btn btn-primary  w-25 mx-2">Envoyer</button>
                            </div>
                        </form> --}}
                        <form action="{{ route('slides.store') }}" method="POST" id="add_imageSlide_form"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating">
                                        <input type="text" id="titre" name="titre"
                                            class="form-control @error('titre') is-invalid @enderror"
                                            value="{{ old('titre') }}" placeholder="Titre" autocomplete="titre" autofocus
                                            required>
                                        <label>Entrez le titre<span class="text-danger fw-bold">*</span></label>
                                        @error('titre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating">
                                        <input type="text" id="sous_titre" name="sous_titre"
                                            class="form-control @error('sous_titre') is-invalid @enderror"
                                            value="{{ old('sous_titre') }}" placeholder="Sous-titre de l'image"
                                            autocomplete="sous_titre" autofocus>
                                        <label>Entrez le sous-titre<span class="text-danger fw-bold"></span></label>
                                        @error('sous_titre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select form-control @error('categorie') is-invalid @enderror"
                                            id="categorie" name="categorie" autocomplete="categorie" autofocus required>
                                            <option value="">Sélectionnez la catégorie</option>
                                            <option value="Image Carousel"
                                                {{ old('categorie') == 'Image Carousel' ? 'selected' : '' }}>Image Carousel
                                            </option>
                                            <option value="Image Partenaire"
                                                {{ old('categorie') == 'Image Partenaire' ? 'selected' : '' }}>Image
                                                Partenaire</option>
                                        </select>
                                        @error('categorie')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="categorie">Catégorie<span class="text-danger fw-bold">*</span></label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating">
                                        <input type="file" id="lien_image" name="lien_image"
                                            class="form-control @error('lien_image') is-invalid @enderror"
                                            value="{{ old('lien_image') }}" placeholder="Image" autocomplete="lien_image"
                                            autofocus required>
                                        <label for="lien_image">Image<span class="text-danger fw-bold">*</span></label>
                                        @error('lien_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p><span class="text-danger fw-bold">*</span>Champs obligatoires.</p>
                            </div>
                            <div class="row g-3 ">
                                <div class="mx-auto d-flex justify-content-center">

                                    <button type="reset" class="btn btn-secondary w-25 mx-2">Annuler</button>
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
