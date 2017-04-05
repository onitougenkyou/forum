<?php

/**
 * Function et variables pour page.php et descendance
 */

  include 'model/Joueur.php';

  /**
  * Necessite à la place de joueur le user ayant pour donnée ce que l'utilisateur possède sur son compte
  * A savoir nom, pseudo, mail ( un joueur n'as pas besoin de plus)
  *
  * Liste des tableaux de joueur que contiendra chaque JDR
  * CONDITION : un tableau ne peux contenir plus de 8 éléments
  */

  $tableauJoueursZcorps = array();
  $tableauJoueursSuperCops = array();
  $tableauJoueursDonjonEtDragon = array();
  $tableauJoueursHollowEarthExpedition = array();

  /**
  * Function permettant de lister les joueur d'un tableau quelconque
  */

  function listeDesJoueurs($tableauJoueurs)
  {
    for ($i=0; $i < count($tableauJoueurs) ; $i++) {
      echo $tableauJoueurs[$i]->joueur_pseudo . "<br>" ;
    }
  }

  /**
  * Ajout de joueur à un tableau
  */


  function ajoutDeJoueur($Joueur, $tableauJoueurs)
  {
    array_push($tableauJoueurs ,$Joueur);
  }

  /**
  * Supprimer un joueur d'un tableau et ranger par la suite ce même tableau
  */

  function supprimerJoueur($Joueur, $tableauJoueurs)
  {
    unset($tableauJoueurs[array_search($Joueur, $tableauJoueurs)]);
    array_merge($tableauJoueurs);
  }

?>
