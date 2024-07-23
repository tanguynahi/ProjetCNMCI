@extends('layouts.espace_home_layouts', ['title' => 'Boîte a messagerie'])
@push('css')
<link rel="stylesheet" href="{{asset('assets/dashboard/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css')}}" />
<link rel="stylesheet" href="{{asset('assets/dashboard/vendor/css/pages/app-chat.css')}}">
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
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="{{asset('assets/dashboard/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<!-- Page JS -->
<script src="{{asset('assets/dashboard/js/app-chat.js')}}"></script>
@endpush
