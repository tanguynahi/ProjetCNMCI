@extends('layouts.home_login', ['title' => 'Création de mot de Passe'])
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/home/cssbundle/bootstrapdatepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/vendor/parsleyjs/css/parsley.css') }}">
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/luno-style.css') }}">
    <!-- Prism css file please do not add in your project -->
    <link rel="stylesheet" href="{{ asset('assets/home/vendor/prismjs/prism.css') }}">
@endpush
@section('content')
    <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1 "
        style="background-image:url('{{ asset('assets/home/inscrit.avif') }}'); background-repeat: no-repeat; background-size:cover;">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
                    <div style="max-width: 25rem;">
                        <div class="mb-1">
                            <img src="{{ asset('assets/home/cnmci.jpg') }}" alt="Logo CNMCI" style="height: 100px;">
                        </div>
                        <div class="mb-5">
                            {{-- <h2 class="color-900">Build digital products with:</h2> --}}
                        </div>

                        <ul class="list-unstyled mb-5">
                            <li class="mb-4">
                                <span class="d-block  fs-4 fw-light" style="color: white;">Bienvenue sur la plateforme de
                                    CNMCI</span>

                            </li>
                            <li>
                                <p style="color: white;">
                                    Découvrez l'univers fascinant de l'artisanat où tradition et innovation se rencontrent
                                    pour créer des pièces uniques et authentiques. Chaque artisan de notre communauté met
                                    tout son cœur et son savoir-faire dans la réalisation de créations d'exception. Que vous
                                    cherchiez des objets de décoration, des bijoux, des meubles sur mesure, ou des vêtements
                                    faits main, vous trouverez ici des œuvres qui racontent une histoire et reflètent l'âme
                                    de leurs créateurs.

                                    Explorez notre catalogue et laissez-vous inspirer par la diversité et la qualité des
                                    créations artisanales. Rejoignez-nous et soutenez le travail de nos talentueux artisans.
                                    Ensemble, préservons et célébrons l'art du fait-main.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 36rem;">
                        <!-- Formulaire de creatio d'acces (mot de passe) -->
                        <form class="row g-3">
                            <div class="col-12 text-center mb-4">
                                <h1>Finalisez  Identification</h1>
                                <span>Veuillez créer votre accès.</span>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control form-control-lg" placeholder="John" disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Prénoms</label>
                                <input type="text" class="form-control form-control-lg" placeholder="Parker" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Numero de Téléphone</label>
                                <fieldset class="form-icon-group right-icon position-relative">
                                    <input type="tel" class="form-control form-control-lg phone-number"
                                        placeholder="Ex: (000) 00-000-000-00">
                                    <div class="form-icon position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                        </svg>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Mot de Passe</label>
                                <input id="password" class="form-control form-control-lg" type="password"
                                    placeholder="Entre mot de passe">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Confirmer mot de passe</label>
                                <input id="password" class="form-control form-control-lg" type="password"
                                    placeholder="Confirmer mot de passe">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault"> J'accepte les <a href="#"
                                            title="voir" class="text-primary"> Termes de la politique de
                                            confidentialité
                                        </a>     
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-2">
                                <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase"
                                    style="background-color: #5c5c5a; color:white;">
                                    Poursuivre
                                </button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <br> <br>
            </div> <!-- End Row -->
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/home/vendor/prismjs/prism.js') }}"></script>
    <!-- Plugin Js -->
    {{-- <script src="{{ asset('assets/home/js/plugins.js') }}"></script> --}}
    <!-- Jquery Page Js -->
    <!-- Plugin Js -->
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
@endpush
