@extends('layouts.dashboard', ['title' => 'creation d\'actualité'])
@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Actualites /</span> Creation
        </h4>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Formulaire de creation d'actualité</h5>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('actualites.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <h6>1. Veuillez remplir les informations pour la creation d'une actualites</h6>
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
