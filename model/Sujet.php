<?php
//namespace Projet\Forum\Model;

/**
*
*	Classe Sujet
*		Elle contient l'ensemble des suejt d'un forum
*
* @user Cedric
* @date 2017.03.18
**/
class Sujet
{
	private $id;
	private $dateCreation;
	private $dateModification;
	private $auteur;
	private $acl;
	private $titre;
	private $texte;
	private $forumId;
	private $affichage;			// option - sujet affiché ou non

	/**
	*	Constructeur
	*
	**/
	public function __construct($data)
	{
		if(isset($data['id']))				$this->id 				= $data['id'];
		if(isset($data['date_creation']))		$this->dateCreation 		= $data['date_creation'];
		if(isset($data['date_modification']))	$this->dateModification 	= $data['date_modification'];
		if(isset($data['auteur']))				$this->auteur 			= $data['auteur'];
		if(isset($data['acl']))				$this->acl 				= $data['acl'];
		if(isset($data['titre']))				$this->titre 				= $data['titre'];
		if(isset($data['texte']))				$this->texte 				= $data['texte'];
		if(isset($data['forum_id']))			$this->forumId 			= $data['forum_id'];
		if(isset($data['affichage']))			$this->affichage 			= $data['affichage'];

	}
	
	/**
	*	To String
	*		Affichage de l'objet, SEULEMENT POUR DEV/TEST
	*
	**/
	public function __toString()
	{
		$retour = '';
			$retour .= 'id : '.$this->id.'<br>';
			$retour .= 'Auteur : '.$this->auteur.'<br>';
			$retour .= 'Titre : '.$this->titre.'<br>';
			$retour .= 'Description : '.$this->texte.'<br>';
			$retour .= 'ID du Forum : '.$this->forumId.'<br>';
		$retour .= '';
		return $retour;
	}



	// Id
	public function getId()
	{
		return $this->id;
	}

	// Date de Création
	public function setDateCreation($dateCreation)
	{
		$this->dateCreation = $dateCreation;
	}
	public function getDateCreation()
	{
		return $this->dateCreation;
	}

	// Date de Modification
	public function setDateModification($dateModification)
	{
		$this->dateModification = $dateModification;
	}
	public function getDateModification()
	{
		return $this->dateModification;
	}

	// Auteur
	public function setAuteur($auteur)
	{
		$this->auteur = $auteur;
	}
	public function getAuteur()
	{
		return $this->auteur;
	}

	// Acl
	public function setAcl($acl)
	{
		$this->acl = $acl;
	}
	public function getAcl()
	{
		return $this->acl;
	}

	// Titre
	public function setTitre($titre)
	{
		$this->titre = $titre;
	}
	public function getTitre()
	{
		return $this->titre;
	}

	// Texte
	public function setTexte($texte)
	{
		$this->texte = $texte;
	}
	public function getTexte()
	{
		return $this->texte;
	}

	// ForumId
	public function setForumId($forumId)
	{
		$this->forumId = $forumId;
	}
	public function getForumId()
	{
		return $this->forumId;
	}

	// Affichage
	public function setAffichage($affichage)
	{
		$this->affichage = $affichage;
	}
	public function getAffichage()
	{
		return $this->affichage;
	}


}