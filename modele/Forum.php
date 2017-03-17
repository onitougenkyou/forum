<?php

/**
*
*	Classe Forum
*		Conteneur des Sujets
*		L'arborescence est construite en fonction du parent (id du forum)
*		Pas de parent = racine
**/
class Forum
{
	private $id;
	private $dateCreation;
	private $dateModification;
	private $auteur;
	private $acl;
	private $titre;
	private $description;
	private $image;				// option - Image pour illuster le forum
	private $parentId; 			// Détermine son parent, l'arborescence
	private $nbSujet;				// option - Nombre de sujet dans le forum
	private $dernierMessageId;		// option - Id du dernier message dans le forum

	/**
	*	Constructeur
	*
	**/
	public function __construct($auteur, $titre='', $description = '')
	{
		$this->auteur 		= $auteur;
		$this->titre 			= $titre;
		$this->description 	= $description;
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

	// Parent
	public function setParent($parentId)
	{
		$this->parentId = $parentId;
	}
	public function getParent()
	{
		return $this->parentId;
	}

	// Image
	public function setImage($image)
	{
		$this->image = $image;
	}
	public function getImage()
	{
		return $this->image;
	}

	// nbSujet
	public function setNbSujet($nbSujet)
	{
		$this->nbSujet = $nbSujet;
	}
	public function getNbSujet()
	{
		return $this->nbSujet;
	}

	// dernierMessageId
	public function setDernierMessage($dernierMessageId)
	{
		$this->dernierMessageId = $dernierMessageId;
	}
	public function getDernierMessage()
	{
		return $this->dernierMessageId;
	}




}