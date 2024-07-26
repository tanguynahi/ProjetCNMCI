@extends('layouts.dashboard', ['title' => 'Tableau de bord - CNMCI'])
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
            <!-- View sales -->
            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Bienvenue Super-Admin! 🎉</h5>
                                <p class="mb-2">Best seller of the month</p>
                                <h4 class="text-primary mb-1">$48.9k</h4>
                                <a href="javascript:;" class="btn btn-primary">View Sales</a>
                            </div>
                        </div>
                        <div class="col-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('assets/dashboard/img/illustrations/card-advance-sale.png') }}"
                                    height="140" alt="Photo de l'administrateur">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View sales -->

            <!-- Statistics -->
            <div class="col-xl-8 mb-4 col-lg-7 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="card-title mb-0">Statistics</h5>
                            <small class="text-muted">Updated 1 month ago</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                            class="ti ti-chart-pie-2 ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">230k</h5>
                                        <small>Sales</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">8.549k</h5>
                                        <small>Customers</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2"><i
                                            class="ti ti-shopping-cart ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">1.423k</h5>
                                        <small>Products</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2"><i
                                            class="ti ti-currency-dollar ti-sm"></i></div>
                                    <div class="card-info">
                                        <h5 class="mb-0">$9745</h5>
                                        <small>Revenue</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics -->

            <!-- Product List Table -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h5 class="card-title mb-0">Liste demandes</h5>
                        </div>
                        {{-- <div class="col-6">
                            <div class="d-flex justify-content-end">
                                <a href="#" class="btn btn-primary">Ajouter un admin</a>
                            </div>

                        </div> --}}
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
                                {{-- <th>Etat</th> --}}
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

                                    $statusBadge =
                                        $identification['STATUT'] == 1
                                            ? '<span class="badge bg-label-success text-capitalized"> Actif </span>'
                                            : '<span class="badge bg-label-danger text-capitalized"> Inactif </span>';

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
                                    {{-- <td>{!! $statusBadge !!}</td> --}}
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <a href="{{ route('identifications.show', $identification['ID_IDENTIFICATIONS']) }}"
                                                data-bs-toggle="tooltip"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill"
                                                data-bs-placement="top" aria-label="Infos" data-bs-original-title="Infos"><i
                                                    class="ti ti-eye mx-2 ti-md"></i>
                                            </a>
                                            {{-- <a href="{{ route('identifications.edit', $identification->id) }}"
                                                data-bs-toggle="tooltip"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill"
                                                data-bs-placement="top" aria-label="Modifier"
                                                data-bs-original-title="Modifier"><i class="ti ti-edit mx-2 ti-md"></i>
                                            </a>
                                            <a href="#deleteModal{{ $identification->id }}" id="DeleteIdentification"
                                                class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill"
                                                data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top"
                                                aria-label="Supprimer" data-bs-original-title="Supprimer"><i
                                                    class="ti ti-trash mx-2 ti-md"></i> --}}
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
{{-- 
                                                        <form method="POST"
                                                            action="{{ route('identifications.destroy', $identification->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" id="delete-record">Oui,
                                                                supprimer</button>
                                                        </form> --}}
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
    <!-- Page JS -->
    {{-- <script src="{{ asset('assets/dashboard/js/app-ecommerce-product-list.js') }}"></script> --}}


    <script>
        $(document).ready(function () {
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
