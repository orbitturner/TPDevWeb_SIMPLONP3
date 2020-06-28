        <!-- STARTING : MAIN CONTENT -->
        <div class="main_content" >
            <div class="header">
                <div class="next_nav">
                    <!-- MENU HAUT - PARTIE GAUCHE -->
                    <div class="display_header">
                        <h4>BANQUE DU PEUPLE <span class="breadcrumb">>> Creation CLient</span></h4>
                    </div>
                    <!-- MENU HAUT - PARTIE DROITE -->
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-clock" aria-hidden="true"></i> <span class="">Time / Date</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-comments" aria-hidden="true"></i> <span class="">Support</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="">
                                <i class="fas fa-user" aria-hidden="true"></i> <span class="">Account</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- // CONTENU CENTRAL :  -->
            <div class="info">
                <!-- <h1>Formulaire Client</h1> -->
                <!-- 👨🏾‍💼CLIENT INFOS💼 -->
                <div class="block-title p-b-30">
                    <h1>Informations du Client</h1>
                    <hr />
                </div>
                <form method="POST" action="<?=getProjectPath()?>controller/addClientController.php" id="addClientForm" name="addClientForm">
                    <!-- // BUG -->
                    <!-- STARTING : FORM CHOOSER -->
                    <div class="form-row p-t-10 choices" id="formChooser">
                        <label class="label label--block">QUEL TYPE DE CLIENT VOULEZ-VOUS CREER ?</label>
                        <div class="p-t-15">
                            <label class="radio-container m-r-55">CLIENT PHYSIQUE
                                <input type="radio" checked="checked" name="formChooser" value="physique">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio-container">CLIENT MORAL
                                <input type="radio" name="formChooser" value="moral">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <!-- STARTING : CLIENT FORM  -->
                    <div id="clientForm">
                        <div class="form-row m-b-55">
                            <div class="name">Nom du Client</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="prenomClient" type="text"
                                                name="prenomClient" required>
                                            <label class="label--desc">Prenom</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="nomClient" type="text" name="nomClient"
                                                required>
                                            <label class="label--desc">Nom de Famille</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Autre Infos</div>
                            <div class="value">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="cniClient" type="text" name="cniClient"
                                                required>
                                            <label class="label--desc">CNI</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="telClient" type="tel" name="telClient"
                                                required>
                                            <label class="label--desc">Numero de Téléphone</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="adresseClient" type="text"
                                                name="adresseClient" required>
                                            <label class="label--desc">Adresse</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5 prefilled" value="BP-CL-DK-2552"
                                                id="numeroIdClient" type="text" name="numeroIdClient" disabled required>
                                            <label class="label--desc">Numero d'Identification Client</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row p-t-20 choices">
                            <label class="label label--block">statut professionnel</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Salarié
                                    <input type="radio" name="statutPro" value="isWorking" required>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Non Salarié
                                    <input type="radio" checked="checked" id="statutPro" name="statutPro"
                                        value="notWorking" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <!-- STARTING : INFO PROFESSIONNES -->
                        <div class="form-row" id="infoPro">
                            <div class="name">Infos professionnel</div>
                            <div class="value">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="salaireClient" type="text"
                                                name="salaireClient">
                                            <label class="label--desc">Salaire Actuel</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="profession" type="tel" name="profession">
                                            <label class="label--desc">Profession</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- STARTING : INFOS EMPLOYEUR -->
                        <div class="form-row" id="infoEmployeur">
                            <div class="name" style="padding-right: 8px;">Infos Employeur</div>
                            <div class="value" style="display: flex;">
                                <div class="input-group" style="width: 90% !important;">
                                    <div class="rs-select2 js-select-simple select--no-search orbit-select">
                                        <select name="employeur">
                                            <option disabled="disabled" selected="selected">CHOISISSEZ UN EMPLOYEUR
                                            </option>
                                            <option>SIMPLON.CO</option>
                                            <option>AUF - DAKAR</option>
                                            <option>Next Cyber Vision</option>
                                            <option>Orbit Law Tech</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                                <i class="fa fa-plus-circle optionIcon" id="addEmpBtn" title="AJOUTER UN EMPLOYEUR"
                                    aria-hidden="true"></i>
                            </div>
                        </div>
                        <!-- STARTING : CREATE EMPLOYEUR -->
                        <div class="form-row m-b-90" id="creerEmployeur">
                            <div class="name">Créer Employeur</div>
                            <div class="value">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="nomEmployeur" type="tel"
                                                name="nomEmployeur">
                                            <label class="label--desc">Nom Employeur</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="raisonSocial" type="text"
                                                name="raisonSocial">
                                            <label class="label--desc">Raison Social</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="adresseEmployeur" type="tel"
                                                name="adresseEmployeur">
                                            <label class="label--desc">Adresse de l'Employeur</label>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" id="numIdentEmp" type="tel"
                                                name="numIdentEmp">
                                            <label class="label--desc">Numero d'Identification</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn--pill btn--green m-t-55" id="submitNewEmployeur">Ajouter</button>
                        </div>
                    </div>
                    <!-- ENDING : FORM CLIENT -->
                    <div class="btn--centered" id="submitCreateClient" name="submitCreateClient">
                        <button class="btn btn--radius-2 btn--blue" type="submit">Register</button>
                    </div>
                </form>
            </div>
            <!-- FIN CONTENU CENTRAL -->
        </div>
        <!-- ENDING MAIN CONTENT -->
    <!-- <script src="public/js/addClientForm.js"></script> -->
