@extends('layouts.home_login', ['title' => 'Détails Identification'])
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/home/cssbundle/bootstrapdatepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/vendor/parsleyjs/css/parsley.css') }}">
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/luno-style.css') }}">
    <!-- Prism css file please do not add in your project -->
    <link rel="stylesheet" href="{{ asset('assets/home/vendor/prismjs/prism.css') }}">
@endpush
@section('content')
    <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1"
        style="background-image:url('{{ asset('assets/home/show.jpg') }}'); background-repeat: no-repeat; background-size:cover;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <div class="card shadow-sm w-100 p-4 p-md-5 " style="max-width: 45rem;">
                        <!-- Form -->
                        <form action="{{ route('paiement.inscription') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 text-center mb-2">
                                    <h1 style="text-transform: uppercase">Détails Identification</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <label class="form-label fw-bold text-primary">ENTREPRISE </label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                        <label class="form-label fw-bold">Nom </label>
                                        <p class="h6">{{ $artisan->nom }}</p>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                        <label class="form-label fw-bold">Prénoms </label>
                                        <p class="h6">{{ $artisan->prenom }}</p>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-7">
                                        <label class="form-label fw-bold">Dénomination </label>
                                        <p class="h6">{{ $activiteArtisan->denomination_entreprise }}</p>
                                    </div>
                                </div>
                                <input type="number" name="activite_artisan_id" id="activite_artisan_id"
                                    value="{{ $activiteArtisan->id }}" class="form-control form-control-lg"placeholder=""
                                    hidden>
                                <input type="number" name="chambre_regionale_id" id="chambre_regionale_id"
                                    value="{{ $activiteArtisan->chambre_regionale_id }}"
                                    class="form-control form-control-lg"placeholder="" hidden>
                                <input type="number" name="artisan_id" id="artisan_id" value="{{ $artisan->id }}"
                                    class="form-control form-control-lg"placeholder="" hidden>

                                @if ($facturationCarteMembre != null)
                                    <input type="number" name="facturation_id_1" id=""
                                        value="{{ $facturationInscription->id }}"
                                        class="form-control form-control-lg"placeholder="" hidden>
                                    <input type="number" name="facturation_id_2" id=""
                                        value="{{ $facturationCarteMembre->id }}"
                                        class="form-control form-control-lg"placeholder="" hidden>

                                    <div class="row">
                                        <p>Type : {{ $facturationInscription->libelle }}</p>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label class="form-label fw-bold">Carte Artisan </label>
                                            <p class="h6">5 000 FCFA</p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label class="form-label fw-bold"> Droit d'adhesion </label>
                                            <p class="h6">{{ $facturationInscription->total_apayer - 5000 }} FCFA</p>

                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label class="form-label text-danger fw-bold">Montant à payer </label> <br>
                                            <p class="h6">{{ $facturationInscription->total_apayer }} FCFA</p>
                                            <input type="number" name="faturationinscription" id="faturationinscription"
                                                hidden value="{{ $facturationInscription->total_apayer }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <label class="form-label fw-bold text-primary">COLLABORATEURS </label>
                                        </div>
                                        <p>Type : {{ $facturationCarteMembre->libelle }}(s)</p>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                            <label class="form-label fw-bold">Nbre compagnons </label>
                                            <p class="h6">{{ $activiteArtisan->nombre_compagnon }}</p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label class="form-label fw-bold">Prix unitaire </label>
                                            <p class="h6">5 000 FCFA</p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label class="form-label fw-bold">Montant à payer </label>
                                            <p class="h6">{{ $activiteArtisan->nombre_compagnon * 5000 }} FCFA</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                            <label class="form-label fw-bold" for="choix1"> Payé carte </label>
                                            <input type="checkbox" value="{{ $activiteArtisan->nombre_compagnon * 5000 }}"
                                                class="form-check-input exclusive-checkbox" name="" id="choix1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                            <label class="form-label fw-bold">Nbre d'apprentis </label>
                                            <p class="h6">{{ $activiteArtisan->nombre_apprenti }}</p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label class="form-label fw-bold">Prix unitaire </label>
                                            <p class="h6">5 000 FCFA</p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4 ">
                                            <label class="form-label fw-bold">Montant à payer </label>
                                            <p class="h6">{{ $activiteArtisan->nombre_apprenti * 5000 }} FCFA</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                            <label class="form-label fw-bold" for="choix2"> Payé carte </label>
                                            <input type="checkbox" value="{{ $activiteArtisan->nombre_apprenti * 5000 }}"
                                                class="form-check-input exclusive-checkbox" name=""
                                                id="choix2">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <p class="h4 fw-bold text-danger text-center mt-3">Montant total à payer</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
                                            <input type="text" class="form-control form-control-lg fs-4"
                                                name="montant_initial" value="" id="montant_initial"
                                                min="{{ $facturationInscription->total_apayer }}" disabled>
                                            <input type="number" class="form-control form-control-lg"
                                                name="montant_initial" value="" id="montant_initial_hidden"
                                                min="{{ $facturationInscription->total_apayer }}" hidden>
                                        </div>
                                    </div>
                                @endif
                                @if ($facturationCarteMembre == null)
                                    <input type="number" name="facturation_id_1" id=""
                                        value="{{ $facturationInscription->id }}" class="form-control form-control-lg"
                                        placeholder="" hidden>
                                    <input type="number" name="faturationinscription" id="faturationinscription" hidden
                                        value="{{ $facturationInscription->total_apayer }}">

                                    <input type="number" name="facturation_id_2" id="" value="0"
                                        class="form-control form-control-lg" placeholder="" hidden>

                                    <div class="row">
                                        <p>Type : {{ $facturationInscription->libelle }}</p>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label class="form-label fw-bold">Carte Artisan </label>
                                            <p class="h6">5 000 FCFA</p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label class="form-label fw-bold"> Droit d'adhesion </label>
                                            <p class="h6">{{ $facturationInscription->total_apayer - 5000 }} FCFA</p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                            <label class="form-label text-danger fw-bold">Montant à payer </label> <br>
                                            <p class="h6">{{ $facturationInscription->total_apayer }} FCFA</p>
                                            <input type="number" name="" id="faturationinscription" hidden
                                                value="{{ $facturationInscription->total_apayer }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <p class="h4 fw-bold text-danger text-center mt-3">Montant total à payer</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
                                            <input type="text" class="form-control form-control-lg fs-4"
                                                name="montant_initial"
                                                value="{{ $facturationInscription->total_apayer }}" id="montant_initial"
                                                disabled>
                                            <input type="number" class="form-control form-control-lg"
                                                name="montant_initial"
                                                value="{{ $facturationInscription->total_apayer }}"
                                                min="{{ $facturationInscription->total_apayer }}"
                                                id="montant_initial_hidden" hidden>
                                        </div>
                                    </div>
                                @endif
                                <div class="row mt-3 justify-content-center">
                                    <div class="col-6 text-center mt-2">
                                        <button type="submit" class="btn  px-5 py-2 btn-primary">
                                            <i class="fa fa-credit-card mx-1"></i>
                                            Payer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/home/vendor/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/home/js/bundle/bootstrapdatepicker.bundle.js') }}"></script>
    <script src="{{ asset('assets/home/js/bundle/inputmask.bundle.js') }}"></script>
    <script src="{{ asset('assets/home/vendor/parsleyjs/js/parsley.js') }}"></script>
    <script>
        // Masking
        Inputmask({
            "mask": "(999) 99-999-999-99"
        }).mask(".phone-number");
        // Form Validation
        $('.basic-form').parsley();
        // Date Picker
        $('.datepicker').datepicker({});
    </script>
    <script>
        $(document).ready(function() {
            const choix1 = $('#choix1');
            const choix2 = $('#choix2');
            const faturationinscription = parseInt($('#faturationinscription').val());
            const montantInitial = $('#montant_initial');
            const montantInitialHidden = $('#montant_initial_hidden');

            function updateMontantInitial() {
                let total = faturationinscription;

                if (choix1.is(':checked')) {
                    total += parseFloat(choix1.val());
                }

                if (choix2.is(':checked')) {
                    total += parseFloat(choix2.val());
                }

                montantInitial.val(total + " FCFA");
                montantInitialHidden.val(total);
            }

            choix1.change(updateMontantInitial);
            choix2.change(updateMontantInitial);

            // Appel initial pour définir la valeur correcte au chargement de la page
            updateMontantInitial();
        });
    </script>
@endpush
