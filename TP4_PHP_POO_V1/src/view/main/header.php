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
<?php 
    require_once '../routes/dir.php';
    // var_dump($_GET);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"/>
  <title>TEST | BANQUE DU PEUPLE | IN SYSTEM</title>
  <link rel="stylesheet" href="public/css/main.css"/>
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
        <li class="<?php if($_GET['page'] == 'accueil') echo 'active'?>"><a href="home"><i class="fas fa-home"></i>Accueil</a></li>
        <li class="<?php if($_GET['page'] == 'newClient') echo 'active'?>"><a href="newclient"><i class="fas fa-user-tie"></i>Creer un Client</a></li>
        <li class="<?php if($_GET['page'] == 'newAccount') echo 'active'?>"><a href="newaccount"><i class="fas fa-address-card"></i>Creer un Compte</a></li>
        <li class="<?php if($_GET['page'] == 'newVirement') echo 'active'?>"><a href="javascript:return false;" onclick="alert('<h1>COMMING SOON</h1>');"><i class="fas fa-exchange-alt"></i>Faire un Virement</a></li>
      </ul>
      <div class="extra_option">
        <a href="javascript:return false;" title="Changer de Langue"><i class="fas fa-language"></i></a>
        <a href="javascript:return false;" title="Afficher Aide"><i class="fas fa-question-circle"></i></a>
        <a href="javascript:return false;" title="Se Déconnecter"><i class="fas fa-power-off"></i></a>
      </div>
    </div>
    <!-- ENDING : SIDEBAR -->
