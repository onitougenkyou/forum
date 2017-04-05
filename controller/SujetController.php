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
	
	private $sDao;	// Sujet Dao
	private $sViewC;	// Sujet View Controller
	
	
	
	/**
	*	Constructeur
	*
	* @param		Object		$db		Objet PDO
	**/
	public function __construct(CConnexion $db)
	{
		$this->db = $db;
		
		// Instanciation du DAO
		$this->sDao = new SujetDao($this->db);

		// Instanciation de la Vue
		$this->sViewC = new SujetViewController();
		
	}
	
	
	
	/**
	*	Afficher la liste des sujets
	*
	* @param		integer		$forumId 	Id du forum affiché
	* @param		array()		$user 		TODO DEL Param pour avoir l'user en cours
	**/
	public function afficherListe($forumId, $user)
	{

		// Récupération de la liste des forums en tableau d'objet
		$sujetListe = $this->sDao->getSujets($forumId);
		
		// Appel le controller de la vue des Sujets qui renvoi le code HTML de la liste des sujets
		return $this->sViewC->getViewSujetListe($sujetListe, $user);

	}
	
	
	
	/**
	*	Afficher les informations du forum_bandeau quand un sujet est affiché
	*
	* @param		integer		sujetId		Id d'un sujet
	* @return	String		Code HTML
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
	* @param		integer		$sujetId		Id d'un sujet
	* @return	Object		Un objet Sujet
	**/
	public function getSujet($sujetId)
	{
		// Récupération du forumId
		$sujet = $this->sDao->getSujet($sujetId);
		
		// Retourne l'Id du Forum du Sujet
		return $sujet;

	}
	
	
	
}


