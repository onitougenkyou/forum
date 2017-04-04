<?php

/**
 * Function et variables pour page.php et descendance
 */
  include_once 'model/Personage.php';

//
  if (isset($_POST["ajoutOK"]) && $user->checkDroit(1)) {
    $ajout=$_POST["ajoutOK"];
    $character = new Personage();
    $character->setName($ajout);
    $character->setUserId($user['user_id']);
    $character->update();
    var_dump($character);
  }

  if (isset($_POST["supprimerOK"]) && $user->checkDroit(1)) {
    $delete=$_POST["supprimerOK"];
    $character = Personage::getOne(array('name' => $delete)); //('name' => $delete, 'partyId' => 0)
    $character->delete();
  }



?>
