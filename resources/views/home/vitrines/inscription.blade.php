<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 admin dashboard template & web App ui kit.">
    <meta name="keyword"
        content="LUNO, Bootstrap 5, ReactJs, Angular, Laravel, VueJs, ASP .Net, Admin Dashboard, Admin Theme, HRMS, Projects, Hospital Admin, CRM Admin, Events, Fitness, Music, Inventory, Job Portal">
    <link rel="icon" href="{{ asset('assets/home/cnmci.jpg') }}" type="image/x-icon"> <!-- Favicon-->
    <title>Formulaire d'identification</title>
    <link rel="stylesheet" href="{{ asset('assets/home/css/luno-style.css') }}">
    <script src="{{ asset('assets/home/js/plugins.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/home/bundles/jquerysteps.min.css') }}">
    <script src="{{ asset('assets/home/bundles/jquerysteps.bundle.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/home/cssbundle/jquerysteps.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/vendor/prismjs/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/cssbundle/bootstrapdatepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/vendor/parsleyjs/css/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/vendor/prismjs/prism.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    @stack('css')

</head>

<body class="layout-1" data-luno="theme-blue">
    <style>
        .hidden {
            display: none;
        }
    </style>
    <div class="wrapper">
        @include('partials.home_partials.header')
        <div
            class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3"style="background-image:url('{{ asset('assets/home/show.jpg') }}'); background-repeat: no-repeat; background-size:cover;">
            <div class="container">
                <div class="row g-3">
                    <div class="col-12 mt-3 mb-3">
                        <h5 class="card-title text-center" style="color:white;">Formulaire d'identification</h5>
                        <form action="{{ route('identification.artisan') }}" id="multi-step-form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="step-app h-wizard-demo1">
                                        <ul class="step-steps">
                                            <li data-step-target="step1"><span>1</span>Information sur l'entreprise</li>
                                            <li data-step-target="step2"><span>2</span> Information Artisan</li>
                                            <li data-step-target="step3"><span>3</span> Information Gerant</li>
                                            <li data-step-target="step4"><span>4</span> Compagnon et Apprentir</li>
                                        </ul>

                                        <div class="step-content">
                                            {{-- debut de premiere partir --}}
                                            <div class="step-tab-panel" data-step="step1" id="step1">
                                                @include('home.vitrines.inscriptions.step_entreprise')
                                            </div>
                                            {{-- artisan --}}
                                            <div class="step-tab-panel" data-step="step2" id="step2">
                                                @include('home.vitrines.inscriptions.step_artisan')
                                            </div>
                                            {{-- gerant --}}
                                            <div class="step-tab-panel" data-step="step3" id="step3">
                                                @include('home.vitrines.inscriptions.step_gerant')
                                            </div>

                                            <div class="step-tab-panel" data-step="step4" id="step4">
                                                <div class="row g-3">
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label class="form-label">Avez-vous des compagnons
                                                                ?</label><br>
                                                            <input class="form-check-input exclusive-checkbox"
                                                                type="checkbox" id="checkbox-oui">
                                                            <label class="form-check-label"
                                                                for="checkbox-oui">Oui</label>
                                                            <input class="form-check-input exclusive-checkbox"
                                                                type="checkbox" id="checkbox-non">
                                                            <label class="form-check-label"
                                                                for="checkbox-non">Non</label>
                                                        </div>
                                                        <div class="col-md-9 col-lg-9 col-12">
                                                            <input type="number" name="nombre_compagnon"
                                                                class="form-control hidden @error('nombre_compagnon') is-invalid @enderror"
                                                                id="nombre-compagnons"
                                                                placeholder="Nombre Total de compagnons"
                                                                value="{{ old('nombre_compagnon') }}">
                                                            @error('nombre_compagnon')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label class="form-label">Avez-vous des apprentis ?</label>
                                                            <br>
                                                            <input class="form-check-input exclusive-checkbox"
                                                                type="checkbox" id="apprenti-ok">
                                                            <label class="form-check-label"
                                                                for="checkbox-ok">Oui</label>
                                                            <input class="form-check-input exclusive-checkbox"
                                                                type="checkbox" id="apprenti-no">
                                                            <label class="form-check-label"
                                                                for="checkbox-no">Non</label>
                                                        </div>
                                                        <div class="col-md-9 col-lg-9 col-12 mt-3">
                                                            <input type="number" name="nombre_apprenti"
                                                                class="form-control hidden @error('nombre_apprenti') is-invalid @enderror"
                                                                id="nombre-apprentis"
                                                                placeholder="Nombre Total d'apprentis"
                                                                value="{{ old('nombre_apprenti') }}">
                                                            @error('nombre_apprenti')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <hr class="mt-4 mb-3">
                                                        <div class="row mt-2">
                                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                                <input type="checkbox"
                                                                    name="declaration_maitrise_metier"
                                                                    id="declaration_maitrise_metier" required
                                                                    class="form-check-input exclusive-checkbox @error('declaration_maitrise_metier') is-invalid
                                                                    @enderror"
                                                                    value="1">
                                                                @error('declaration_maitrise_metier')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                <span for="" class="fw-bold">
                                                                    Je déclare sur l'honneur maîtriser les competences,
                                                                    aptitudes et connaissances permettant l'exercice du
                                                                    métier ci-dessus mentionné
                                                                </span> <br>
                                                                <span class="text-center">
                                                                    J'accepte que toute fausse déclaration engage ma
                                                                    responsabilité pénale
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                                <input type="checkbox" name="declaration_honneur"
                                                                    id="declaration_honneur" value="1"
                                                                    class="form-check-input exclusive-checkbox @error('declaration_honneur') is-invalid
                                                                   @enderror"
                                                                    required>
                                                                @error('declaration_honneur')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                <span class="fw-bold">
                                                                    Je déclare n’avoir fait l’objet d’aucune
                                                                    condamnation pénale liée aux infractions contre les
                                                                    mineurs ou de sanction administrative m’interdisant
                                                                    de recevoir des mineurs en apprentissage.
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                                <p>déclaration de confidentialité</p>
                                                                <p for="" class="fw-bold">
                                                                    Nous collectons, utilisons et conservons vos
                                                                    informations personnelles telles que votre nom,
                                                                    adresse e-mail, et données de connexion, pour
                                                                    fournir et améliorer nos services, personnaliser
                                                                    votre expérience, et assurer la sécurité de notre
                                                                    plateforme. Vos données financières sont également
                                                                    collectées pour gérer les transactions et sont
                                                                    conservées conformément aux obligations légales.
                                                                    Nous mettons en œuvre des mesures de sécurité
                                                                    appropriées pour protéger vos informations contre
                                                                    tout accès non autorisé. Vous avez le droit
                                                                    d'accéder à vos données, de les rectifier, de
                                                                    demander leur suppression ou de vous opposer à leur
                                                                    traitement.
                                                                </p>
                                                                <p>En cliquant sur <span
                                                                        class="text-primary">"J'accepte"</span> , vous
                                                                    consentez à la
                                                                    collecte, l'utilisation et la conservation de vos
                                                                    informations personnelles comme décrit dans cette
                                                                    déclaration.</p>
                                                                <input type="checkbox" name="accepte_confidentialite"
                                                                    id="accepte_confidentialite" value="1"
                                                                    class="form-check-input exclusive-checkbox @error('accepte_confidentialite') is-invalid
                                                                   @enderror"
                                                                    required>
                                                                @error('accepte_confidentialite')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                <span class="fw-bold">
                                                                    J'accepte
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="row mt-2 justify-content-center text-center">
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                                            <h6 for="signature" class="fw-bold">Votre signature <span
                                                                    class="text-danger">*</span></h6>

                                                            <canvas id="signature-pad" width="300" height="300"
                                                                class="@error('signature') is-invalid
                                                                   @enderror"></canvas>
                                                            <br>
                                                            <span><i>Veuillez Entrer une signature electronique <span
                                                                        style="color: gray">(champs
                                                                        Obligatoire)</span></i></span>
                                                            @error('signature')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                                    <button id="save-btn"
                                                                        class="btn btn-primary">Enregistrer
                                                                        la signature</button>
                                                                    <button id="clear-btn"
                                                                        class="btn btn-danger">Effacer</button>
                                                                    <input type="file" name="signature"
                                                                        id="signature" class="hidden"
                                                                        value="{{ old('signature') }}" hidden
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <style>
                                                        canvas {
                                                            border: 1px solid #000;
                                                            cursor: crosshair;
                                                        }

                                                        button {
                                                            margin: 5px;
                                                        }
                                                    </style>
                                                    @push('js')
                                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', () => {
                                                                const canvas = document.getElementById('signature-pad');
                                                                const context = canvas.getContext('2d');
                                                                let drawing = false;

                                                                // Gestionnaires pour les événements de souris
                                                                canvas.addEventListener('mousedown', startDrawing);
                                                                canvas.addEventListener('mousemove', draw);
                                                                canvas.addEventListener('mouseup', stopDrawing);
                                                                canvas.addEventListener('mouseout', stopDrawing);

                                                                // Gestionnaires pour les événements tactiles
                                                                canvas.addEventListener('touchstart', startDrawing);
                                                                canvas.addEventListener('touchmove', draw);
                                                                canvas.addEventListener('touchend', stopDrawing);

                                                                function startDrawing(event) {
                                                                    event.preventDefault();
                                                                    drawing = true;
                                                                    const {
                                                                        offsetX,
                                                                        offsetY
                                                                    } = getEventPosition(event);
                                                                    context.beginPath();
                                                                    context.moveTo(offsetX, offsetY);
                                                                }

                                                                function draw(event) {
                                                                    event.preventDefault();
                                                                    if (!drawing) return;
                                                                    const {
                                                                        offsetX,
                                                                        offsetY
                                                                    } = getEventPosition(event);
                                                                    context.lineTo(offsetX, offsetY);
                                                                    context.stroke();
                                                                }

                                                                function stopDrawing(event) {
                                                                    event.preventDefault();
                                                                    drawing = false;
                                                                }

                                                                function getEventPosition(event) {
                                                                    if (event.touches && event.touches[0]) {
                                                                        const rect = canvas.getBoundingClientRect();
                                                                        return {
                                                                            offsetX: event.touches[0].clientX - rect.left,
                                                                            offsetY: event.touches[0].clientY - rect.top
                                                                        };
                                                                    } else {
                                                                        return {
                                                                            offsetX: event.offsetX,
                                                                            offsetY: event.offsetY
                                                                        };
                                                                    }
                                                                }

                                                                document.getElementById('save-btn').addEventListener('click', (event) => {
                                                                    event.preventDefault(); // Prevent form submission

                                                                    const dataURL = canvas.toDataURL('image/png');
                                                                    const blob = dataURLToBlob(dataURL);
                                                                    const file = new File([blob], 'signature.png', {
                                                                        type: 'image/png'
                                                                    });
                                                                    const fileInput = document.getElementById('signature');
                                                                    const dataTransfer = new DataTransfer();
                                                                    dataTransfer.items.add(file);
                                                                    fileInput.files = dataTransfer.files;

                                                                    // Trigger a change event for the file input
                                                                    const fileInputChangeEvent = new Event('change', {
                                                                        bubbles: true
                                                                    });
                                                                    fileInput.dispatchEvent(fileInputChangeEvent);

                                                                    // Optionally provide user feedback
                                                                    Swal.fire({
                                                                        title: 'Succès!',
                                                                        text: 'Signature enregistrée.',
                                                                        icon: 'success',
                                                                        confirmButtonText: 'OK'
                                                                    });
                                                                });

                                                                document.getElementById('clear-btn').addEventListener('click', (event) => {
                                                                    event.preventDefault(); // Prevent form submission
                                                                    context.clearRect(0, 0, canvas.width, canvas.height);
                                                                });

                                                                function dataURLToBlob(dataURL) {
                                                                    const byteString = atob(dataURL.split(',')[1]);
                                                                    const mimeString = dataURL.split(',')[0].split(':')[1].split(';')[0];
                                                                    const ab = new ArrayBuffer(byteString.length);
                                                                    const ia = new Uint8Array(ab);
                                                                    for (let i = 0; i < byteString.length; i++) {
                                                                        ia[i] = byteString.charCodeAt(i);
                                                                    }
                                                                    return new Blob([ab], {
                                                                        type: mimeString
                                                                    });
                                                                }
                                                            });
                                                        </script>
                                                    @endpush --}}
                                                    <div class="row mt-2 justify-content-center text-center">
                                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                                            <h6 for="signature" class="fw-bold">Votre signature <span
                                                                    class="text-danger">*</span></h6>

                                                            <canvas id="signature-pad" width="300" height="300"
                                                                class="@error('signature') is-invalid @enderror"></canvas>
                                                            <br>
                                                            <span><i>Veuillez Entrer une signature electronique <span
                                                                        style="color: gray">(champs
                                                                        Obligatoire)</span></i></span>
                                                            @error('signature')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                                                    <button id="save-btn"
                                                                        class="btn btn-primary">Enregistrer la
                                                                        signature</button>
                                                                    <button id="clear-btn"
                                                                        class="btn btn-danger">Effacer</button>
                                                                    <input type="file" name="signature"
                                                                        id="signature" class="hidden"
                                                                        value="{{ old('signature') }}" hidden
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <style>
                                                        canvas {
                                                            border: 1px solid #000;
                                                            cursor: crosshair;
                                                        }

                                                        button {
                                                            margin: 5px;
                                                        }
                                                    </style>

                                                    @push('js')
                                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', () => {
                                                                const canvas = document.getElementById('signature-pad');
                                                                const context = canvas.getContext('2d');
                                                                let drawing = false;

                                                                // Gestionnaires pour les événements de souris
                                                                canvas.addEventListener('mousedown', startDrawing);
                                                                canvas.addEventListener('mousemove', draw);
                                                                canvas.addEventListener('mouseup', stopDrawing);
                                                                canvas.addEventListener('mouseout', stopDrawing);

                                                                // Gestionnaires pour les événements tactiles
                                                                canvas.addEventListener('touchstart', startDrawing);
                                                                canvas.addEventListener('touchmove', draw);
                                                                canvas.addEventListener('touchend', stopDrawing);

                                                                function startDrawing(event) {
                                                                    event.preventDefault();
                                                                    drawing = true;
                                                                    const {
                                                                        offsetX,
                                                                        offsetY
                                                                    } = getEventPosition(event);
                                                                    context.beginPath();
                                                                    context.moveTo(offsetX, offsetY);
                                                                }

                                                                function draw(event) {
                                                                    event.preventDefault();
                                                                    if (!drawing) return;
                                                                    const {
                                                                        offsetX,
                                                                        offsetY
                                                                    } = getEventPosition(event);
                                                                    context.lineTo(offsetX, offsetY);
                                                                    context.stroke();
                                                                }

                                                                function stopDrawing(event) {
                                                                    event.preventDefault();
                                                                    drawing = false;
                                                                }

                                                                function getEventPosition(event) {
                                                                    if (event.touches && event.touches[0]) {
                                                                        const rect = canvas.getBoundingClientRect();
                                                                        return {
                                                                            offsetX: event.touches[0].clientX - rect.left,
                                                                            offsetY: event.touches[0].clientY - rect.top
                                                                        };
                                                                    } else {
                                                                        return {
                                                                            offsetX: event.offsetX,
                                                                            offsetY: event.offsetY
                                                                        };
                                                                    }
                                                                }

                                                                function isCanvasBlank(canvas) {
                                                                    const blank = document.createElement('canvas');
                                                                    blank.width = canvas.width;
                                                                    blank.height = canvas.height;
                                                                    return canvas.toDataURL() === blank.toDataURL();
                                                                }

                                                                document.getElementById('save-btn').addEventListener('click', (event) => {
                                                                    event.preventDefault(); // Prevent form submission

                                                                    if (isCanvasBlank(canvas)) {
                                                                        Swal.fire({
                                                                            title: 'Erreur!',
                                                                            text: 'Veuillez entrer une signature.',
                                                                            icon: 'error',
                                                                            confirmButtonText: 'OK'
                                                                        });
                                                                        return;
                                                                    }

                                                                    const dataURL = canvas.toDataURL('image/png');
                                                                    const blob = dataURLToBlob(dataURL);
                                                                    const file = new File([blob], 'signature.png', {
                                                                        type: 'image/png'
                                                                    });
                                                                    const fileInput = document.getElementById('signature');
                                                                    const dataTransfer = new DataTransfer();
                                                                    dataTransfer.items.add(file);
                                                                    fileInput.files = dataTransfer.files;

                                                                    // Trigger a change event for the file input
                                                                    const fileInputChangeEvent = new Event('change', {
                                                                        bubbles: true
                                                                    });
                                                                    fileInput.dispatchEvent(fileInputChangeEvent);

                                                                    // Optionally provide user feedback
                                                                    Swal.fire({
                                                                        title: 'Succès!',
                                                                        text: 'Signature enregistrée.',
                                                                        icon: 'success',
                                                                        confirmButtonText: 'OK'
                                                                    });
                                                                });

                                                                document.getElementById('clear-btn').addEventListener('click', (event) => {
                                                                    event.preventDefault(); // Prevent form submission
                                                                    context.clearRect(0, 0, canvas.width, canvas.height);
                                                                });

                                                                function dataURLToBlob(dataURL) {
                                                                    const byteString = atob(dataURL.split(',')[1]);
                                                                    const mimeString = dataURL.split(',')[0].split(':')[1].split(';')[0];
                                                                    const ab = new ArrayBuffer(byteString.length);
                                                                    const ia = new Uint8Array(ab);
                                                                    for (let i = 0; i < byteString.length; i++) {
                                                                        ia[i] = byteString.charCodeAt(i);
                                                                    }
                                                                    return new Blob([ab], {
                                                                        type: mimeString
                                                                    });
                                                                }
                                                            });
                                                        </script>
                                                    @endpush
                                                    <div class="mt-3">
                                                        <p><span class="text-danger fw-bold">*</span> Champs
                                                            obligatoires.</p>
                                                    </div>
                                                    <div class="step-footer d-flex justify-content-between">
                                                        <button data-step-action="prev"
                                                            class="btn btn-primary step-btn">Précédents</button>

                                                        <button type="submit"
                                                            class="btn btn-success step-btn ">Valider
                                                        </button>
                                                    </div>
                                                </div> <!-- .row end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- @include('home.vitrines.autre') --}}
                </div>
            </div>
        </div>
        <br>
        @include('partials.home_partials.footer')
    </div>
    @include('home.vitrines.inscriptions.les_scritpt')
    <script>
        // affiche le formulaire si on selectionne non
        $(document).ready(function() {
            $('#btn-oui').click(function() {
                copyArtisanToGerant();
                document.getElementById('etes_gerant').value = '1';
                $('#gerant-details').show();
            });

            $('#btn-non').click(function() {
                document.getElementById('etes_gerant').value = '0';
                $('#gerant-details').show();
                vide();
            });
            $('#niveau-etude-gerants').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue === 'Primaire' || selectedValue === 'Secondaire' || selectedValue ===
                    'Superieur') {
                    $('#div-classe-gerants').show();
                    $('#div-diplome-gerants').show();
                } else {
                    $('#div-classe-gerants').hide();
                    $('#div-diplome-gerants').hide();
                }
            });

            // Initialisation de Select2
            $('.select2').select2();

        });
        //copy si oui est gerant
        function copyArtisanToGerant() {
            document.getElementById('nom_gerant').value = document.getElementById('nom_artisan').value;
            document.getElementById('prenom_gerant').value = document.getElementById('prenom_artisan').value;
            document.getElementById('sexe_gerant').value = document.getElementById('sexe_artisan').value;
            document.getElementById('etat_civil_gerant').value = document.getElementById('etat_civil_artisan').value;
            document.getElementById('nationalite_gerant').value = document.getElementById('nationalite_artisan').value;
            document.getElementById('date_naissance_gerant').value = document.getElementById('date_naissance_artisan')
                .value;
            document.getElementById('lieu_naissance_gerant').value = document.getElementById('lieu_naissance_artisan')
                .value;
            document.getElementById('adresse_gerant').value = document.getElementById('adresse_artisan').value;
            document.getElementById('email_gerant').value = document.getElementById('email_artisan').value;
            document.getElementById('apprentissage_metier_gerant').value = document.getElementById(
                'apprentissage_metier').value;
            document.getElementById('contact_gerant').value = document.getElementById('contact_artisan').value;
            document.getElementById('contact_whatsapp_gerant').value = document.getElementById('contact_whatsapp')
                .value;
            document.getElementById('type-gerant-piece').value = document.getElementById('type-artisan-piece').value;

            document.getElementById('lien_type_document_gerant').value = document.getElementById(
                'lien_type_document_artisan').value;
            document.getElementById('autre_document_gerant').value = document.getElementById('autre_document_artisan')
                .value;
            document.getElementById('numero_document_gerant').value = document.getElementById('numero_document_artisan')
                .value;
            document.getElementById('lieu_delivrance_document_gerant').value = document.getElementById(
                'lieu_delivrance_document_artisan').value;
            document.getElementById('date_delivrance_document_gerant').value = document.getElementById(
                'date_delivrance_document_artisan').value;

            document.getElementById('niveau-etude-gerants').value = document.getElementById(
                'niveau-etude-artisan').value;
            document.getElementById('classe_gerant').value = document.getElementById(
                'classe').value;
            document.getElementById('diplome_etude_obtenu_gerant').value = document.getElementById(
                'diplome_etude_obtenu').value;

            document.getElementById('diplome_cnmci_gerant').value = document.getElementById(
                'diplome_cnmci').value;
            document.getElementById('lien_photo_gerant').value = document.getElementById(
                'file-input').value;
            document.getElementById('niveau_metier_gerant').value = document.getElementById(
                'niveau_metier_artisan').value;
            document.getElementById('diplome_metier_obtenu_gerant').value = document.getElementById(
                'diplome_metier_obtenu').value;
            updateGerantPieceFields();

            if (document.getElementById('niveau-etude-artisan').value !== 'Non Scolariser') {
                $('#niveau-etude-gerants').change();
            }
        }

        function vide() {
            document.getElementById('nom_gerant').value = '';
            document.getElementById('prenom_gerant').value = '';
            document.getElementById('sexe_gerant').value = '';
            document.getElementById('etat_civil_gerant').value = '';
            document.getElementById('nationalite_gerant').value = '';
            document.getElementById('date_naissance_gerant').value = '';
            document.getElementById('lieu_naissance_gerant').value = '';
            document.getElementById('adresse_gerant').value = '';
            document.getElementById('email_gerant').value = '';
            document.getElementById('apprentissage_metier_gerant').value = '';
            document.getElementById('contact_gerant').value = '';
            document.getElementById('contact_whatsapp_gerant').value = '';
            document.getElementById('type-gerant-piece').value = '';
            document.getElementById('autre_document_gerant').value = '';
            document.getElementById('lien_type_document_gerant').value = '';
            document.getElementById('numero_document_gerant').value = '';
            document.getElementById('lieu_delivrance_document_gerant').value = '';
            document.getElementById('date_delivrance_document_gerant').value = '';
            document.getElementById('niveau-etude-gerants').value = '';
            document.getElementById('classe_gerant').value = '';
            document.getElementById('diplome_etude_obtenu_gerant').value = '';
            document.getElementById('diplome_cnmci_gerant').value = '';
            document.getElementById('lien_photo_gerant').value = '';
            document.getElementById('niveau_metier_gerant').value = '';
            document.getElementById('diplome_metier_obtenu_gerant').value = '';
        }

        function updateGerantPieceFields() {
            var typePiece = document.getElementById('type-artisan-piece').value;
            var typeGerantPiece = document.getElementById('type-gerant-piece');

            // Mise à jour du type de pièce du gérant
            typeGerantPiece.value = typePiece;

            // Mise à jour de l'affichage des champs en fonction du type de pièce
            var preciserGerantPiece = document.getElementById('preciser-gerant-piece');
            var lienGerantPiece = document.getElementById('lien-gerant-piece');
            var numeroGerantPiece = document.getElementById('numero-gerant-piece');
            var delivreGerantPiece = document.getElementById('delivre-gerant-piece');
            var leGerantPiece = document.getElementById('le-gerant-piece');

            // Réinitialiser l'affichage des champs
            preciserGerantPiece.style.display = 'none';
            lienGerantPiece.style.display = 'none';
            numeroGerantPiece.style.display = 'none';
            delivreGerantPiece.style.display = 'none';
            leGerantPiece.style.display = 'none';

            // Afficher les champs correspondants en fonction de la sélection
            if (typePiece === '5') {
                preciserGerantPiece.style.display = 'block';
            } else if (['1', '2', '3', '4'].includes(typePiece)) {
                lienGerantPiece.style.display = 'block';
                numeroGerantPiece.style.display = 'block';
                delivreGerantPiece.style.display = 'block';
                leGerantPiece.style.display = 'block';
            }
        }
    </script>

    <script src="{{ asset('assets/home/vendor/prismjs/prism.js') }}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('assets/home/js/plugins.js') }}"></script>
    <!-- Jquery Page Js -->
    <script src="{{ asset('assets/home/js/theme.js') }}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('assets/home/js/bundle/jquerysteps.bundle.js') }}"></script>
    <script>
        // Step Demo 1
        $('.h-wizard-demo1').steps({});
        // Step Demo 2
        $('.h-wizard-demo2').steps({});
        // Step Demo 3
        $('.h-wizard-demo3').steps({});
        // Step Demo 4
        $('.h-wizard-demo4').steps({});
    </script>

    <!-- Jquery Page Js -->
    <!-- Plugin Js -->
    <script src="{{ asset('assets/home/js/bundle/bootstrapdatepicker.bundle.js') }}"></script>
    <script src="{{ asset('assets/home/js/bundle/inputmask.bundle.js') }}"></script>
    <script src="{{ asset('assets/home/vendor/parsleyjs/js/parsley.js') }}"></script>
    <script>
        // Masking
        Inputmask({
            "mask": "9999999999"
        }).mask(".phone-number");
        // Form Validation
        // $('.basic-form').parsley();
        // Date Picker
        $('.datepicker').datepicker({});
    </script>
    @stack('js')
    @include('vendor.sweetalert.alert')
</body>

</html>
{{-- @push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const canvas = document.getElementById('signature-pad');
            const context = canvas.getContext('2d');
            let drawing = false;

            canvas.addEventListener('mousedown', (event) => {
                drawing = true;
                context.beginPath();
                context.moveTo(event.offsetX, event.offsetY);
            });

            canvas.addEventListener('mousemove', (event) => {
                if (drawing) {
                    context.lineTo(event.offsetX, event.offsetY);
                    context.stroke();
                }
            });

            canvas.addEventListener('mouseup', () => {
                drawing = false;
            });
            canvas.addEventListener('mouseout', () => {
                drawing = false;
            });
            document.getElementById('save-btn').addEventListener('click', (event) => {
                event.preventDefault(); // Prevent form submission

                const dataURL = canvas.toDataURL('image/png');
                const blob = dataURLToBlob(dataURL);
                const file = new File([blob], 'signature.png', {
                    type: 'image/png'
                });
                const fileInput = document.getElementById('signature');
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;

                // Trigger a change event for the file input
                const fileInputChangeEvent = new Event('change', {
                    bubbles: true
                });
                fileInput.dispatchEvent(fileInputChangeEvent);

                // Optionally provide user feedback
                // alert('Signature enregistrée.');
                Swal.fire({
                    title: 'Succès!',
                    text: 'Signature enregistrée.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
            document.getElementById('clear-btn').addEventListener('click', (event) => {
                event.preventDefault(); // Prevent form submission
                context.clearRect(0, 0, canvas.width, canvas.height);
            });

            function dataURLToBlob(dataURL) {
                const byteString = atob(dataURL.split(',')[1]);
                const mimeString = dataURL.split(',')[0].split(':')[1].split(';')[0];
                const ab = new ArrayBuffer(byteString.length);
                const ia = new Uint8Array(ab);
                for (let i = 0; i < byteString.length; i++) {
                    ia[i] = byteString.charCodeAt(i);
                }
                return new Blob([ab], {
                    type: mimeString
                });
            }
        });
    </script>
@endpush --}}
