<header class="section sticky-top bg-card py-0">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
            <a class="navbar-brand p-0 m-0" href="{{ route('accueil') }}">
                <span class="fs-3 fw-bold text-secondary">
                    <img src="{{ asset('assets/home/cnmci.jpg') }}" style="height: 100px; width:100px;" alt="Images Logo">
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fs-6" id="main_navbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-2"><a class="nav-link active" aria-current="page"
                            href="{{ route('accueil') }}#accueil">Accueil</a></li>
                    <li class="nav-item me-2"><a class="nav-link" href="#">La CNMCI</a></li>
                    <li class="nav-item me-2"><a class="nav-link" href="{{ route('actualites') }}">Actualités</a></li>
                    <li class="nav-item me-3 dropdown">
                        <a class="nav-link" href="#">Formations</a>
                    </li>
                    <li class="nav-item me-2"><a class="nav-link" href="{{ route('accueil') }}#contact">Contact</a></li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{ route('accueil') }}#faq">FAQ</a></li>
                </ul>
                @if (Auth::check())
                    @if (Auth::user()->artisan)
                        <form class="d-flex ms-4" action="{{ route('logout') }}" method="post">
                            @csrf
                            <a class="btn px-4 rounded btn-primary" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se
                                déconnecter</a>
                        </form>
                        <br>
                        <form class="d-flex ms-4">
                            <a class="btn px-4 rounded btn-primary" href="{{ route('artisan.tableau_de_bord') }}">Mon
                                espace</a>
                        </form>
                        <br>
                    @else
                        <form class="d-flex ms-4">
                            <a class="btn px-4 rounded btn-primary"
                                href="{{ route('connexion.artisan') }}">Connecter</a>
                        </form>
                        <br>
                        <form class="d-flex ms-4">
                            <a class="btn px-4 rounded btn-primary" href="{{ route('inscription') }}">Inscription</a>
                        </form>
                    @endif
                @else
                    <form class="d-flex ms-4">
                        <a class="btn px-4 rounded btn-primary" href="{{ route('connexion.artisan') }}">Connecter</a>
                    </form>
                    <br>
                    <form class="d-flex ms-4">
                        <a class="btn px-4 rounded btn-primary" href="{{ route('inscription') }}">Inscription</a>
                    </form>
                @endif
            </div>
        </div>
    </nav>
</header>
