{{-- inscription compagnon si il existe --}}
<div class="col-12 mt-3 mb-3" id="formulaire-compagnon" style="display: none;">
    <h6 class="card-title text-center mb-2 bold">Formulaire d'inscription Compagnons</h6>
    <div class="card">
        <div class="step-app h-wizard-demo3">
            <ul class="step-steps">
                <li data-step-target="step1"><span class="fa fa-user"></span> Information
                    Personnelle</li>
                <li data-step-target="step2"><span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                            <path
                                d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917zM8 8.46 1.758 5.965 8 3.052l6.242 2.913z" />
                            <path
                                d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46z" />
                        </svg></span> Renseignement sur la
                    formation professionnelle du compagnon
                </li>

            </ul>
            <div class="step-content">
                <div class="step-tab-panel" data-step="step1">
                    <form class="row g-3">
                        <div class="col-md-12 col-sm-8">
                            <div class="image-input avatar xl rounded-4"
                                style="background-image: url({{ asset('assets/home/img/avatar.png') }})">
                                <div class="avatar-wrapper rounded-4"
                                    style="background-image: url({{ asset('assets/home/img/profile_av.png') }})">
                                </div>
                                <div class="file-input">
                                    <input type="file" class="form-control"
                                        name="file-input-compagnon" id="file-input-compagnon">
                                    <label for="file-input"
                                        class="fa fa-pencil shadow text-muted"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Nom & Prénoms</label>
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Nom et Prénoms ">
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Date de naissance</label>
                            <input type="date" class="form-control form-control-lg"
                                placeholder="date de naissance">
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Lieu de naissance</label>
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Lieu de naissance">
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Nationalité</label>
                            <input type="text" class="form-control form-control-lg"
                                placeholder="nationalite">
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Genre</label>
                            <select class="country form-control form-control-lg form-select"
                                aria-label="example">
                                <option selected>-- Selectionner votre genre --</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Etat Civil</label>
                            <select class="country form-control form-control-lg form-select"
                                aria-label="example">
                                <option selected>-- Selectionner votre Statut --</option>
                                <option value="marie">Marié(e)</option>
                                <option value="Célibataire">Célibataire</option>
                                <option value="Divorce">Divorce</option>
                                <option value="Veuf(ve)">Veuf(ve)</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Téléphone</label>
                            <fieldset class="form-icon-group left-icon position-relative">
                                <input type="tel"
                                    class="form-control form-control-lg phone-number"
                                    placeholder="Ex: (000) 00-000-000-00">
                                <div class="form-icon position-absolute">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-phone"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">Type de pièce</label>
                            <select class="country form-control form-control-lg form-select"
                                id="type-piece" aria-label="example">
                                <option selected>-- Sélectionner votre Pièce --</option>
                                <option value="CNI">CNI</option>
                                <option value="CC">CC</option>
                                <option value="Passeport">Passeport</option>
                                <option value="Carte_de_residence">Carte de résidence</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                        <div class="col-sm-3" id="autre-preciser" style="display: none;">
                            <label class="form-label">Préciser</label>
                            <input type="text" class="form-control form-control-lg"
                                id="preciser-input" placeholder="Préciser">
                        </div>
                        <div class="col-sm-3"id="numero-piece-compagnon" style="display: none;">
                            <label class="form-label">Numero </label>
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Numero de piece">
                        </div>
                        <div class="col-sm-3" id="delivre-a-compagnon" style="display: none;">
                            <label class="form-label">Delivré à </label>
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Delivré à">
                        </div>
                        <div class="col-sm-3" id="date-delivration-compagnon"
                            style="display: none;">
                            <label class="form-label">le </label>
                            <input type="date" class="form-control form-control-lg"
                                placeholder="date de delivration">
                        </div>
                        <div class="col-sm-5">
                            <label class="form-label">Activité principale exercée au sein de
                                l'entreprise </label>
                            <input type="text" class="form-control form-control-lg"
                                placeholder="activite exercée dans l'entreprise">
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">date de debut de compagnonnage </label>
                            <input type="date" class="form-control form-control-lg"
                                placeholder="date debut compagnonnage">
                        </div>
                        <div class="col-sm-4">
                            <label class="form-label">date debut de compagnonnage au sein de
                                l'entreprise </label>
                            <input type="date" class="form-control form-control-lg"
                                placeholder="date debut compagnonnage">
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">N° CNPS</label>
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Numero CNPS">
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg"
                                placeholder="compagnon@gmail.com">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-label">Domicile</label>
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Domicile">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <label class="form-label">Quartier</label>
                            <input type="text" class="form-control form-control-lg"
                                placeholder="Quartier">
                        </div>
                    </form> <!-- .row end -->
                </div>

                <div class="step-tab-panel" data-step="step2">
                    <form class="row g-3">
                        <div class="col-4">
                            <label class="form-label">Niveau d'étude</label>
                            <select class="country form-control form-control-lg form-select"
                                id="niveau-etude" aria-label="example">
                                <option selected>-- Sélectionner votre niveau d'étude ---</option>
                                <option value="Non_scolariseé">Non scolarisé</option>
                                <option value="primaire">Primaire</option>
                                <option value="secondaire">Secondaire</option>
                                <option value="Superieur">Supérieur</option>
                            </select>
                        </div>
                        <div class="col-4" id="preciser-classe" style="display: none;">
                            <label class="form-label">Préciser la classe</label>
                            <input type="text" class="form-control form-control-lg"
                                id="classe-input" placeholder="Préciser la classe">
                        </div>
                        <div class="col-4" id="diplome-obtenu" style="display: none;">
                            <label class="form-label">Diplôme Obtenu</label>
                            <select class="country form-control form-control-lg form-select"
                                id="diplome-select" aria-label="example">
                                <option selected>--- Sélectionner votre dernier Diplôme ---</option>
                                <option value="Doctorat">Doctorat</option>
                                <option value="BAC">BAC</option>
                                <option value="BEPC">BEPC</option>
                                <option value="CEPE">CEPE</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Apprentissage du métier</label>
                            <select class="country form-control form-control-lg form-select"
                                id="apprentissage-select" aria-label="example">
                                <option selected>--- Sélectionner ---</option>
                                <option value="Sur_le_tas">Sur le tas</option>
                                <option value="Ecole">Centre de Formation Professionnelle (CFP)
                                </option>
                            </select>
                        </div>
                        <div class="col-4" id="preciser-niveau" style="display: none;">
                            <label class="form-label">Préciser le niveau</label>
                            <input type="text" class="form-control form-control-lg"
                                id="niveau-input" placeholder="Préciser le niveau">
                        </div>
                        <div class="col-4" id="preciser-diplome" style="display: none;">
                            <label class="form-label">Préciser le diplôme obtenu</label>
                            <input type="text" class="form-control form-control-lg"
                                id="diplome-input" placeholder="Préciser le diplôme">
                        </div>
                    </form> <!-- .row end -->
                </div>

            </div>
            <div class="step-footer d-flex">
                <button class="btn step-btn" data-step-action="prev">Précédent</button>
                <button class="btn step-btn" data-step-action="next">Suivant</button>
                <button class="btn step-btn" data-step-action="finish">Termine</button>
            </div>
        </div>
    </div>
</div>

{{-- inscription apprentir si il existe --}}
<div class="col-12 mt-3 mb-3" id="formulaire-apprenti" style="display: none;">
    <h6 class="card-title text-center mb-2">Formulaire d'inscription Apprentir</h6>
    <div class="card">
        <div class="card-body step-app h-wizard-demo4">
            <ul class="step-steps">
                <li data-step-target="step1"><span class="fa fa-credit-card"></span> Information
                    sur l'apprenti</li>
                <li data-step-target="step2"><span class="fa fa-user"></span> Information sur le
                    maitre artisan </li>
            </ul>
            <div class="step-content">
                <div class="step-tab-panel" data-step="step1">
                    <form class="row g-2">
                        <div class="col-md-12 col-sm-8">
                            <div class="image-input avatar xxl rounded-4"
                                style="background-image: url({{ asset('assets/home/img/avatar.png') }})">
                                <div class="avatar-wrapper rounded-4"
                                    style="background-image: url({{ asset('assets/home/img/profile_av.png') }})">
                                </div>
                                <div class="file-input">
                                    <input type="file" class="form-control" name="file-input"
                                        id="file-input">
                                    <label for="file-input"
                                        class="fa fa-pencil shadow text-muted"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="nom">
                                <label>Nom </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Prenoms">
                                <label>Prénoms</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>-- Selectionner genre -- </option>
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                </select>
                                <label>Selectionner genre</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-floating">
                                <input type="date" class="form-control"
                                    placeholder="date de naissance">
                                <label>Date de naissance</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Lieu de naissance">
                                <label>Lieu de naissance</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Nationalité">
                                <label>Nationalité</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-floating">
                                <select class="form-select" id="type-pieces"
                                    aria-label="Floating label select example">
                                    <option selected>-- Sélectionner Pièce --</option>
                                    <option value="CNI">CNI</option>
                                    <option value="CC">CC</option>
                                    <option value="Passeport">Passeport</option>
                                    <option value="autre">Autre</option>
                                </select>
                                <label for="type-pieces">Type de Pièces</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12" id="div-preciser" style="display: none;">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Préciser">
                                <label>Préciser</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12" id="div-numero-delivre"
                            style="display: none;">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Numéro de la pièce">
                                <label>Numéro de la pièce</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-12" id="div-delivre-a" style="display: none;">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Délivré à">
                                <label>Délivré à</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-12" id="div-date-delivrance"
                            style="display: none;">
                            <div class="form-floating">
                                <input type="date" class="form-control"
                                    placeholder="Date de délivrance">
                                <label>Date de délivrance</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-floating">
                                <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="tel"
                                        class="form-control form-control-lg phone-number"
                                        placeholder="Ex: (000) 00-000-000-00">
                                    <div class="form-icon position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor"
                                            class="bi bi-phone" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                        </svg>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Email">
                                <label>Email </label>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-floating">
                                <select class="form-select" id="etude-niveau-apprenti"
                                    aria-label="Floating label select example">
                                    <option selected>-- Sélectionner Niveau d'Etude --</option>
                                    <option>Non Scolarisé</option>
                                    <option>Primaire</option>
                                    <option>Secondaire</option>
                                    <option>Supérieur</option>
                                </select>
                                <label for="etude-niveau">Niveau d'Etude</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12" id="div-preciser-classe-apprenti"
                            style="display: none;">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Précisez la classe (2-3-4)">
                                <label>Précisez la classe (2-3-4)</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12" id="div-preciser-diplome-apprenti"
                            style="display: none;">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Précisez le Diplôme obtenu">
                                <label>Précisez le Diplôme obtenu</label>
                            </div>
                        </div>
                    </form>
                    <!-- .fin information sur l'apprenti -->
                </div>
                <div class="step-tab-panel" data-step="step2">
                    <form class="row g-2">
                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Numero d'identification">
                                <label>Numero d'identification</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="N° d'immatriculation au registre des métiers">
                                <label>N° d'immatriculation au registre des métiers</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Nom">
                                <label>Nom</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Prénoms">
                                <label>Prénoms</label>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>-- Selectionner Genre --</option>
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                </select>
                                <label>Genre</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Selectionner Pieces</option>
                                    <option value="CNI">CNI</option>
                                    <option value="CC">CC</option>
                                    <option value="Passeport">Passeport</option>
                                    <option value="Carte de residence">Carte de residence</option>
                                    <option value="Autre">Autre</option>
                                </select>
                                <label>Type de Piece</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Numero">
                                <label>N°</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Delivre à">
                                <label>Delivre à</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-floating">
                                <input type="date" class="form-control">
                                <label>Le</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Preciser">
                                <label>Preciser</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-floating">
                                <fieldset class="form-icon-group left-icon position-relative">
                                    <input type="tel"
                                        class="form-control form-control-lg phone-number"
                                        placeholder="Ex: (000) 00-000-000-00">
                                    <div class="form-icon position-absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor"
                                            class="bi bi-phone" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                        </svg>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" placeholder="Email">
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Activite exercé">
                                <label>Activite exercé</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    placeholder="Nombre d'apprentir">
                                <label>Nombre d'apprentir</label>
                            </div>
                        </div>
                    </form> <!-- .row end -->
                </div>

            </div>
            <div class="step-footer d-flex">
                <button class="btn step-btn" data-step-action="prev">Précédent</button>
                <button class="btn step-btn" data-step-action="next">Suivant</button>
                <button class="btn step-btn" data-step-action="finish">Terminer</button>
            </div>
        </div>
    </div>
</div>
