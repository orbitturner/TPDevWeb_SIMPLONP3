    <!-- STARTING : MAIN CONTENT -->
    <div class="main_content" id="pageCreateAccount">
      <!-- onload="initFormAccountSetup();" -->
      <div class="header">
        <div class="next_nav">
          <!-- MENU HAUT - PARTIE GAUCHE -->
          <div class="display_header">
            <h4>BANQUE DU PEUPLE 
            <?php
                  if (isset($_GET['formState']) && !(empty($_GET['formState'])) ) {
                    if ($_GET['formState'] == 'error') {
                        echo '<span class="breadcrumb" id="breadcrumbInfo" style="color: #dc143c;">>> ERREUR : COMPTE PRECEDENT NON INSERE !</span>';
                      }else {
                        echo '<span class="breadcrumb" id="breadcrumbInfo" style="color: #00FF00;">>> INFO : COMPTE CREE AVEC SUCCES !</span>';
                      }
                    }else {
                      echo '<span class="breadcrumb" id="breadcrumbInfo" style="color: #29c2d6;">>> Creation Compte </span>';
                  }
              ?>
            </h4>
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
        <!-- TODO : Design & Controls -->
        <!-- STARTING : COMPTE BLOCK -->
        <!-- 🔐COMPTE BANCAIRE DU CLIENT💰 -->
        <div class="block-title p-b-30">
          <h1>Informations du Compte</h1>
          <hr />
        </div>
        <form method="POST" action="" id="addAccountForm">
          <div class="form-row">
            <div class="name">Type & Owner</div>
            <div class="value">
              <div class="row row-refine">
                <div class="col-3">
                  <div class="input-group">
                    <div class="rs-select2 js-select-simple select--no-search orbit-select">
                      <select id="selectTypeCompte" name="typeAccount">
                        <option disabled="disabled" value="0" selected="selected">CHOISISSEZ UN TYPE DE COMPTE</option>
                        <option value="cesp">Compte épargne simple et xeewel</option>
                        <option value="cc">Compte courant pour les salariés</option>
                        <option value="cb">Compte bloqué </option>
                      </select>
                      <div class="select-dropdown"></div>
                    </div>
                  </div>
                </div>
                <div class="col-9">
                <div class="input-group">
                    <div class="rs-select2 js-select-simple select--no-search orbit-select">
                      <select id="selectOwnerCompte" name="ownerCompte">
                        <option disabled="disabled" value="0" selected="selected">CHOISISSEZ LE CLIENT</option>
                        <option value="1">Client 1 Will be Generated After</option>
                        <option value="2">Client 2 Will be Generated After</option>
                      </select>
                      <div class="select-dropdown"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- STARTING : INFOS COMPTE FOR ALL TYPES -->
          <div class="form-row m-b-55" id="infosCompte">
            <div class="name">INFOS COMPTE</div>
            <div class="value">
              <div class="row row-refine">
                <div class="col-3">
                  <div class="input-group-desc">
                    <input class="input--style-5" type="number" name="cleRIB" min="01" max="98">
                    <label class="label--desc">Cle RIB</label>
                  </div>
                </div>
                <div class="col-9">
                  <div class="input-group-desc">
                    <input class="input--style-5" type="number" name="soldeAccount" min="2000" max="100000000" step="0.0001">
                    <label class="label--desc">SOLDE</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- // FRAIS D'OUVERTURE DE COMPTE & NUMERO DE COMPTE -->
          <div class="form-row" id="accountFeeAndNumbBlock">
            <div class="name">Identification Compte</div>
            <div class="value">
              <div class="row row-refine">
                <div class="col-9">
                  <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="accountNumber" value="CSB-856-DK-655" readonly>
                    <label class="label--desc">Numéro du Compte</label>
                  </div>
                </div>
                <div class="col-3">
                  <div class="input-group-desc">
                    <input class="input--style-5" type="number" name="accountCreationFee" value="5200.00" readonly>
                    <label class="label--desc">Frais d'Ouverture</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- STARTING : INFOS COMPTE FOR XEEWEL SIMPLE -->
          <!-- IMPLEMENT IT -->
          <div class="form-row" id="remunBlock">
            <div class="name">Prochaine Rémunération</div>
            <div class="value">
              <div class="input-group">
                <input class="input--style-5" type="date" name="nextRemunDate" value="2020-12-12" readonly>
              </div>
            </div>
          </div>
          <!-- STARTING :  INFOS COMPTE FOR COURANT -->
          <!-- // PENDING -->
          <div class="form-row" id="agiosBlock">
            <div class="name">AGIOS</div>
            <div class="value">
              <div class="input-group">
                <input class="input--style-5" type="number" name="agios" value="8700.00" readonly>
              </div>
            </div>
          </div>
          <!-- STARTING : INFOS COMPTE BLOQUE -->
          <div class="form-row" id="dateEcheanceBlock">
            <div class="name">Date d'Echeance</div>
            <div class="value">
              <div class="row row-refine">
                <div class="col-3">
                  <div class="input-group-desc">
                    <input class="input--style-5" type="number" name="accountCreationFee" value="5200.00" readonly>
                    <label class="label--desc">Délai de Blocage</label>
                  </div>
                </div>
                <div class="col-9">
                  <div class="input-group-desc">
                    <input class="input--style-5" type="date" name="echeanceDateCptB" value="2005-10-10" readonly>
                    <label class="label--desc">Date d'Echéance</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="FormAddAccountVALIDATOR" value="true">
          <!-- ENDING : BLOCK COMPTE -->
          <div class="btn--centered" id="submitAccountForm" name="submitAccountForm">
            <!-- <button class="btn btn--radius-2 btn--blue" type="submit">Register</button> -->
          </div>
        </form>
      </div>
      <!-- FIN CONTENU CENTRAL -->
    </div>
    <!-- ENDING MAIN CONTENT -->

    <!-- <script src="public/js/addAccountForm.js"></script> -->