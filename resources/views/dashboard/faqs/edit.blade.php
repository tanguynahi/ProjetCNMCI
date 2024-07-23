@extends('layouts.dashboard', ['title' => 'Modifier une image'])
@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Faqs /</span> Modifier
        </h4>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Renseignez le formulaire</h5>
                    <div class="card-body">
                        <form action="{{ route('faqs.update', $faq->id) }}" method="POST" id="edit_imageSlide_form"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating">
                                        <input type="text" id="titre" name="titre"
                                            class="form-control @error('titre') is-invalid @enderror"
                                            value="{{ old('titre', $slide->titre) }}" placeholder="Titre" autocomplete="titre"
                                            autofocus required>
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
                                        <input type="sous_titre" id="sous_titre" name="sous_titre"
                                            class="form-control @error('sous_titre') is-invalid @enderror"
                                            value="{{ old('sous_titre', $slide->sous_titre) }}"
                                            placeholder="Sous-titre de l'image" autocomplete="sous_titre" autofocus>
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
                                            @foreach (['Image Annonce','Image Carousel', 'Image Partenaire'] as $categorie)
                                                <option value="{{ $categorie }}" {{ $categorie === $slide->categorie ? 'selected' : '' }}>
                                                    {{ $categorie }}
                                                </option>
                                            @endforeach
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
                                            value="{{ old('lien_image',$slide->lien_image       ) }}" placeholder="Image" autocomplete="lien_image"
                                            autofocus>
                                        <label for="lien_image">Image<span class="text-danger fw-bold">*</span></label>
                                        @error('lien_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @if ($slide->lien_image)
                                    <div class="col-lg-4 col-md-4">
                                        <img src="{{ asset($slide->lien_image) }}" alt="Image {{ $slide->categorie }}"
                                            class="img-thumbnail mt-3" width="130" height="120">
                                    </div>
                                @endif
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
