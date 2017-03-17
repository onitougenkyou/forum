<?php

/**
*
*	Classe Message
*		Elle contient l'ensemble des message d'un Sujet
*
**/
class Message
{
	private $id;
	private $dateCreation;
	private $dateModification;
	private $auteur;
	private $acl;
	private $titre;
	private $texte;
	private $sujetId;

	/**
	*	Constructeur
	*
	**/
	public function __construct($auteur, $titre = '', $texte = '', $sujetId = 0)
	{
		$this->auteur 	= $auteur;
		$this->titre 		= $titre;
		$this->texte 		= $texte;
		$this->sujetId 	= $sujetId;
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
			$retour .= 'Texte du message : '.$this->texte.'<br>';
			$retour .= 'ID du sujet : '.$this->sujetId.'<br>';
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

	// Texte
	public function setTexte($texte)
	{
		$this->texte = $texte;
	}
	public function getTexte()
	{
		return $this->texte;
	}

	// SujetId
	public function setSujetId($sujetId)
	{
		$this->sujetId = $sujetId;
	}
	public function getSujetId()
	{
		return $this->sujetId;
	}

}