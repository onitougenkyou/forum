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
  public $joueurMdp;
  public $joueurEmail;
  public $joueurAvatar;
  public $joueurSignature;
  public $joueurLocalisation;
  public $joueurInscrit;
  public $joueurDerniereVisite;
  public $joueurRang;
  public $joueurPost;

  /**
  * CONSTRUCTEUR
  */

  function __construct()
  {
    $this->joueurId = 4;
    $this->joueurPseudo = "random";
    $this->joueurMdp = 0000;
    $this->joueurEmail = "ramdom@lambda.com";
    $this->joueurAvatar = "";
    $this->joueurSignature = "";
    $this->joueurLocalisation = "";
    $this->joueurInscrit = ""; //date
    $this->joueurDerniereVisite = ""; // date
    $this->joueurRang = "";
    $this->joueurPost = "";
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


  function getMdp()
  {
    return $this->joueurMdp;
  }
  function setMdp($value)
  {
      if ($value == "")
      {
          return $this->joueurMdp;
      }

      $this->joueurMdp = $value;
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

  function getSignature()
  {
    return $this->joueurSignature;
  }
  function setSignature($value = "")
  {
      if ($value == "")
      {
          return $this->joueurSignature;
      }

      $this->joueurSignature = $value;
  }

  function getLocalisation()
  {
    return $this->joueurLocalisation;
  }
  function setLocalisation($value = "")
  {
      if ($value == "")
      {
          return $this->joueurLocalisation;
      }

      $this->joueurLocalisation = $value;
  }

  function getInscrit()
  {
    return $this->joueurInscrit;
  }
  function setInscrit($value = "")
  {
      if ($value == "")
      {
          return $this->joueurInscrit;
      }

      $this->joueurInscrit = $value;
  }

  function getDerniereVisite()
  {
    return $this->joueurDerniereVisite;
  }
  function setDerniereVisite($value = "")
  {
      if ($value == "")
      {
          return $this->joueurDerniereVisite;
      }

      $this->joueurDerniereVisite = $value;
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

  function getPost()
  {
    return $this->joueurPost;
  }
  function setPost($value = "")
  {
      if ($value == "")
      {
          return $this->joueurPost;
      }

      $this->joueurPost = $value;
  }
};



 ?>
