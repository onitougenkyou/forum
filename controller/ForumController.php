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
	
	private $fDao;	// Forum Dao
	private $fViewC;	// Forum View Controller
	
	
	/**
	*	Constructeur
	*
	* @param		Object		$db			Object PDO, permttant les requêtes à la base de donnée
	**/
	public function __construct(CConnexion $db)
	{
		$this->db = $db;
		
		// Instanciation du DAO
		$this->fDao = new ForumDao($this->db);

		// Instanciation de la Vue
		$this->fViewC = new ForumViewController();
		
	}
	
	
	
	/**
	*	Afficher la liste de forums
	*
	* @return	String		code HTML
	**/
	public function afficherListe()
	{

		// Récupération de la liste des forums en tableau d'objet
		$forumListe = $this->fDao->getForums();
		
		// Appel le controller de la vue du Forum qui renvoi le code HTML de la liste des forums
		return $this->fViewC->getViewForumListe($forumListe);
	}
	
	/**
	*	Get Forum
	*		Récupère un Forum via son Id
	*
	* @param		integer		$forumId		Id du forum a afficher
	* @return	Object		retourn un object Forum
	**/
	public function getForumbyId($forumId)
	{
		// Récupération du forumId
		$forum = $this->fDao->getForum($forumId);
		
		// Retourne le Forum
		return $forum;

	}

	
	/**
	*	Afficher les informations du Header quand un forum est affiché
	*
	* @param		integer		$forumId			Id du forum
	* @return	String		code HTML, lien du Forum en cours
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


