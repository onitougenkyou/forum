<?php
require_once('tools/Debug.php');
require_once('tools/Config.php');
require_once('tools/Request.php');			// Traitement des Get/Post

// Tools
require_once('tools/Form.php');			// Permet de générer des formulaires HTML
require_once('tools/GestionErreur.php');	// Gestion des erreurs dans PDO (affichage)
include_once 'login/verif.php';
if(!$user->is_loggedin())
{
  $user->redirect('login.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
  <link rel="stylesheet" href="style.css" type="text/css"  />




  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css"  /> -->

  <title>Bienvenue - <?php print($user->data['user_email']); ?></title>

</head>

<body>
  <?php include ('view/site/header.php'); ?>
  <div class="block-body">
    <div class="container">
      <?php
      switch(Request::getInstance()->get('page'))
      {
        case Config::getInstance()->get('accueil')		:	require_once('page/accueil.php');	break;
        case Config::getInstance()->get('forums')		:	require_once('page/forums.php');	break;
        default										:	require_once('page/accueil.php');	break;
      }
      ?>
    </div>
  </body>


  </html>
