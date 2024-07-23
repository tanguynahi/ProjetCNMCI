@extends('layouts.espace_home_layouts', ['title' => 'Liste des Compagnons'])
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="d-flex justify-content-between align-items-center py-3 mb-4">

            <span class="text-muted fw-light">

                {{-- <a href="{{ back()->getTargetUrl() }}"> <i class="fa-solid fa-arrow-left"></i> Retour</a> --}}
            </span>
            <span class="text-muted fw-light">
                <a class="btn btn-primary" href="{{ route('compagnon.creation') }}"><i class="fa-solid fa-plus mx-1"></i> Ajouter Un Compagnons</a>
            </span>
        </h4>
        <!-- Bootstrap Table with Header - Dark -->
        <div class="card">
            <h5 class="card-header">Liste des Compagnons</h5>
            <div class="card-datatable table-responsive">
                <table class="table align-middle table-nowrap" id="myTable">
                    <thead>
                        <tr class="table-dark ">
                            <th  style="color: white;">Libelle</th>
                            <th  style="color: white;">Description</th>
                            <th  style="color: white;">Date debut</th>
                            <th  style="color: white;">Date fin</th>
                            <th  style="color: white;">Statut</th>
                            <th  style="color: white;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script>
        $('#myTable').DataTable({
            responsive: true
        });
    </script>
@endpush
