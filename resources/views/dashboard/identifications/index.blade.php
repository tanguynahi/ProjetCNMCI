@extends('layouts.dashboard', ['title' => 'Identifications - validation de compte'])
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
                            <h5 class="card-title mb-0">Liste des identifications</h5>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('identifications.index') }}" class="btn btn-primary">Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <table class="table align-middle table-nowrap" id="myTable">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Artisan</th>
                                <th>N° Identification</th>
                                <th>Métier</th>
                                <th>N° Régistre</th>
                                <th>Entreprise</th>
                                <th>Commune</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($identifications as $index => $identification)
                                @php
                                   $imgUrl = $identification['AVATAR_ARTIS']
                                        ? asset($identification['AVATAR_ARTIS'])
                                        : asset('assets/dashboard/img/avatars/1.png');

                                    $avisBadge = '';

                                    if ($identification['STATUT'] == 3) {
                                        $avisBadge =
                                            '<span class="badge bg-label-warning text-capitalized"> En Attente </span>';
                                    } elseif ($identification['STATUT'] == 1) {
                                        $avisBadge =
                                            '<span class="badge bg-label-success text-capitalized"> Acceptée </span>';
                                    } elseif ($identification['STATUT'] == 4) {
                                        $avisBadge =
                                            '<span class="badge bg-label-danger text-capitalized"> Refusée </span>';
                                    }

                                @endphp
                                <tr>
                                    <td><span class="text-primary fw-bold">#{{ $index + 1 }}</span></td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="avatar-wrapper">
                                                <div class="avatar avatar-sm me-3">
                                                    <img src="{{ $imgUrl }}" alt="Photo de profil"
                                                        class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <a href="pages-profile-user.html" class="text-heading text-truncate">
                                                    <span class="fw-medium">{{ ($identification['CIVILITE_ARTIS']) }}
                                                        {{ $identification['NOM_ARTIS'] }}
                                                        {{ $identification['PRENOMS_ARTIS'] }}</span>
                                                </a>
                                                <small class="text-truncate">{{ $identification['CONTACT_ARTIS'] }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $identification['NUMERO_IDENT'] }}</td>
                                    <td>{{ $identification['ID_TYPE_ACTIVITES'] }}</td>
                                    <td>{{ $identification['NUMERO_REGISTRE'] }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="d-flex flex-column">
                                                <a href="pages-profile-user.html" class="text-heading text-truncate">
                                                    <span
                                                    class="fw-medium">{{ $identification['DENOMINATION'] }}</span>
                                                </a>
                                                <small
                                                    class="text-truncate">{{ $identification['ID_TYPE_ENTREPRISES'] }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ ($identification['ID_COMMUNE']) }}</td>

                                    <td>{!! $avisBadge !!}</td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <a href="{{ route('identifications.show', $identification['ID_IDENTIFICATIONS']) }}"
                                                data-bs-toggle="tooltip"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill"
                                                data-bs-placement="top" aria-label="Infos" data-bs-original-title="Infos"><i
                                                    class="ti ti-eye mx-2 ti-md"></i>
                                            </a>
                                            <a href="{{ route('identifications.edit', $identification['ID_IDENTIFICATIONS']) }}"
                                                data-bs-toggle="tooltip"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill"
                                                data-bs-placement="top" aria-label="Modifier"
                                                data-bs-original-title="Modifier"><i class="ti ti-edit mx-2 ti-md"></i>
                                            </a>
                                            <a href="#deleteModal{{ $identification['ID_IDENTIFICATIONS'] }}" id="DeleteIdentification"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill"
                                                data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top"
                                                aria-label="Supprimer" data-bs-original-title="Supprimer"><i
                                                    class="ti ti-trash mx-2 ti-md"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal delete-->
                                <div class="modal fade flip" id="deleteModal{{ $identification['ID_IDENTIFICATIONS'] }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body p-5 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                    colors="primary:#405189,secondary:#f06548"
                                                    style="width:90px;height:90px">
                                                </lord-icon>
                                                <div class="mt-4 text-center">
                                                    <h4>Vous êtes sur le point de supprimer <br>une identification ?</h4>
                                                    <p class="text-muted fs-15 mb-4">En supprimant cette identification,
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
                                                            action="{{ route('identifications.destroy', $identification['ID_IDENTIFICATIONS']) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" id="delete-record">Oui,
                                                                supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
