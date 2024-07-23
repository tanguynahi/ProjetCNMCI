@extends('layouts.home', ['title' => "page d'actualites"])
@push('css')
@endpush
@section('content')
    <!--  Section: Hero Section  -->
    @if ($actualites->count()> null)
    <div class="section" id="hero">
        <div class="container">
            <div class="row g-3 py-0 py-lg-5">
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="d-flex flex-column h-100 justify-content-center mb-5 mb-lg-0">
                        <h2 class="bg-text color-900">
                            <span class="text-gradient fw-bold d-block">Bienvenue</span>
                            sur la page d'actualites de CNMCI
                        </h2>
                        <p class="color-900 lead mb-4">
                            Découvrez les dernières créations uniques de nos artisans locaux et les tendances inspirantes de
                            l'artisanat!
                        </p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="owl-carousel owl-theme" id="owl_banner">
                        @foreach ($actualites as $actualite)
                            <div class="item">
                                <div class="card overflow-hidden">
                                    <img class="" src="{{ asset($actualite->lien_photo) }}" style="height: 500px;"
                                        alt="Image actualité">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!-- .row end -->
        </div>
    </div><!-- End Hero -->
    <div class="section">
        <div class="container">
            <div class="row g-3">

                <div class="col-12 mt-3">
                    <ul class="nav nav-tabs tab-card border-bottom-0 fs-6 justify-content-start px-0 flex-column flex-md-row"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#apartment" role="tab">Tous
                            </a>
                        </li>
                        @if ($actualiteDays->count() > null)
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#bungalows" role="tab">
                                    Aujourd'hui
                                </a>
                            </li>
                        @endif
                        @if ($actualiteHiers->count() > null)
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#farm" role="tab">
                                    Hier
                                </a>
                            </li>
                        @endif
                        @if ($actualitesAvantHiers->count() > null)
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#corporate" role="tab">Avant
                                    hier
                                </a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content mt-4">
                        <div class="tab-pane fade show active" id="apartment" role="tabpanel">
                            <div class="owl-carousel owl-theme" id="owl_apartment">
                                {{-- Tous les Actualites  --}}
                                @foreach ($actualites as $actualite)
                                    <a href="{{ asset($actualite->lien_photo) }}">
                                        <div class="item">
                                            <div class="card overflow-hidden">
                                                <img class="" src="{{ asset($actualite->lien_photo) }}"
                                                    style="height: 300px;" alt="Image Actualité">
                                                <div class="grid-content p-3">
                                                    <div class="d-flex flex-column mt-3">
                                                        <h5 class="text-danger">{{ $actualite->libelle }}</h5>
                                                        <p class="mb-0 ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-calendar-week" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                                                <path
                                                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                            </svg>
                                                            <strong>{{ formatDate($actualite->date_actualite) }}</strong>
                                                        </p>

                                                    </div>
                                                    <div class="d-flex justify-content-between property-info">
                                                        <p>
                                                            {{ Str::words($actualite->description, 9) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        @if ($actualiteDays->count() > null)
                            <div class="tab-pane fade" id="bungalows" role="tabpanel">
                                <div class="owl-carousel owl-theme" id="owl_bungalows">
                                    @foreach ($actualiteDays as $actualiteDay)
                                        <a href="{{ $actualiteDay->lien_photo }}">
                                            <div class="item">
                                                <div class="card overflow-hidden">
                                                    <img class="" style="height: 300px;"
                                                        src="{{ $actualiteDay->lien_photo }}"
                                                        alt=" Images Actualité du jour">
                                                    <div class="grid-content p-3">
                                                        <div class="d-flex flex-column mt-3">
                                                            <h5 class="text-danger">{{ $actualiteDay->libelle }}</h5>
                                                            <p class="mb-0 ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-calendar-week" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                                                    <path
                                                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                                </svg>
                                                                <strong>{{ formatDate($actualiteDay->date_actualite) }}</strong>
                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between property-info">
                                                            <p>
                                                                {{ Str::words($actualiteDay->description, 9) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if ($actualiteHiers->count() > null)
                            <div class="tab-pane fade" id="farm" role="tabpanel">
                                <div class="owl-carousel owl-theme" id="owl_farm">
                                    @foreach ($actualiteHiers as $actualiteHier)
                                        <a href="{{ $actualiteHier->lien_photo }}">
                                            <div class="item">
                                                <div class="card overflow-hidden">
                                                    <img class="" style="height: 300px;"
                                                        src="{{ $actualiteHier->lien_photo }}"
                                                        alt=" Images Actualité du jour">
                                                    <div class="grid-content p-3">
                                                        <div class="d-flex flex-column mt-3">
                                                            <h5 class="text-danger">{{ $actualiteHier->libelle }}</h5>
                                                            <p class="mb-0 ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-calendar-week" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                                                    <path
                                                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                                </svg>
                                                                <strong>{{ formatDate($actualiteHier->date_actualite) }}</strong>
                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between property-info">
                                                            <p>
                                                                {{ Str::words($actualiteHier->description, 9) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if ($actualitesAvantHiers->count() > null)
                            <div class="tab-pane fade" id="corporate" role="tabpanel">
                                <div class="owl-carousel owl-theme" id="owl_corporate">
                                    @foreach ($actualitesAvantHiers as $actualitesAvantHier)
                                        <a href="{{ $actualitesAvantHier->lien_photo }}">
                                            <div class="item">
                                                <div class="card overflow-hidden">
                                                    <img class="" style="height: 300px;"
                                                        src="{{ $actualitesAvantHier->lien_photo }}"
                                                        alt=" Images Actualité du jour">
                                                    <div class="grid-content p-3">
                                                        <div class="d-flex flex-column mt-3">
                                                            <h5 class="text-danger">{{ $actualitesAvantHier->libelle }}
                                                            </h5>
                                                            <p class="mb-0 ">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-calendar-week" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                                                    <path
                                                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                                </svg>
                                                                <strong>{{ formatDate($actualitesAvantHier->date_actualite) }}</strong>
                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between property-info">
                                                            <p>
                                                                {{ Str::words($actualitesAvantHier->description, 9) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div> <!-- .row end -->
        </div>
    </div>
    @else
    <div class="content " style="margin-bottom: 100px; margin-top:100px;">
        <marquee behavior="" direction="">
            <strong style="text-transform:uppercase;">
                Aucune donnée enregistrée.
            </strong>
        </marquee>
    </div>
    @endif
    <!--  Section: Fun fact  -->
@endsection
@push('js')
    <script src="{{ asset('assets/home/js/bundle/owlcarousel.bundle.js') }}"></script>
    <script>
        var owl = $('#owl_banner');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: true,
            dots: false,
            responsive: {
                320: {
                    items: 1
                },
            }
        });
        var owl = $('#owl_apartment, #owl_bungalows, #owl_farm, #owl_corporate, #owl_success');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: true,
            dots: false,
            responsive: {
                320: {
                    items: 1
                },
                800: {
                    items: 2
                },
                1200: {
                    items: 3
                },
            }
        });
    </script>
@endpush
