<!-- Sidebar Left -->
<div class="col app-chat-sidebar-left app-sidebar overflow-hidden" id="app-chat-sidebar-left">
    <div
        class="chat-sidebar-left-user sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
        <div class="avatar avatar-xl avatar-online">
            <img src="{{ asset('assets/dashboard/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle">
        </div>
        <h5 class="mt-2 mb-0">John Doe</h5>
        <span>Admin</span>
        <i class="ti ti-x ti-sm cursor-pointer close-sidebar" data-bs-toggle="sidebar" data-overlay
            data-target="#app-chat-sidebar-left"></i>
    </div>
    <div class="sidebar-body px-4 pb-4">
        <div class="my-4">
            <small class="text-muted text-uppercase">About</small>
            <textarea id="chat-sidebar-left-user-about" class="form-control chat-sidebar-left-user-about mt-3" rows="4"
                maxlength="120">Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
        </div>
        <div class="my-4">
            <small class="text-muted text-uppercase">Status</small>
            <div class="d-grid gap-2 mt-3">
                <div class="form-check form-check-success">
                    <input name="chat-user-status" class="form-check-input" type="radio" value="active"
                        id="user-active" checked>
                    <label class="form-check-label" for="user-active">Active</label>
                </div>
                <div class="form-check form-check-danger">
                    <input name="chat-user-status" class="form-check-input" type="radio" value="busy"
                        id="user-busy">
                    <label class="form-check-label" for="user-busy">Busy</label>
                </div>
                <div class="form-check form-check-warning">
                    <input name="chat-user-status" class="form-check-input" type="radio" value="away"
                        id="user-away">
                    <label class="form-check-label" for="user-away">Away</label>
                </div>
                <div class="form-check form-check-secondary">
                    <input name="chat-user-status" class="form-check-input" type="radio" value="offline"
                        id="user-offline">
                    <label class="form-check-label" for="user-offline">Offline</label>
                </div>
            </div>
        </div>
        <div class="my-4">
            <small class="text-muted text-uppercase">Settings</small>
            <ul class="list-unstyled d-grid gap-2 me-3 mt-3">
                <li class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class='ti ti-message me-1 ti-sm'></i>
                        <span class="align-middle">Two-step Verification</span>
                    </div>
                    <label class="switch switch-primary me-4 switch-sm">
                        <input type="checkbox" class="switch-input" checked="" />
                        <span class="switch-toggle-slider">
                            <span class="switch-on"></span>
                            <span class="switch-off"></span>
                        </span>
                    </label>
                </li>
                <li class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class='ti ti-bell me-1 ti-sm'></i>
                        <span class="align-middle">Notification</span>
                    </div>
                    <label class="switch switch-primary me-4 switch-sm">
                        <input type="checkbox" class="switch-input" />
                        <span class="switch-toggle-slider">
                            <span class="switch-on"></span>
                            <span class="switch-off"></span>
                        </span>
                    </label>
                </li>
                <li>
                    <i class="ti ti-user-plus me-1 ti-sm"></i>
                    <span class="align-middle">Invite Friends</span>
                </li>
                <li>
                    <i class="ti ti-trash me-1 ti-sm"></i>
                    <span class="align-middle">Delete Account</span>
                </li>
            </ul>
        </div>
        <div class="d-flex mt-4">
            <button class="btn btn-primary" data-bs-toggle="sidebar" data-overlay
                data-target="#app-chat-sidebar-left">Deconnecter</button>
        </div>
    </div>
</div>
<!-- /Sidebar Left-->

<!-- Chat & Contacts -->
<div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end"
    id="app-chat-contacts">
    <div class="sidebar-header">
        <div class="d-flex align-items-center me-3 me-lg-0">
            <div class="flex-shrink-0 avatar avatar-online me-3" data-bs-toggle="sidebar"
                data-overlay="app-overlay-ex" data-target="#app-chat-sidebar-left">
                <img class="user-avatar rounded-circle cursor-pointer" src="{{ asset('assets/dashboard/img/avatars/1.png') }}"
                    alt="Image Artisan">
            </div>
            <div class="flex-grow-1 input-group input-group-merge rounded-pill">
                <span class="input-group-text" id="basic-addon-search31"><i
                        class="ti ti-search"></i></span>
                <input type="text" class="form-control chat-search-input" placeholder="Search..."
                    aria-label="Search..." aria-describedby="basic-addon-search31">
            </div>
        </div>
        <i class="ti ti-x cursor-pointer d-lg-none d-block position-absolute mt-2 me-1 top-0 end-0"
            data-overlay data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
    </div>
    <hr class="container-m-nx m-0">
    <div class="sidebar-body">

        <div class="chat-contact-list-item-title">
            <h5 class="text-primary mb-0 px-4 pt-3 pb-2" data-i18n="Liste des Messages">Liste des Messages</h5>
        </div>
        <!-- Chats -->
        <ul class="list-unstyled chat-contact-list" id="chat-list">
            <li class="chat-contact-list-item chat-list-item-0 d-none active">
                <h6 class="text-muted mb-0">Aucun Message</h6>
            </li>
            <li class="chat-contact-list-item ">
                <a class="d-flex align-items-center">
                    <div class="flex-shrink-0 avatar avatar-online">
                        <img src="{{ asset('assets/dashboard/img/avatars/13.png') }}" alt="Image Administrateur Chambre" class="rounded-circle">
                    </div>
                    <div class="chat-contact-info flex-grow-1 ms-2">
                        <h6 class="chat-contact-name text-truncate m-0">Admin Chambre R</h6>
                        <p class="chat-contact-status text-muted text-truncate mb-0">Sujet SMS</p>
                    </div>
                    <small class="text-muted mb-auto">5 Minutes</small>
                </a>
            </li>
            <li class="chat-contact-list-item ">
                <a class="d-flex align-items-center">
                    <div class="flex-shrink-0 avatar avatar-offline">
                        <img src="{{ asset('assets/dashboard/img/avatars/2.png') }}" alt="Image Admin" class="rounded-circle">
                    </div>
                    <div class="chat-contact-info flex-grow-1 ms-2">
                        <h6 class="chat-contact-name text-truncate m-0">Admin Chambre R</h6>
                        <p class="chat-contact-status text-muted text-truncate mb-0">Sujet SMS</p>
                    </div>
                    <small class="text-muted mb-auto">30 Minutes</small>
                </a>
            </li>
            <li class="chat-contact-list-item">
                <a class="d-flex align-items-center">
                    <div class="flex-shrink-0 avatar avatar-busy">
                        <span class="avatar-initial rounded-circle bg-label-success">CM</span>
                    </div>
                    <div class="chat-contact-info flex-grow-1 ms-2">
                        <h6 class="chat-contact-name text-truncate m-0">Admin Chambre</h6>
                        <p class="chat-contact-status text-muted text-truncate mb-0">Sujet SMS</p>
                    </div>
                    <small class="text-muted mb-auto">1 Day</small>
                </a>
            </li>
        </ul>

    </div>
</div>
<!-- /Chat contacts -->
