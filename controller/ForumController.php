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
	public function __construct(CConnexion $db, $var = '')
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
	
	/**
	*	Get Forum
	*		Récupère le Forum du Sujet
	*
	**/
	public function getForumbyId($forumId)
	{
		// Récupération du forumId
		$forumId = $this->fDao->getForum($forumId);
		
		// Retourne l'Id du Forum du Sujet
		return $forumId;

	}

	
	/**
	*	Afficher les informations du Header quand un forum est affiché
	*
	**/
	public function getInfoHeader($forumId = 0)
	{
		if($forumId != 0 ){
			// Récupération du Forum
			$forum = $this->fDao->getForum($forumId);
		} else {
			$forum = 0;
		}

		// Récupère le chemin du Forum
		return $this->fViewC->getViewForumHeader($forum);	
		
	}
	
}


