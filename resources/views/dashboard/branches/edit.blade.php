@extends('layouts.dashboard', ['title' => 'Modifier une Branche'])
@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Branche /</span> Modifier
        </h4>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Renseignez le formulaire</h5>
                    <div class="card-body">
                        <form action="{{ route('branche.update', $brancheActivite->id) }}" method="POST" id="edit_imageSlide_form"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating">
                                        <input type="text" id="libelle" name="libelle"
                                            class="form-control @error('libelle') is-invalid @enderror"
                                            value="{{ old('libelle', $brancheActivite->libelle) }}" placeholder="Titre"
                                            autocomplete="libelle" autofocus required>
                                        <label>Entrez le libelle<span class="text-danger fw-bold">*</span></label>
                                        @error('libelle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-floating">
                                        <input type="text" id="description" name="description"
                                            class="form-control @error('description') is-invalid @enderror"
                                            value="{{ old('description', $brancheActivite->description) }}"
                                            placeholder="Sous-titre de l'image" autocomplete="description" autofocus>
                                        <label>Entrez le sous-titre<span class="text-danger fw-bold"></span></label>
                                        @error('description')
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
