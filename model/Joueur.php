<?php
/**
 * Classe fictive en attendant d'avoir une autentification Viable
 */
class Joueur
{
  /**
  * Déclaration de variables de la classe
  */

  public $joueurId;
  public $joueurPseudo;
  public $joueurEmail;
  public $joueurAvatar;
  public $joueurRang;

  /**
  * CONSTRUCTEUR
  */

  function __construct()
  {
    $this->joueurId = 4;
    $this->joueurPseudo = "random";
    $this->joueurEmail = "ramdom@lambda.com";
    $this->joueurAvatar = "";
    $this->joueurRang = "";
  }
  /* function __construct($joueur_id, $joueur_pseudo, $joueur_mdp, $joueur_email,
                        $joueur_avatar, $joueur_signature, $joueur_localisation,
                        $joueur_inscrit, $joueur_derniere_visite, $joueur_rang,
                        $joueur_post)
  {
    $joueur_id = $joueur_id;
    $joueur_pseudo = $joueur_pseudo;
    $joueur_mdp = $joueur_mdp;
    $joueur_email = $joueur_email;
    $joueur_avatar = $joueur_avatar;
    $joueur_signature = $joueur_signature;
    $joueur_localisation = $joueur_localisation;
    $joueur_inscrit = $joueur_inscrit;
    $joueur_derniere_visite = $joueur_derniere_visite;
    $joueur_rang = $joueur_rang;
    $joueur_post = $joueur_post;
  }
  */

  /**
  * GETTER AND SETTER
  */
  function getId()
  {
    return $this->joueurId;
  }
  function setId($value)
  {
      if ($value == "")
      {
          return $this->joueurId;
      }
      //var_dump($this);
      $this->joueurId = $value;
  }


  function getPseudo()
  {
    return $this->joueurPseudo;
  }
  function setPseudo($value)
  {
      if ($value == "")
      {
          return $this->joueurPseudo;
      }

      $this->joueurPseudo = $value;
  }

  function getEmail()
  {
    return $this->joueurEmail;
  }
  function setEmail($value = "")
  {
      if ($value == "")
      {
          return $this->joueurEmail;
      }

      $this->joueurEmail = $value;
  }


  function getAvatar()
  {
    return $this->joueurAvatar;
  }
  function setAvatar($value = "")
  {
      if ($value == "")
      {
          return $this->joueurAvatar;
      }

      $this->joueurAvatar = $value;
  }

  function getRang()
  {
    return $this->joueurRang;
  }
  function setRang($value = "")
  {
      if ($value == "")
      {
          return $this->joueurRang;
      }

      $this->joueurRang = $value;
  }
};



 ?>
