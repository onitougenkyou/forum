<?php

/**
*
*	Classe Sujet
*		Elle contient l'ensemble des suejt d'un forum
*
**/
class Sujet
{
	private $id;
	private $dateCreation;
	private $dateModification;
	private $auteur;
	private $acl;
	private $titre;
	private $description;
	private $forumId;

	/**
	*	Constructeur
	*
	**/
	public function __construct($auteur, $titre, $description = '', $forumId = 0)
	{
		$this->auteur 		= $auteur;
		$this->titre 			= $titre;
		$this->description 	= $description;
		$this->forumId 		= $forumId;
	}
	
	/**
	*	To String
	*		Affichage de l'objet, SEULEMENT POUR DEV/TEST
	*
	**/
	public function __toString()
	{
		$retour = '<p>';
			$retour .= 'Auteur : '.$this->auteur.'<br>';
			$retour .= 'Titre : '.$this->titre.'<br>';
			$retour .= 'Description : '.$this->description.'<br>';
			$retour .= 'ID du Forum : '.$this->forumId.'<br>';
		$retour .= '</p>';
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

	// Description
	public function setDescription($description)
	{
		$this->description = description;
	}
	public function getDescription()
	{
		return $this->description;
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


}