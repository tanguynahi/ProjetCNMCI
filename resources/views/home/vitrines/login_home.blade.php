@extends('layouts.home_login', ['title' => 'Connexion'])
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
        style="background-image:url('{{ asset('assets/home/connect.avif') }}'); background-repeat: no-repeat; background-size:cover;">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
                    <div style="max-width: 25rem;">

                        <div class="mb-5">
                            <h2 class="color-900" style="color:white;">Bienvenue sur la page de connexion</h2>
                        </div>
                        <!-- List Checked -->
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
                    <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
                        <!-- Form -->
                        <form class="row g-3" action="{{ route('artisan.traitementConnexion') }}" method="POST">
                            @csrf
                            <div class="col-12 text-center mb-5">
                                <h1>Connexion</h1>
                                <span class="text-muted">Veuillez vous connecter pour accéder à votre espace</span>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="form-label">Numero de Téléphone </label>
                                <fieldset class="form-icon-group right-icon position-relative">
                                    <input type="tel"
                                        class="form-control form-control-lg   @error('contact') is-invalid @enderror"
                                        placeholder="0000000000" id="contact" name="contact"
                                        value="{{ old('contact') }}" autocomplete="contact" autofocus required onKeyPress="if(this.value.length==10) return false;">
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
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
                                <div class="mb-2">
                                    <div class="form-label">
                                        <span class="d-flex justify-content-between align-items-center"> Mot de Passe
                                            @if (Route::has('password.request'))
                                                <a class="text-primary" href="{{ route('password.request') }}">Mot de passe
                                                    Oublie?</a>
                                            @endif
                                        </span>
                                    </div>
                                    <input id="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        type="password" value="{{ old('password') }}" name="password"
                                        placeholder="Entre mot de passe">
                                    @error('password')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Se souvenir de moi</label>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn  px-5 py-2 btn-primary">
                                    Envoyer
                                </button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
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
              "mask": "9999999999"
        }).mask(".phone-number");
        // Form Validation
        $('.basic-form').parsley();
        // Date Picker
        $('.datepicker').datepicker({});
    </script>
@endpush
