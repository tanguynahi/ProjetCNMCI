@extends('layouts.dashboard', ['title' => 'Branches d/ activites - Liste des Images'])


@push('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendor/libs/select2/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Admins List Table -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title mb-0">Liste des Branches</h5>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('brancheactivites.create') }}" class="btn btn-primary">Ajouter Une Branche</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <table class="table align-middle table-nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Libelle</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brancheActivites as $index => $brancheActivite)
                                @php
                                    $statusBadge =
                                        $brancheActivite->status == 1
                                            ? '<span class="badge bg-success"> Actif </span>'
                                            : '<span class="badge bg-danger"> Inactif </span>';
                                @endphp
                                <tr>
                                    <td><span class="text-primary fw-bold">#{{ $index + 1 }}</span></td>

                                    <td>{{ $brancheActivite->libelle }}</td>
                                    <td style="white-space: pre-line;">{!! couperTexte2($brancheActivite->description, 20) !!}</td>

                                    <td>{!! $statusBadge !!}</td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('brancheactivites.edit', $brancheActivite->id) }}"
                                                data-bs-toggle="tooltip"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill"
                                                data-bs-placement="top" aria-label="Modifier"
                                                data-bs-original-title="Modifier"><i class="ti ti-edit mx-2 ti-md"></i>
                                            </a>
                                            <a href="#deleteModal{{ $brancheActivite->id }}" id="DeleteIdentification"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill"
                                                data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top"
                                                aria-label="Supprimer" data-bs-original-title="Supprimer"><i
                                                    class="ti ti-trash mx-2 ti-md"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal delete-->
                                <div class="modal fade flip" id="deleteModal{{ $brancheActivite->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-5 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                    colors="primary:#405189,secondary:#f06548"
                                                    style="width:90px;height:90px">
                                                </lord-icon>
                                                <div class="mt-4 text-center">
                                                    <h4>Vous êtes sur le point de supprimer <br>une branche d'activite ?</h4>
                                                    <p class="text-muted fs-15 mb-4">En supprimant cette branche d'activite,
                                                        vous
                                                        supprimez
                                                        <br> toutes les informations la concernant de notre base de données.
                                                    </p>
                                                    <div class="hstack gap-2 justify-content-center remove">
                                                        <button
                                                            class="btn btn-link link-success fw-medium text-decoration-none"
                                                            id="deleteRecord-close" data-bs-dismiss="modal"><i
                                                                class="ri-close-line me-1 align-middle"></i> Fermer</button>

                                                        <form method="POST"
                                                            action="{{ route('brancheactivites.destroy', $brancheActivite->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                                                            <button class="btn btn-danger" id="delete-record">Oui,
                                                                supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end modal -->
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Vendors JS -->
    <script src="{{ asset('assets/dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

    <script src="{{ asset('assets/dashboard/vendor/libs/select2/select2.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
            $('#myTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json',
                },
                // dom: 'Bfrtip',
                dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                buttons: ['csv', 'print', 'excel', 'pdf'],

            });
        });
    </script>
@endpush
