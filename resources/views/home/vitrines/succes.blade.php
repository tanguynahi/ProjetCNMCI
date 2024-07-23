@extends('layouts.home_login', ['title' => 'Page de success'])
@push('css')
@endpush
@section('content')
    <div class="page-body auth px-xl-2 px-sm-2 px-0 py-lg-2 py-1"
        style="background-image:url('{{ asset('assets/home/page_succes.jpg') }}'); background-repeat: no-repeat; background-size:cover;">
        <div class="container-fluid">
            <div class="row ">
                {{-- <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <style>
                        .success-container {
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            text-align: center;
                        }
                        .success-container h1 {
                            color: #4CAF50;
                            margin-bottom: 20px;
                        }
                        .success-container p {
                            color: #333;
                            margin-bottom: 20px;
                        }
                        .success-container a {
                            display: inline-block;
                            padding: 10px 20px;
                            /* background-color: #4CAF50; */
                            background-color: gray;
                            color: #fff;
                            text-decoration: none;
                            border-radius: 4px;
                        }
                        .success-container a:hover {
                            background-color: #45a049;
                        }
                    </style>
                    <div class="row justify-content-center">
                        <div class="success-container">
                            <h1>Félicitations !</h1>
                            <center>
                                <div class="col-md-6 col-lg-6 col-12 mb-4 ">
                                    <label class="form-label bold" style="text-transform:uppercase;">Identification N°
                                    </label>
                                    <p style="text-transform:uppercase;" class="h6 fw-bold">
                                        {{ $identification->numero_identification }} </p>
                                </div>
                            </center>
                            <p><span class="fw-bold">{{ formatSexe3($identification->sexe_artisan) }}
                                    {{ $identification->prenom_artisan }} {{ $identification->nom_artisan }}</span> votre
                                identification a été soumis avec succès. <br>

                            </p>
                            <p>Une fois la validation de l'administrateur effectuée vous serez notifié par email : <br>
                                <span
                                    class="
                                    text-primary mx-2">{{ $identification->email_artisan }}</span>
                                pour la suite de votre inscription</p>
                            <a href="{{ route('accueil') }}">Retour à la page d'accueil</a>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <style>
                        .success-container {
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            text-align: center;
                            position: relative;
                        }

                        .success-container h1 {
                            color: #4CAF50;
                            margin-bottom: 20px;
                        }

                        .success-container p {
                            color: #333;
                            margin-bottom: 20px;
                        }

                        .success-container a {
                            display: inline-block;
                            padding: 10px 20px;
                            background-color: gray;
                            color: #fff;
                            text-decoration: none;
                            border-radius: 4px;
                        }

                        .success-container a:hover {
                            background-color: #45a049;
                        }

                        .success-symbol {
                            width: 100px;
                            height: 100px;
                            fill: #4CAF50;
                            margin-bottom: 20px;
                            animation: bounce 1s infinite;
                        }

                        @keyframes bounce {

                            0%,
                            100% {
                                transform: translateY(0);
                            }

                            50% {
                                transform: translateY(-10px);
                            }
                        }
                    </style>
                    <div class="row justify-content-center">
                        <div class="success-container">
                            <svg class="success-symbol" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.371 0 0 5.371 0 12s5.371 12 12 12 12-5.371 12-12S18.629 0 12 0zm-1.27 18L5 11.27l1.41-1.41 4.32 4.32 7.88-7.88L20 8.12l-9.27 9.27z" />
                            </svg>
                            <h1>Félicitations !</h1>
                            <center>
                                <div class="col-md-6 col-lg-6 col-12 mb-4 ">
                                    <label class="form-label bold" style="text-transform:uppercase;">Identification N°
                                    </label>
                                    <p style="text-transform:uppercase;" class="h6 fw-bold">
                                        {{ $identification->numero_identification }} </p>
                                </div>
                            </center>
                            <p><span class="fw-bold">{{ formatSexe3($identification->sexe_artisan) }}
                                    {{ $identification->prenom_artisan }} {{ $identification->nom_artisan }}</span> votre
                                identification a été soumis avec succès. <br>

                            </p>
                            <p>Une fois la validation de l'administrateur effectuée, vous serez notifié par email : <br>
                                <span class="text-primary mx-2">{{ $identification->email_artisan }}</span>
                                pour la suite de votre inscription
                            </p>
                            <a href="{{ route('accueil') }}">Retour à la page d'accueil</a>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->
        </div>
    </div>
@endsection
@push('js')
    @include('vendor.sweetalert.alert')
@endpush
