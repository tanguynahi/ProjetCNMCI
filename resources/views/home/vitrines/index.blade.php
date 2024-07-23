@extends('layouts.home', ['title' => "page d'accueil"])
@section('content')
    @if (  $faqs->count() == 0 &&
    $actualites->count() == 0 &&
            $slides->count() == 0 &&
            $annonces->count() == null &&
            $parametre->mot_du_directeur == null &&
            $parametre->lien_photo_directeur == null &&
            $partenaires->count() == 0 )
        <div class="content " style="margin-bottom: 100px; margin-top:100px;">
            <marquee behavior="" direction="">
                <strong style="text-transform:uppercase;">
                    Aucune donnée enregistrée.
                </strong>
            </marquee>
        </div>
    @else
        @if ($slides->count() != null)
            <div class="section sliders-4" id="accueil">
                <div class="hero-container">
                    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade"
                        data-bs-ride="carousel">
                        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                        <div class="carousel-inner text-center text-white" role="listbox">
                            <!-- Slide 1 -->
                            @foreach ($slides as $slide)
                                @php
                                    $lienSlide = $slide->lien_image
                                        ? asset($slide->lien_image)
                                        : asset('assets/home/img/restaurant/carousel/carousel1.jpg');
                                @endphp
                                <div class="carousel-item active" style="background-image: url('{{ $lienSlide }}');">
                                    <div class="carousel-container">
                                        <div class="carousel-content">
                                            <h2 class="display-5 mb-4 fw-bold"> {{ $slide->titre }}</h2>
                                            <p class="lead"> {{ $slide->sous_titre }}</p>
                                            <a href="{{ route('inscription') }}"
                                                class="btn btn-lg bg-secondary text-uppercase text-white px-5 mt-5">
                                                {{-- {{ route('inscription') }} --}}
                                                Inscription
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev"><span
                                class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span></a>
                        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next"><span
                                class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span></a>
                    </div>
                </div>
            </div>
        @endif
        <!-- main Section -->
        <div class="main-raised bg-card shadow overflow-hidden rounded-4">
            <!-- Upcomming Section -->
            <div class="container-fluid p-0">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="card bg-secondary rounded-0 border-0">
                            <div class="card-body text-center">
                                <h2 class="display-5 mt-3 text-white">Formez-vous et developpez vos competences avec la
                                    CNMCI
                                </h2>
                                <a href="#" class="btn btn-lg bg-white text-uppercase text-black px-5 mt-2">Me
                                    Former</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- debut actualite --}}
            @if ($actualites->count() > null)
                <div class="section" id="actualites">
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-12">
                                <h3 class="mb-1 mt-2 color-900">Actualites</h3>
                            </div>
                            @foreach ($actualites as $actualite)
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="card overflow-hidden lift">
                                        <img src="{{ asset($actualite->lien_photo) }}" class="card-img-top"
                                            alt="Image actualites">
                                        <div class="card-body">
                                            <div class="mb-3"><a class="small fw-bold text-success text-uppercase"
                                                    href="#">{{ $actualite->libelle }}</a></div>
                                            <div class="d-flex flex-column">
                                                <p class="fw-light mb-xl-4 mb-3">
                                                    <a class="color-600" href="#" title="">
                                                        {{ Str::words($actualite->description, 9) }}
                                                    </a>
                                                </p>
                                                <div class="small text-muted text-uppercase">
                                                    <span
                                                        class="post-on">{{ formatDate($actualite->date_actualite) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row justify-content-center text-center mt-3">
                                <div class="col">
                                    <a href="{{ route('actualites') }}" class="btn btn-xl btn-primary">
                                        Voir Plus
                                    </a>
                                </div>
                            </div>
                        </div> <!-- .row end -->
                    </div>
                </div>
            @endif
            {{-- fin actualites --}}
            {{-- debut annonce --}}
            <style>
                <style>

                /* Styles personnalisés pour la bordure des images */
                .carousel-inner img {
                    border: 51px solid #007bff;
                    /* Bordure bleue de 5px */
                    border-radius: 5rem;
                    /* Coins arrondis de 10px */
                }
            </style>
            </style>
            @if ($annonces->count() != null)
                <div id="carouselExample" class="carousel slide">
                    <div class="col-12">
                        <h3 class="mb-1 mt-2 color-900 mx-4">Annonces</h3>
                    </div>
                    <div class="carousel-inner">
                        @foreach ($annonces as $annonce)
                            <div class="carousel-item active">
                                <img src="{{ asset($annonce->lien_image) }}" class="d-block"
                                    style="height: 600px; width:100%;" alt="{{ $annonce->categorie }}">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
            @endif
            {{-- fin annonce --}}
            <!-- About Section -->
            @if ($parametre->mot_du_directeur != null || $parametre->lien_photo_directeur != null)
                <div class="section about-us" id="about_us">
                    <div class="container">
                        <div class="row g-3 justify-content-lg-between">
                            <div class="col-xl-5 col-lg-6">
                                <h2 class="mb-1 mt-4 color-900"><strong>Mot du Directeur</strong></h2>
                                <p class="lead">
                                    {{ $parametre->mot_du_directeur }}
                                </p>
                                <a href="" class="btn btn-lg rounded-pill btn-primary px-5 lead text-uppercase">En
                                    savoir
                                    plus</a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 order-1 order-lg-2">
                                <img src="{{ $parametre->lien_photo_directeur }}" alt=""
                                    style="height: 300px; width:100%">
                            </div>
                        </div> <!-- .row end -->
                    </div>
                </div>
            @endif
            @if ($parametre->lien_video != null)
                <!-- section sihii-tech -->
                <div class="section bg-body" id="event_schedule">
                    <div class="container">
                        <div id="carouselExampleCaptions" class="carousel slide">
                            <div class="carousel-inner">
                                <h2 class="mb-1 mt-4 color-900"><strong>Sihii-tech</strong></h2>
                                <div class="carousel-item active">
                                    <img src="{{ $parametre->lien_video }}" class="d-block w-100" style="height:700px;"
                                        alt="Image de Shil">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Sihii-tech</h5>
                                        <a href="https://www.sihii-tech.ci/"
                                            class="btn btn-lg bg-secondary text-uppercase text-white px-5 mt-5">Acceder a
                                            sihii-tech</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- debut partenaire --}}
            @if ($partenaires->count() != null)
                <div class="section pb-0">
                    <div class="container">
                        <div class="row justify-content-center mb-3">
                            <div class="col-lg-12">
                                <h2 class="mb-1 mt-4 color-900">Partenaires</h2>
                            </div>
                        </div><!-- .row end -->
                    </div>
                    <div class="container">
                        <div class="row g-2 mb-2">
                            <div class="col-12 col-lg-12 col-md-12 mt-4">
                                <div class="card owl-carousel owl-theme" id="live_coins">
                                    @foreach ($partenaires as $partenaire)
                                        @php
                                            // dd($partenaires->count());
                                            $lienImage = $partenaire->lien_image
                                                ? asset($partenaire->lien_image)
                                                : asset('assets/home/images/bg/bg-image-25.jpg');
                                        @endphp
                                        <div class="item">
                                            <div class="card-body d-flex align-items-center">
                                                <div class="">
                                                    <a href="{{ $lienImage }}">
                                                        <img class="avatar" src="{{ $lienImage }}"
                                                            alt="{{ $partenaire->libelle }}" style="height:90px;">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @push('js')
                                    <script src="{{ asset('assets/home/js/bundle/owlcarousel.bundle.js') }}"></script>
                                    <script>
                                        $('#live_coins').owlCarousel({
                                            margin: 10,
                                            items: 10,
                                            loop: true,
                                            dots: false,
                                            autoplay: true,
                                            autoWidth: true,
                                            slideTransition: 'linear',
                                            autoplayTimeout: 6500,
                                            autoplaySpeed: 6500,
                                            responsive: {
                                                0: {
                                                    items: 1
                                                },
                                                600: {
                                                    items: 3
                                                },
                                                1000: {
                                                    items: 6
                                                }
                                            }
                                        })
                                    </script>
                                @endpush
                            </div>
                        </div> <!-- .row end -->
                    </div>
                </div>
            @endif
           
            @if ($faqs->count() != null)
            <div class="section" id="faq" style="margin-top: -5px">
                <div class="container">
                    <div class="row g-3">
                        <div class="col-12">
                            <span class="chart-color3 px-2 py-1 color-fff">FAQs</span>
                            <h3 class="mb-1 mt-4 color-900">Bienvenue dans la section FAQ de notre entreprise artisanale
                            </h3>
                            <p class="lead">Notre objectif est de fournir des réponses claires et utiles à vos questions
                                les
                                plus courantes. Découvrez-en plus sur notre histoire, nos services, et comment nous pouvons
                                vous
                                aider.
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="accordion accordion-flush">
                                @foreach ($faqs as $faq )
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed py-4 fs-5" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne"> {{ $faq->libelle }} </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body fs-6">
                                           {{ $faq->description }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="card accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed py-4 fs-5" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Quels types de produits et services proposez-vous ?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body fs-6">
                                            Nous offrons une large gamme de produits artisanaux, chacun fabriqué avec soin
                                            et
                                            expertise. Nos services incluent :
                                            <ul>
                                                <li> <strong>Création sur mesure :</strong> Nous réalisons des pièces
                                                    uniques
                                                    adaptées à vos besoins spécifiques.</li>
                                                <li> <strong>Réparation et restauration :</strong> Nous redonnons vie à vos
                                                    objets précieux en utilisant des techniques traditionnelles.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed py-4 fs-5" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree"> Proposez-vous des
                                            ateliers ou des formations ? </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body fs-6">Oui, nous croyons en la transmission des
                                            connaissances
                                            et de la passion pour l'artisanat. Nous organisons régulièrement des ateliers et
                                            des
                                            formations pour différents niveaux de compétence. Que vous soyez un débutant
                                            souhaitant apprendre les bases ou un professionnel cherchant à perfectionner ses
                                            techniques, nous avons quelque chose pour vous. Consultez notre calendrier
                                            d'événements ou inscrivez-vous à notre newsletter pour rester informé des
                                            prochains
                                            ateliers.</div>
                                    </div>
                                </div>
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed py-4 fs-5" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseFour"
                                            aria-expanded="false" aria-controls="flush-collapseFour">
                                            Comment puis-je rester informé des nouveautés et des offres spéciales ?</button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body fs-6">Nous adorons partager nos nouveautés et offres
                                            spéciales avec notre communauté ! Vous pouvez vous abonner à notre newsletter en
                                            bas
                                            de cette page, nous suivre sur nos réseaux sociaux ou visiter notre site
                                            régulièrement pour découvrir nos dernières créations et promotions.</div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div> <!-- .row end -->
                </div>
            </div>

            @endif
        </div>
    @endif
@endsection
@push('js')
@endpush
