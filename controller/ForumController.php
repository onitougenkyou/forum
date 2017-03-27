<?php

/**
*
*	Forum Controleur
*
*
* @user Cedric
* @date 2017.03.18
**/
class ForumController
{
	private $db;
	private $var;
	
	private $fDao;	// Forum Dao
	private $fViewC;	// Forum View Controller
	
	
	
	/**
	*	Constructeur
	*
	**/
	public function __construct(CConnexion $db, $var)
	{
		$this->db = $db;
		$this->var = $var;
		
		// Instanciation du DAO
		$this->fDao = new ForumDao($this->db);

		// Instanciation de la Vue
		$this->fViewC = new ForumViewController();
		
	}
	
	
	
	/**
	*	Afficher la liste de forums
	*
	**/
	public function afficherListeForums()
	{

		// Récupération de la liste des forums en tableau d'objet
		$forumListe = $this->fDao->getForums();
		
		// Appel le controller de la vue du Forum qui renvoi le code HTML de la liste des forums
		return $this->fViewC->getViewForumListe($forumListe);

	}
	
}


