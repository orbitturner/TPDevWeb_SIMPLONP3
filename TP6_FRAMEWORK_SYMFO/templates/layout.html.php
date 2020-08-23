<!-- /*
+======================={PROJECT - PRESENTATION}======================+
|                                                                     |
|Project Name    : TP4 PHP_BP SIMPLON                                 |
|service         : Semi-Static  Website                               |
|FrameWorks      : NONE                                               |
|Author          : OrbitTurner                                        |
|Official Name   : Mohamed GUEYE                                      |
|Version         : v.0.Null                                           |
|Created         : 28-Jun-2020                                        |
|Last update     : 28-Jun-2020                                        |
|Partie          : MAIN CSS                                           | 
|LANGAGE UTILISE : ANGLAIS - FRANCAIS                                 |
+=====================================================================+
*/ -->

<html lang="en">
<!-- /* === WELCOME TO ORBIT NEXT FRAMEWORK  ===
 *                     
 *	  By :
 *
 *     ██████╗ ██████╗ ██████╗ ██╗████████╗    ████████╗██╗   ██╗██████╗ ███╗   ██╗███████╗██████╗ 
 *    ██╔═══██╗██╔══██╗██╔══██╗██║╚══██╔══╝    ╚══██╔══╝██║   ██║██╔══██╗████╗  ██║██╔════╝██╔══██╗
 *    ██║   ██║██████╔╝██████╔╝██║   ██║          ██║   ██║   ██║██████╔╝██╔██╗ ██║█████╗  ██████╔╝
 *    ██║   ██║██╔══██╗██╔══██╗██║   ██║          ██║   ██║   ██║██╔══██╗██║╚██╗██║██╔══╝  ██╔══██╗
 *    ╚██████╔╝██║  ██║██████╔╝██║   ██║          ██║   ╚██████╔╝██║  ██║██║ ╚████║███████╗██║  ██║
 *     ╚═════╝ ╚═╝  ╚═╝╚═════╝ ╚═╝   ╚═╝          ╚═╝    ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═══╝╚══════╝╚═╝  ╚═╝
 */ -->

<head>
  <meta charset="UTF-8"/>
  <title>BDP | <?=$pageTitle;?></title>
  <link rel="stylesheet" href="public/css/main.css"/>
  <!-- <link rel="icon" type="image/svg+xml" href="favicon.svg"> -->
    <link rel="alternate icon" href="favicon.ico">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
  <!-- STARTING : CONTAINER GENERAL -->
  <div class="wrapper">
    <!-- STARTING : SIDEBAR -->
    <div class="sidebar">
      <h2><img class="sidebar_logo" src="public/img/BP-LOGO-SVG-WHITE.svg" alt="LOGO BANQUE DU PEUPLE" title="Vous d'Abord"/></h2>
      <ul>
        <li class="<?php if($viewPath == 'home') echo 'active'?>"><a href="welcome"><i class="fas fa-home"></i>Accueil</a></li>
        <li class="<?php if($viewPath == 'createClient') echo 'active'?>"><a href="client"><i class="fas fa-user-tie"></i>Creer un Client</a></li>
        <li class="<?php if($viewPath == 'createAccount') echo 'active'?>"><a href="compte"><i class="fas fa-address-card"></i>Creer un Compte</a></li>
        <li class="<?php if($viewPath == 'newVirement') echo 'active'?>"><a href="javascript:return false;" onclick="alert('<h1>COMMING SOON</h1>');"><i class="fas fa-exchange-alt"></i>Faire un Virement</a></li>
      </ul>
      <div class="extra_option">
        <a href="javascript:return false;" title="Changer de Langue"><i class="fas fa-language"></i></a>
        <a href="javascript:return false;" title="Afficher Aide"><i class="fas fa-question-circle"></i></a>
        <a href="javascript:return false;" title="Se Déconnecter"><i class="fas fa-power-off"></i></a>
      </div>
    </div>
    <!-- ENDING : SIDEBAR -->

    <?= $pageContent?>

    </div>
  <!-- ENDING CONTAINER GENERAL -->
      <?php
        // var_dump($viewPath);
        if ($viewPath == 'createClient') {
          // echo '<script> alert("CLIENT")</script>';
          echo '<script src="public/js/addClientForm.js"></script>';
          
        }elseif ($viewPath == 'createAccount') {
          echo '<script src="public/js/addAccountForm.js"></script>';
          // echo '<script> alert("COMPTE")</script>';
        }
      ?>
    <!-- Main JS -->
    <script src="public/js/global.js"></script>
    
</body>

</html>
