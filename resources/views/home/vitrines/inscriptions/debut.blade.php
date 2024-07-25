@extends('layouts.home_login', ['title' => 'Début Identification'])
@push('css')
@endpush
@section('content')
    <div class="page-body auth px-xl-2 px-sm-2 px-0 py-lg-2 py-1"
        style="background-image:url('{{ asset('assets/home/page_succes.jpg') }}'); background-repeat: no-repeat; background-size:cover;">
        <div class="container-fluid">
            <div class="row ">

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
                            color: #6a4caf;
                            margin-bottom: 20px;
                        }
                    </style>
                    <div class="row justify-content-center">
                        <div class="success-container">
                            <h6><b>IDENTIFICATION AU REGISTRE DES METIERS</b></h6>
                            <form action="{{ route('inscriptionP') }}" method="post" >
                                @csrf
                                <p>
                                <div class="col-md-12 col-lg-12 col-12 mb-2">
                                    <input type="text" name="numero_registre"
                                        class="form-control @error('numero_registre') is-invalid @enderror"
                                        placeholder="Numero registre" autocomplete="numero_registre" autofocus
                                        value="{{ old('numero_registre') }}" required onKeyPress="if(this.value.length==50) return false;">
                                    @error('numero_registre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                                <span style="color: grey">
                                    Veuillez renseigner le numero du registre puis cliquez sur continuer
                                </span>
                                </p>
                                <div class="mt-4">
                                    <a class="btn btn-secondary" href="{{ route('accueil') }}">Accueil</a>
                                    <button type="submit"  class="btn btn-success">Continuer</button>
                                </div>
                            </form>
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
