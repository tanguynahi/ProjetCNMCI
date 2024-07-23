@extends('layouts.espace_home_layouts', ['title' => 'Conversations'])
@push('css')
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-chat card overflow-hidden">
            <div class="row g-0">
                @include('home.Espaces.discution.show')
                <!-- Chat History -->
                <div class="col app-chat-history bg-body">
                    <div class="chat-history-wrapper">
                        <div class="chat-history-header border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex overflow-hidden align-items-center">
                                    <i class="ti ti-menu-2 ti-sm cursor-pointer d-lg-none d-block me-2"
                                        data-bs-toggle="sidebar" data-overlay data-target="#app-chat-contacts"></i>
                                    <div class="flex-shrink-0 avatar">
                                        <img src="{{ asset('assets/dashboard/img/avatars/2.png') }}" alt="Image Admin" class="rounded-circle"
                                            data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-right">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-2">
                                        <h6 class="m-0">Nom Admin</h6>
                                        <small class="user-status text-muted">Sujet Conversation</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-history-body bg-body">
                            <ul class="list-unstyled chat-history">
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">How can we help? We're here for you! 😄</p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='ti ti-checks ti-xs me-1 text-success'></i>
                                                <small>10:00 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="../../assets/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message">
                                    <div class="d-flex overflow-hidden">
                                        <div class="user-avatar flex-shrink-0 me-3">
                                            <div class="avatar avatar-sm">
                                                <img src="../../assets/img/avatars/2.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Hey John, I am looking for the best admin template.</p>
                                                <p class="mb-0">Could you please help me to find it out? 🤔</p>
                                            </div>
                                            <div class="chat-message-text mt-2">
                                                <p class="mb-0">It should be Bootstrap 5 compatible.</p>
                                            </div>
                                            <div class="text-muted mt-1">
                                                <small>10:02 AM</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Vuexy has all the components you'll ever need in a app.
                                                </p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='ti ti-checks ti-xs me-1 text-success'></i>
                                                <small>10:03 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="../../assets/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message">
                                    <div class="d-flex overflow-hidden">
                                        <div class="user-avatar flex-shrink-0 me-3">
                                            <div class="avatar avatar-sm">
                                                <img src="../../assets/img/avatars/2.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Looks clean and fresh UI. 😃</p>
                                            </div>
                                            <div class="chat-message-text mt-2">
                                                <p class="mb-0">It's perfect for my next project.</p>
                                            </div>
                                            <div class="chat-message-text mt-2">
                                                <p class="mb-0">How can I purchase it?</p>
                                            </div>
                                            <div class="text-muted mt-1">
                                                <small>10:05 AM</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Thanks, you can purchase it.</p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='ti ti-checks ti-xs me-1 text-success'></i>
                                                <small>10:06 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="../../assets/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message">
                                    <div class="d-flex overflow-hidden">
                                        <div class="user-avatar flex-shrink-0 me-3">
                                            <div class="avatar avatar-sm">
                                                <img src="../../assets/img/avatars/2.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">I will purchase it for sure. 👍</p>
                                            </div>
                                            <div class="chat-message-text mt-2">
                                                <p class="mb-0">Thanks.</p>
                                            </div>
                                            <div class="text-muted mt-1">
                                                <small>10:08 AM</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Great, Feel free to get in touch.</p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='ti ti-checks ti-xs me-1 text-success'></i>
                                                <small>10:10 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="../../assets/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message">
                                    <div class="d-flex overflow-hidden">
                                        <div class="user-avatar flex-shrink-0 me-3">
                                            <div class="avatar avatar-sm">
                                                <img src="../../assets/img/avatars/2.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Do you have design files for Vuexy?</p>
                                            </div>
                                            <div class="text-muted mt-1">
                                                <small>10:15 AM</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1 w-50">
                                            <div class="chat-message-text">
                                                <p class="mb-0">Yes that's correct documentation file, Design files are
                                                    included with the template.</p>
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class='ti ti-checks ti-xs me-1'></i>
                                                <small>10:15 AM</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="../../assets/img/avatars/1.png" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Chat message form -->
                        <div class="chat-history-footer shadow-sm">
                            <form class="form-send-message d-flex justify-content-between align-items-center ">
                                <input class="form-control message-input border-0 me-3 shadow-none"
                                    placeholder="Type your message here">
                                <div class="message-actions d-flex align-items-center">
                                    <i class="speech-to-text ti ti-microphone ti-sm cursor-pointer"></i>
                                    <label for="attach-doc" class="form-label mb-0">
                                        <i class="ti ti-photo ti-sm cursor-pointer mx-3"></i>
                                        <input type="file" id="attach-doc" hidden>
                                    </label>
                                    <button class="btn btn-primary d-flex send-msg-btn">
                                        <i class="ti ti-send me-md-1 me-0"></i>
                                        <span class="align-middle d-md-inline-block d-none">Send</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Chat History -->

                <!-- Sidebar Right -->
                <div class="col app-chat-sidebar-right app-sidebar overflow-hidden" id="app-chat-sidebar-right">
                    <div
                        class="sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                        <div class="avatar avatar-xl avatar-online">
                            <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                        </div>
                        <h6 class="mt-2 mb-0">Felecia Rower</h6>
                        <span>NextJS Developer</span>
                        <i class="ti ti-x ti-sm cursor-pointer close-sidebar d-block" data-bs-toggle="sidebar"
                            data-overlay data-target="#app-chat-sidebar-right"></i>
                    </div>
                    <div class="sidebar-body px-4 pb-4">
                        <div class="my-4">
                            <small class="text-muted text-uppercase">About</small>
                            <p class="mb-0 mt-3">A Next. js developer is a software developer who uses the Next. js
                                framework alongside ReactJS to build web applications.</p>
                        </div>
                        <div class="my-4">
                            <small class="text-muted text-uppercase">Personal Information</small>
                            <ul class="list-unstyled d-grid gap-2 mt-3">
                                <li class="d-flex align-items-center">
                                    <i class='ti ti-mail ti-sm'></i>
                                    <span class="align-middle ms-2">josephGreen@email.com</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class='ti ti-phone-call ti-sm'></i>
                                    <span class="align-middle ms-2">+1(123) 456 - 7890</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class='ti ti-clock ti-sm'></i>
                                    <span class="align-middle ms-2">Mon - Fri 10AM - 8PM</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <small class="text-muted text-uppercase">Options</small>
                            <ul class="list-unstyled d-grid gap-2 mt-3">
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='ti ti-badge ti-sm'></i>
                                    <span class="align-middle ms-2">Add Tag</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='ti ti-star ti-sm'></i>
                                    <span class="align-middle ms-2">Important Contact</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='ti ti-photo ti-sm'></i>
                                    <span class="align-middle ms-2">Shared Media</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='ti ti-trash ti-sm'></i>
                                    <span class="align-middle ms-2">Delete Contact</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class='ti ti-ban ti-sm'></i>
                                    <span class="align-middle ms-2">Block Contact</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar Right -->
                <div class="app-overlay"></div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
