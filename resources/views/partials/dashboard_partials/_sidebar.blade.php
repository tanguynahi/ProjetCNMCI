<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/home/cnmci.jpg') }}" style="height: 100px; width:100px;" alt="Images Logo">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">CNMCI</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item open @if (Route::currentRouteName() == 'dashboard') active @endif">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Tableau de bord</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                <div data-i18n="Charts">Statistiques</div>
            </a>
        </li>
        {{-- <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ti ti-mail"></i>
                <div data-i18n="Email">Email</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ti ti-messages"></i>
                <div data-i18n="Chat">Chat</div>
            </a>
        </li> --}}
        <li class="menu-item @if (Route::currentRouteName() == 'identifications.index') active @endif">
            <a href="{{ route('identifications.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div data-i18n="Identifications">Identifications</div>
            </a>
        </li>
        <li class="menu-item @if (Route::currentRouteName() == 'demandes.index') active @endif">
            <a href="{{ route('demandes.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-git-compare"></i>
                <div data-i18n="Request">Demandes</div>
            </a>
        </li>

        <!-- Apps & Pages -->

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Exploitations">Exploitations</span>
        </li>
        <!-- Academy menu start -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-credit-card"></i>
                <div data-i18n="Payment">Paiements</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-cards"></i>
                <div data-i18n="Facturation">Facturations</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building-community"></i>
                <div data-i18n="Regional Chambers">Chambres régionales</div>
            </a>
        </li>
        <!-- Academy menu end -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Artisans">Artisans</div>
                <div class="badge bg-primary rounded-pill ms-auto">5</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Companions">Compagnons</div>
                <div class="badge bg-primary rounded-pill ms-auto">10</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Apprentis">Apprentis</div>
                <div class="badge bg-primary rounded-pill ms-auto">3</div>
            </a>
        </li>
        <!-- User interface -->
        {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-database"></i>
                <div data-i18n="Contributions">Cotisations</div>
                <div class="badge bg-primary rounded-pill ms-auto">2</div>
            </a>
        </li> --}}
        <li class="menu-item @if (Route::currentRouteName() == 'actualites.index') active @endif">
            <a href="{{ route('actualites.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-book"></i>
                <div data-i18n="News">Actualités</div>
                <div class="badge bg-primary rounded-pill ms-auto">2</div>
            </a>
        </li>
        <li class="menu-item @if (Route::currentRouteName() == 'annonces.index') active @endif">
            <a href="{{ route('annonces.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-photo-up"></i>
                <div data-i18n="Ads">Annonces</div>
                <div class="badge bg-primary rounded-pill ms-auto">2</div>
            </a>
        </li>
        <li class="menu-item @if (Route::currentRouteName() == 'slides.index') active @endif">
            <a href="{{ route('slides.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-photo-up"></i>
                <div data-i18n="Slides">Slides</div>
                <div class="badge bg-primary rounded-pill ms-auto">2</div>
            </a>
        </li>
        <li class="menu-item @if (Route::currentRouteName() == 'faqs.index') active @endif">
            <a href="{{ route('faqs.index') }}" class="menu-link">
                <i class="fa-regular fa-circle-question mx-2"></i>
                <div data-i18n="FAQ">FAQ(s)</div>
                <div class="badge bg-primary rounded-pill ms-auto">2</div>
            </a>
        </li>
        <!-- User interface -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons ti ti-books"></i>
                <div data-i18n="Trainings">Formations</div>
                <div class="badge bg-primary rounded-pill ms-auto">{{ \App\Models\Formation::count() }}</div>
            </a>
        </li>
        <li class="menu-item @if (Route::currentRouteName() == 'administrateurs.index') active @endif">
            <a href="{{ route('administrateurs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Admins">Administrateurs</div>

                <div class="badge bg-primary rounded-pill ms-auto">
                    {{ \App\Models\Administrateur::where('id', '<>', 1)->count() }}</div>
            </a>

        </li>
        <!-- User interface -->

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Files">Fichiers</span>
        </li>
        <li class="menu-item @if (Route::currentRouteName() == 'brancheactivites.index') active @endif">
            <a href="{{ route('brancheactivites.index') }}" class="menu-link">
                {{-- <i class="fa-regular fa-circle-question mx-2"></i> --}}
                <i class="fa-solid fa-minimize mx-2"></i>
                <div data-i18n="Branche activites"> Branche Activites</div>
            </a>
        </li>

        <li class="menu-item @if (Route::currentRouteName() == 'typeactivites.index') active @endif">
            <a href="{{ route('typeactivites.index') }}" class="menu-link">
                {{-- <i class="fa-regular fa-circle-question mx-2"></i> --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                    class="bi bi-briefcase mx-1" viewBox="0 0 16 16">
                    <path
                        d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5m1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0M1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5" />
                </svg>
                <div data-i18n="Métiers">Métiers</div> 
            </a>
        </li>


        <!-- Misc -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Misc">Configurations</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-adjustments-horizontal'></i>
                <div data-i18n="Roles & Permissions">Roles & Permissions</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-access-roles.html" class="menu-link">
                        <div data-i18n="Roles">Roles</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-access-permission.html" class="menu-link">
                        <div data-i18n="Permission">Permission</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (Route::currentRouteName() == 'parametres.index') active @endif">
            <a href="{{ route('parametres.index') }}" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Settings">Paramètres</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="3" class="menu-link">
                <i class="ti ti-logout me-2 ti-sm"></i>
                <div data-i18n="Logout">Se déconnecter</div>
            </a>

            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</aside>
