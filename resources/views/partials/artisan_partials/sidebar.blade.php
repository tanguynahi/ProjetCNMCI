<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('artisan.tableau_de_bord') }}" class="app-brand-link">
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
        <li class="menu-item open @if (Route::currentRouteName() == 'artisan.tableau_de_bord') active @endif">
            <a href="{{ route('artisan.tableau_de_bord') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Tableaux de bord</div>
            </a>
        </li>
        {{-- <li class="menu-item @if (Route::currentRouteName() == 'artisan.messages') active @endif">
            <a href="{{ route('artisan.messages') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-messages"></i>
                <div data-i18n="Chat">Discuter</div>
            </a>
        </li> --}}
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ti ti-id"></i>
                <div data-i18n="Precommande">Précommande Visa TrésorMoney</div>
            </a>
        </li>
        {{-- ici --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-shopping-cart'></i>
                <div data-i18n="Boutique Monetique">Boutique Monetique</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="Products">Produits</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Product List">Liste des Produits</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">
                                <div data-i18n="Add Product">Produit Commandé</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Manage Reviews">Manager</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-book'></i>
                <div data-i18n="Mes Formations">Mes Formations</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Listes des Formations">Listes des Formations</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Mes Cours">Mes Cours</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-description"></i>
                <div data-i18n="Documentation et Actes Administratifs">Documentation et Actes Administratifs</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons ti ti-file-dollar'></i>
                <div data-i18n="Gestion Comptable et facturation">Gestion Comptable et facturation</div>
                {{-- <div class="badge bg-danger rounded-pill ms-auto">4</div> --}}
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Listes">Listes</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item @if (in_array(Route::currentRouteName(), [
                'artisan.compagnons',
                'artisan.apprentis',
                'apprenti.creation',
                'compagnon.creation',
            ])) active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Mes Collaborateurs">Mes Collaborateurs</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  @if (in_array(Route::currentRouteName(), ['compagnon.creation', 'artisan.compagnons'])) active @endif">
                    <a href="{{ route('artisan.compagnons') }}" class="menu-link">
                        <div data-i18n="Mes Compagnons">Mes Compagnons</div>
                    </a>
                </li>
                <li class="menu-item @if (in_array(Route::currentRouteName(), ['apprenti.creation', 'artisan.apprentis'])) active @endif">
                    <a href="{{ route('artisan.apprentis') }}" class="menu-link">
                        <div data-i18n="Mes Apprentis">Mes Apprentis</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                {{-- <i class="menu-icon tf-icons ti ti-square"></i> --}}
                <i class="fa-solid fa-money-check mx-1"></i>
                <div data-i18n="Payer Mes Droits">Payer Mes Droits</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ti ti-logout"></i>
                <div data-i18n="Logout">Se déconnecter</div>
            </a>
        </li>
    </ul>
</aside>
