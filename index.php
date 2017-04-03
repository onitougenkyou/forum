<?php
ini_set('display_errors', 1);
require_once('tools/Debug.php');
require_once('tools/Config.php');
require_once('tools/Request.php');			// Traitement des Get/Post

// Tools
require_once('tools/Form.php');			// Permet de générer des formulaires HTML
require_once('tools/GestionErreur.php');	// Gestion des erreurs dans PDO (affichage)
include_once ('login/verif.php');
include ('view/site/header.php');

?>

  <div class="block-body">
    <div class="container">
      <?php
      switch(Request::getInstance()->get('page'))
      {
        case Config::getInstance()->get('accueil')		:	require_once('page/accueil.php');	break;
        case Config::getInstance()->get('forums')		:	require_once('page/forums.php');	break;
        case Config::getInstance()->get('profil') :require_once('page/profil_vu.php'); break;
        case Config::getInstance()->get('profilSetting') :require_once('profil.user/change_infos_user.php'); break;
        case Config::getInstance()->get('jdr') :require_once('page/partie.php'); break;
        default										:	require_once('page/accueil.php');	break;
      }
      ?>
    </div>
