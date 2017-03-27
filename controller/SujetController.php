<?php

/**
*
*	Sujet Controleur
*
*
* @user Cedric
* @date 2017.03.23
**/
class SujetController
{
	private $db;
	private $var;
	
	private $sDao;	// Forum Dao
	private $sViewC;	// Forum View Controller
	
	
	
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
	public function afficherListeSujets()
	{

		// Récupération de la liste des forums en tableau d'objet
		$sujetListe = $this->sDao->getSujets();
		
		// Appel le controller de la vue des Sujets qui renvoi le code HTML de la liste des sujets
		return $this->sViewC->getViewSujetListe($sujetListe);

	}
	
}


