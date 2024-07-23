@extends('layouts.espace_home_layouts', ['title' => 'Liste des Apprentis'])
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
                <a class="btn btn-primary" href="{{ route('apprenti.creation') }}"><i class="fa-solid fa-plus mx-1"></i>
                    Ajouter Un Apprenti</a>
            </span>
        </h4>
        <!-- Bootstrap Table with Header - Dark -->
        <div class="card">
            <h5 class="card-header">Liste des Apprentis</h5>
            <div class="card-datatable table-responsive">
                <table class="table align-middle table-nowrap" id="myTable">
                    <thead>
                        <tr class="table-dark ">
                            <th style="color: white;">Libelle</th>
                            <th style="color: white;">Description</th>
                            <th style="color: white;">Date debut</th>
                            <th style="color: white;">Date fin</th>
                            <th style="color: white;">Statut</th>
                            <th style="color: white;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($concours as $key => $value)
                            <tr>
                                <td> {{ $value->LIB_CONCOURS ?? 'xxxxx' }} </td>
                                <td> {{ Help::strCut($value->DESCRIPTIF ?? 'xxxxxx', 0, 30, '...') }} </td>
                                <td> {{ $value->DATE_DEBUT ?? 'AAAA-MM-JJ' }} </td>
                                <td> {{ $value->DATE_FIN ?? 'AAAA-MM-JJ' }} </td>
                                <td>
                                    @if ($value->STATUT == Help::$ACTIF)
                                        <span class="badge bg-success-subtle text-success text-uppercase">ACTIF</span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger text-uppercase">INACTIF</span>
                                    @endif
                                </td>
                                <td>
                                    <a type="button" onclick="formact({{ $value->ID_CONCOURS ?? 0 }}, 'form');"
                                        title="Modifier">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a type="button" onclick="formact({{ $value->ID_CONCOURS ?? 0 }}, 'rub');"
                                        title="Rubriques du concours">
                                        <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach --}}
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
