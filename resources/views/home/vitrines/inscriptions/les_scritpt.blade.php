<script>
    let currentStep = 1; // Définition de l'étape actuelle
    const totalSteps = document.querySelectorAll('.step').length;

    function validateForm(currentStepIndex) {
        const steps = document.querySelectorAll('.step-tab-panel'); // Sélectionnez tous les steps
        const currentStep = steps[currentStepIndex]; // Obtenez le step actif en fonction de l'index

        const requiredFields = currentStep.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });

        if (!isValid) {
            // alert('Veuillez remplir tous les champs obligatoires.');
        }

        return isValid;
    }

    //
</script>
<script>
    // Récupération de l'élément de sélection
    var selectPieces = document.getElementById('type-artisan-piece');

    // Écouteur d'événement sur le changement de sélection
    selectPieces.addEventListener('change', function() {
        var selectedValue = selectPieces.value;

        // Réinitialiser l'affichage des champs
        document.getElementById('preciser-artisan-piece').style.display = 'none';
        document.getElementById('lien-artisan-piece').style.display = 'none';
        document.getElementById('numero-artisan-piece').style.display = 'none';
        document.getElementById('delivre-artisan-piece').style.display = 'none';
        document.getElementById('le-artisan-piece').style.display = 'none';

        // Afficher les champs correspondants en fonction de la sélection
        if (selectedValue === '5') {
            document.getElementById('preciser-artisan-piece').style.display = 'block';
        } else if (selectedValue === '1' || selectedValue === '2' || selectedValue === '3' || selectedValue ===
            '4') {
            document.getElementById('lien-artisan-piece').style.display = 'block';
            document.getElementById('numero-artisan-piece').style.display = 'block';
            document.getElementById('delivre-artisan-piece').style.display = 'block';
            document.getElementById('le-artisan-piece').style.display = 'block';
        }
    });
</script>
<script>
    // Récupération de l'élément de sélection
    var selectPiece = document.getElementById('type-gerant-piece');

    // Écouteur d'événement sur le changement de sélection
    selectPiece.addEventListener('change', function() {
        var selectedValue = selectPiece.value;

        // Réinitialiser l'affichage des champs
        document.getElementById('preciser-gerant-piece').style.display = 'none';
        document.getElementById('lien-gerant-piece').style.display = 'none';
        document.getElementById('numero-gerant-piece').style.display = 'none';
        document.getElementById('delivre-gerant-piece').style.display = 'none';
        document.getElementById('le-gerant-piece').style.display = 'none';

        // Afficher les champs correspondants en fonction de la sélection
        if (selectedValue === '5') {
            document.getElementById('preciser-gerant-piece').style.display = 'block';
        } else if (selectedValue === '1' || selectedValue === '2' || selectedValue === '3' || selectedValue ===
            '4') {
            document.getElementById('lien-gerant-piece').style.display = 'block';
            document.getElementById('numero-gerant-piece').style.display = 'block';
            document.getElementById('delivre-gerant-piece').style.display = 'block';
            document.getElementById('le-gerant-piece').style.display = 'block';
        }
    });
</script>
<script>
    $(document).ready(function() {
        // Écouteur d'événement pour les cases à cocher
        $('#checkbox-oui').change(function() {
            if ($(this).is(':checked')) {
                // Afficher le formulaire de compagnon
                $('#formulaire-compagnon').slideDown();
            } else {
                // Masquer le formulaire de compagnon
                $('#formulaire-compagnon').slideUp();
            }
        });

        // Assurez-vous de gérer également le cas où la case "Non" pourrait être cochée
        $('#checkbox-non').change(function() {
            if ($(this).is(':checked')) {
                // Masquer le formulaire de compagnon
                $('#formulaire-compagnon').slideUp();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Écouteur d'événement pour les cases à cocher
        $('#apprenti-ok').change(function() {
            if ($(this).is(':checked')) {
                // Afficher le formulaire de apprenti
                $('#formulaire-apprenti').slideDown();
            } else {
                // Masquer le formulaire de apprenti
                $('#formulaire-apprenti').slideUp();
            }
        });

        // Assurez-vous de gérer également le cas où la case "Non" pourrait être cochée
        $('#apprenti-no').change(function() {
            if ($(this).is(':checked')) {
                // Masquer le formulaire de apprenti
                $('#formulaire-apprenti').slideUp();
            }
        });
    });
</script>
<script>
    // Récupération de l'élément de sélection du niveau d'étude
    var selectNiveauEtude = document.getElementById('niveau-etude-artisan');

    // Écouteur d'événement sur le changement de sélection
    selectNiveauEtude.addEventListener('change', function() {
        var selectedValue = selectNiveauEtude.value;

        // Réinitialiser l'affichage des champs
        document.getElementById('div-classe-artisan').style.display = 'none';
        document.getElementById('div-diplome-artisan').style.display = 'none';

        // Afficher les champs correspondants en fonction de la sélection
        if (selectedValue === 'Primaire' || selectedValue === 'Secondaire' || selectedValue === 'Superieur') {
            document.getElementById('div-classe-artisan').style.display = 'block';
            document.getElementById('div-diplome-artisan').style.display = 'block';
        }
    });
</script>
<script>
    $(document).ready(function() {
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
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gestion des compagnons
        const checkboxOuiCompagnons = document.getElementById('checkbox-oui');
        const checkboxNonCompagnons = document.getElementById('checkbox-non');
        const nombreCompagnons = document.getElementById('nombre-compagnons');
        // const nombreCompagnonsHomme = document.getElementById('nombre-compagnons-homme');
        // const nombreCompagnonsFemme = document.getElementById('nombre-compagnons-femme');

        function updateCompagnonsField() {
            if (checkboxOuiCompagnons.checked) {
                nombreCompagnons.classList.remove('hidden');
                // nombreCompagnonsHomme.classList.remove('hidden');
                // nombreCompagnonsFemme.classList.remove('hidden');
            } else {
                nombreCompagnons.classList.add('hidden');
                // nombreCompagnonsHomme.classList.add('hidden');
                // nombreCompagnonsFemme.classList.add('hidden');
            }
        }

        checkboxOuiCompagnons.addEventListener('change', function() {
            if (checkboxOuiCompagnons.checked) {
                checkboxNonCompagnons.checked = false; // Décocher "non" si "oui" est coché
            }
            updateCompagnonsField();
        });

        checkboxNonCompagnons.addEventListener('change', function() {
            if (checkboxNonCompagnons.checked) {
                checkboxOuiCompagnons.checked = false; // Décocher "oui" si "non" est coché
            }
            updateCompagnonsField();
        });

        // Initialement cacher les champs texte pour les compagnons
        updateCompagnonsField();

        // Gestion des apprentis
        const checkboxOkApprentis = document.getElementById('apprenti-ok');
        const checkboxNoApprentis = document.getElementById('apprenti-no');
        const nombreApprentis = document.getElementById('nombre-apprentis');
        // const nombreApprentisHomme = document.getElementById('nombre-apprentis-homme');
        // const nombreApprentisFemme = document.getElementById('nombre-apprentis-femme');

        function updateApprentisField() {
            if (checkboxOkApprentis.checked) {
                nombreApprentis.classList.remove('hidden');
                // nombreApprentisHomme.classList.remove('hidden');
                // nombreApprentisFemme.classList.remove('hidden');
            } else {
                nombreApprentis.classList.add('hidden');
                // nombreApprentisHomme.classList.add('hidden');
                // nombreApprentisFemme.classList.add('hidden');
            }
        }

        checkboxOkApprentis.addEventListener('change', function() {
            if (checkboxOkApprentis.checked) {
                checkboxNoApprentis.checked = false; // Décocher "non" si "oui" est coché
            }
            updateApprentisField();
        });

        checkboxNoApprentis.addEventListener('change', function() {
            if (checkboxNoApprentis.checked) {
                checkboxOkApprentis.checked = false; // Décocher "oui" si "non" est coché
            }
            updateApprentisField();
        });

        // Initialement cacher les champs texte pour les apprentis
        updateApprentisField();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radios = document.querySelectorAll('.exclusive-radio');

        function updateRadioSelection() {
            radios.forEach(radio => {
                if (radio.checked) {
                    // Mettre à jour l'affichage ou faire d'autres actions nécessaires pour le radio sélectionné
                    console.log('Sélectionné:', radio.value);
                }
            });
        }

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                // Désélectionner les autres radios
                radios.forEach(otherRadio => {
                    if (otherRadio !== radio) {
                        otherRadio.checked = false;
                    }
                });

                updateRadioSelection();
            });
        });

        // Assurez-vous d'initialiser l'affichage correctement si un radio est déjà sélectionné par défaut
        updateRadioSelection();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radiosEntreprise = document.querySelectorAll('.exclusive-radio-entreprise');

        function updateRadioEntrepriseSelection() {
            radiosEntreprise.forEach(radio => {
                if (radio.checked) {
                    // Mettre à jour l'affichage ou faire d'autres actions nécessaires pour le radio sélectionné
                    console.log('Sélectionné (entreprise):', radio.value);
                }
            });
        }

        radiosEntreprise.forEach(radio => {
            radio.addEventListener('change', function() {
                // Désélectionner les autres radios d'entreprise
                radiosEntreprise.forEach(otherRadio => {
                    if (otherRadio !== radio) {
                        otherRadio.checked = false;
                    }
                });

                updateRadioEntrepriseSelection();
            });
        });

        // Assurez-vous d'initialiser l'affichage correctement si un radio d'entreprise est déjà sélectionné par défaut
        updateRadioEntrepriseSelection();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectPiece = document.getElementById('type-piece');
        const preciserInput = document.getElementById('preciser-input');
        const autrePreciserDiv = document.getElementById('autre-preciser');
        const numeroPieceDiv = document.getElementById('numero-piece-compagnon');
        const delivreADiv = document.getElementById('delivre-a-compagnon');
        const dateDelivrationDiv = document.getElementById('date-delivration-compagnon');

        selectPiece.addEventListener('change', function() {
            if (selectPiece.value === 'autre') {
                autrePreciserDiv.style.display = 'block';
                numeroPieceDiv.style.display = 'none';
                delivreADiv.style.display = 'none';
                dateDelivrationDiv.style.display = 'none';
            } else if (selectPiece.value === 'CNI' || selectPiece.value === 'CC' || selectPiece
                .value === 'Passeport' || selectPiece.value === 'Carte_de_residence') {
                autrePreciserDiv.style.display = 'none';
                numeroPieceDiv.style.display = 'block';
                delivreADiv.style.display = 'block';
                dateDelivrationDiv.style.display = 'block';
                preciserInput.value = ''; // Effacer le contenu si l'utilisateur change de sélection
            } else {
                autrePreciserDiv.style.display = 'none';
                numeroPieceDiv.style.display = 'none';
                delivreADiv.style.display = 'none';
                dateDelivrationDiv.style.display = 'none';
                preciserInput.value = ''; // Effacer le contenu si l'utilisateur change de sélection
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const apprentissageSelect = document.getElementById('apprentissage-select');
        const preciserNiveauDiv = document.getElementById('preciser-niveau');
        const preciserDiplomeDiv = document.getElementById('preciser-diplome');
        const niveauInput = document.getElementById('niveau-input');
        const diplomeInput = document.getElementById('diplome-input');

        apprentissageSelect.addEventListener('change', function() {
            if (apprentissageSelect.value === 'Ecole') {
                preciserNiveauDiv.style.display = 'block';
                preciserDiplomeDiv.style.display = 'block';
            } else {
                preciserNiveauDiv.style.display = 'none';
                preciserDiplomeDiv.style.display = 'none';
                niveauInput.value = ''; // Effacer le contenu si l'utilisateur change de sélection
                diplomeInput.value = ''; // Effacer le contenu si l'utilisateur change de sélection
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const niveauEtudeSelect = document.getElementById('niveau-etude');
        const preciserClasseDiv = document.getElementById('preciser-classe');
        const diplomeObtenuDiv = document.getElementById('diplome-obtenu');
        const classeInput = document.getElementById('classe-input');
        const diplomeSelect = document.getElementById('diplome-select');

        niveauEtudeSelect.addEventListener('change', function() {
            if (niveauEtudeSelect.value === 'primaire' || niveauEtudeSelect.value === 'secondaire' ||
                niveauEtudeSelect.value === 'Superieur') {
                preciserClasseDiv.style.display = 'block';
                diplomeObtenuDiv.style.display = 'block';
            } else {
                preciserClasseDiv.style.display = 'none';
                diplomeObtenuDiv.style.display = 'none';
                classeInput.value = ''; // Effacer le contenu si l'utilisateur change de sélection
                diplomeSelect.selectedIndex = 0; // Réinitialiser la sélection du diplôme obtenu
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typePiecesSelect = document.getElementById('type-pieces');
        const divPreciser = document.getElementById('div-preciser');
        const divNumeroDelivre = document.getElementById('div-numero-delivre');
        const divDelivreA = document.getElementById('div-delivre-a');
        const divDateDelivrance = document.getElementById('div-date-delivrance');

        typePiecesSelect.addEventListener('change', function() {
            // Réinitialisation des affichages à chaque changement de sélection
            divPreciser.style.display = 'none';
            divNumeroDelivre.style.display = 'none';
            divDelivreA.style.display = 'none';
            divDateDelivrance.style.display = 'none';

            // Affichage des champs en fonction de la sélection
            switch (typePiecesSelect.value) {
                case 'CNI':
                case 'CC':
                case 'Passeport':
                    divNumeroDelivre.style.display = 'block';
                    divDelivreA.style.display = 'block';
                    divDateDelivrance.style.display = 'block';
                    break;
                case 'autre':
                    divPreciser.style.display = 'block';
                    break;
                default:
                    break;
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const etudeNiveauSelect = document.getElementById('etude-niveau-apprenti');
        const divPreciserClasse = document.getElementById('div-preciser-classe-apprenti');
        const divPreciserDiplome = document.getElementById('div-preciser-diplome-apprenti');

        etudeNiveauSelect.addEventListener('change', function() {
            // Réinitialisation des affichages à chaque changement de sélection
            divPreciserClasse.style.display = 'none';
            divPreciserDiplome.style.display = 'none';

            // Affichage des champs en fonction de la sélection
            switch (etudeNiveauSelect.value) {
                case 'Primaire':
                case 'Secondaire':
                case 'Supérieur':
                    divPreciserClasse.style.display = 'block';
                    divPreciserDiplome.style.display = 'block';
                    break;
                default:
                    break;
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#checkbox-artisan-ok').change(function() {
            if ($(this).is(':checked')) {
                $('#div-diplome_cnmci').show();
                $('#checkbox-artisan-no').prop('checked', false);
            } else {
                $('#div-diplome_cnmci').hide();
            }
        });

        $('#checkbox-artisan-no').change(function() {
            if ($(this).is(':checked')) {
                $('#div-diplome_cnmci').hide();
                $('#checkbox-artisan-ok').prop('checked', false);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#checkbox-gerant_ok').change(function() {
            if ($(this).is(':checked')) {
                $('#div-diplome_cnmci_gerant').show();
                $('#checkbox-gerant_non').prop('checked', false);
            } else {
                $('#div-diplome_cnmci_gerant').hide();
            }
        });

        $('#checkbox-gerant_non').change(function() {
            if ($(this).is(':checked')) {
                $('#div-diplome_cnmci_gerant').hide();
                $('#checkbox-gerant_ok').prop('checked', false);
            }
        });

        // Initialisation de Select2
        $('.select2').select2();
    });
</script>



