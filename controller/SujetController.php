<?php

/**
*
*	Sujet Controleur
*
*
* @user Cedric
* @date 2017.03.27
**/
class SujetController
{
	private $db;
	private $var;
	
	private $sDao;	// Sujet Dao
	private $sViewC;	// Sujet View Controller
	
	
	
	/**
	*	Constructeur
	*
	**/
	public function __construct(CConnexion $db, $var = '')
	{
		$this->db = $db;
		$this->var = $var;
		
		// Instanciation du DAO
		$this->sDao = new SujetDao($this->db);

		// Instanciation de la Vue
		$this->sViewC = new SujetViewController();
		
	}
	
	
	
	/**
	*	Afficher la liste des sujets
	*
	**/
	public function afficherListeSujets($forumId)
	{

		// Récupération de la liste des forums en tableau d'objet
		$sujetListe = $this->sDao->getSujets($forumId);
		
		// Appel le controller de la vue des Sujets qui renvoi le code HTML de la liste des sujets
		return $this->sViewC->getViewSujetListe($sujetListe);

	}
	
	
	
	/**
	*	Afficher les informations du forum_bandeau quand un sujet est affiché
	*
	**/
	public function getInfoHeader($sujetId = 0)
	{
		if($sujetId != 0 ){
			// Récupération du Forum
			$sujet = $this->sDao->getSujet($sujetId);
			
		} else {
			$sujet = 0;
		}

		// Récupère le chemin du Forum
		return $this->sViewC->getViewSujetHeader($sujet);	
		
	}
	
	
	
	/**
	*	Get Sujet
	*		Passe plat pour le ForumsController
	*
	**/
	public function getSujet($sujetId)
	{
		// Récupération du forumId
		$sujet = $this->sDao->getSujet($sujetId);
		
		// Retourne l'Id du Forum du Sujet
		return $sujet;

	}
	
	
	
}


