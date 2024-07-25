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
        <div class="container">
            <div class="row ">

                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <div class="card shadow-sm w-100 p-4 p-md-5">
                        <!-- Form -->
                        <form class="row g-3" action="{{ route('accueil.traitementLogin') }}" method="POST">
                            @csrf
                            <div class="col-12 text-center mb-5">
                                <h1>Connexion</h1>
                                <span class="text-muted">Veuillez Creer Votre Acces (Administrateur)</span>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                 Nom
                                            </span>
                                        </div>
                                        <input id="nom"
                                            class="form-control form-control-lg @error('nom') is-invalid @enderror"
                                            type="text" value="{{ old('nom') }}" name="nom"
                                            placeholder="Entre mot de passe">
                                        @error('nom')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                Prenoms
                                            </span>
                                        </div>
                                        <input id="Prenoms"
                                            class="form-control form-control-lg @error('Prenoms') is-invalid @enderror"
                                            type="text" value="{{ old('Prenoms') }}" name="Prenoms"
                                            placeholder="prenoms">
                                        @error('Prenoms')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Numero de Téléphone </label>
                                    <fieldset class="form-icon-group right-icon position-relative">
                                        <input type="tel"
                                            class="form-control form-control-lg phone-number  @error('contact') is-invalid @enderror"
                                            placeholder="Ex: (+225) 00-00-00-00-00" id="contact" name="contact"
                                            value="{{ old('contact') }}" autocomplete="contact" autofocus required>
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
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="form-label">Numero Login </label>
                                    <fieldset class="form-icon-group right-icon position-relative">
                                        <input type="tel"
                                            class="form-control form-control-lg phone-number  @error('login') is-invalid @enderror"
                                            placeholder="Ex: (+225) 00-00-00-00-00" id="login" name="login"
                                            value="{{ old('login') }}" autocomplete="login" autofocus required>
                                        @error('login')
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
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                 Mot de passe
                                            </span>
                                        </div>
                                        <input id="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            type="password" value="{{ old('password') }}" name="password"
                                            placeholder="Entre votre password">
                                        @error('password')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                Confirmé Mot de Passe
                                            </span>
                                        </div>
                                        <input id="new_password_confirmation"
                                            class="form-control form-control-lg @error('new_password_confirmation') is-invalid @enderror"
                                            type="password" value="{{ old('new_password_confirmation') }}" name="new_password_confirmation"
                                            placeholder="Confirmer Mot de passe">
                                        @error('new_password_confirmation')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                 Mot de passe
                                            </span>
                                        </div>
                                        <input id="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            type="password" value="{{ old('password') }}" name="password"
                                            placeholder="Entre votre password">
                                        @error('password')
                                            <strong>{{ $message }}</strong>
                                        @enderror
                                    </div> --}}
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
            "mask": "(+225)99-99-99-99-99"
        }).mask(".phone-number");
        // Form Validation
        $('.basic-form').parsley();
        // Date Picker
        $('.datepicker').datepicker({});
    </script>
@endpush
