<?php
//namespace Projet\Forum\Model;

/**
*
*	Classe Forum
*		Conteneur des Sujets
*		L'arborescence est construite en fonction du parent (id du forum)
*		Pas de parent = racine
*
* @user Cedric
* @date 2017.03.18
**/
class Forum
{
	private $id;
	private $dateCreation;
	private $dateModification;
	private $auteur;
	private $acl;					// droits
	private $titre;
	private $description;
	private $parentId; 			// Int Détermine son parent, l'arborescence
	private $nbSujet;				// option - Int 	Nombre de sujet dans le forum
	private $dernierMessageId;		// option - Int 	Id du dernier message dans le forum
	private $affichage;			// option - Bool 	forum affiché ou non
	private $imageId;				// option - Int	Image pour illuster le forum
	
	
	
	/**
	*	Constructeur
	*
	**/
	// public function __construct($auteur = 1, $titre='', $description = '')
	public function __construct($data = array())
	{
		if(isset($data['id']))				$this->id 				= $data['id'];
		if(isset($data['dateCreation']))		$this->dateCreation 		= $data['dateCreation'];
		if(isset($data['dateModification']))	$this->dateModification 	= $data['dateModification'];
		if(isset($data['auteur']))				$this->auteur 			= $data['auteur'];
		if(isset($data['acl']))				$this->acl 				= $data['acl'];
		if(isset($data['titre']))				$this->titre 				= $data['titre'];
		if(isset($data['parentId']))			$this->parentId 			= $data['parentId'];
		if(isset($data['description']))		$this->description 		= $data['description'];
		if(isset($data['parentId']))			$this->parentId 			= $data['parentId'];
		if(isset($data['nbSujet']))			$this->nbSujet 			= $data['nbSujet'];
		if(isset($data['dernierMessageId']))	$this->dernierMessageId 	= $data['dernierMessageId'];
		if(isset($data['affichage']))			$this->affichage 			= $data['affichage'];
		if(isset($data['imageId']))			$this->imageId 			= $data['imageId'];
	}
	
	
	
	/**
	*	To String
	*		Affichage de l'objet, SEULEMENT POUR DEV/TEST
	*
	**/
	public function __toString()
	{
		$retour = '';
			$retour .= 'Id : '.$this->id.'<br>';
			$retour .= 'Auteur : '.$this->auteur.'<br>';
			$retour .= 'Titre : '.$this->titre.'<br>';
			$retour .= 'Description : '.$this->description.'<br>';
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

	// Description
	public function setDescription($description)
	{
		$this->description = description;
	}
	public function getDescription()
	{
		return $this->description;
	}

	// Parent Id
	public function setParentID($parentId)
	{
		$this->parentId = $parentId;
	}
	public function getParentId()
	{
		return $this->parentId;
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

	// dernier Message Id
	public function setDernierMessageId($dernierMessageId)
	{
		$this->dernierMessageId = $dernierMessageId;
	}
	public function getDernierMessageId()
	{
		return $this->dernierMessageId;
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

	// Image Id
	public function setImageId($imageId)
	{
		$this->imageId = $imageId;
	}
	public function getImageId()
	{
		return $this->imageId;
	}

}