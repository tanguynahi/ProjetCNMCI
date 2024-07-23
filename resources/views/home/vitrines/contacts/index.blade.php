@extends('layouts.home', ['title' => 'Contact : Formulaire de Contact'])
@push('css')
@endpush
@section('content')
    <div class="section appointment bg-card" id="contact">
        <div class="container">
            <form class="row g-3">
                <div class="col-lg-12 col-md-12 col-12 text-center mb-2">
                    <h2 class="mb-1 mt-4 color-900">Contact</h2>
                    <p class="lead">
                        Veuillez remplir le formulaire pour toute préoccupation.
                    </p>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-12 mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Nom & Prenoms">
                            <label>Nom & Prenoms</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-12 mb-2">
                        <div class="form-floating">
                            <input type="email" class="form-control" placeholder="Adresse email">
                            <label>Adresse Email</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                        <div class="form-floating">
                            <input type="tel" class="form-control" placeholder="Numero de téléphone">
                            <label>Numero de téléphone</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Objet">
                            <label>Objet </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Message (Objection)" style="height: 120px"></textarea>
                        <label>Message (Objection)</label>
                    </div>
                </div>
                <div class="col-12 text-center text-md-end">
                    <button type="submit" class="btn btn-lg btn-primary text-uppercase px-5">
                        Envoyer</button>
                </div>
            </form> <!-- .row end -->
        </div>
        <div class="container mt-4">
            <!-- .row end -->
            <div class="row g-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0"
                                marginwidth="0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.1688173176417!2d-3.992111525016031!3d5.391225994587777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc194a8768c9b05%3A0x2ac3e9fac856281a!2sBMI-CI!5e0!3m2!1sfr!2sci!4v1720609668619!5m2!1sfr!2sci"></iframe>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
        </div>
    </div>
@endsection
@push('js')
@endpush
