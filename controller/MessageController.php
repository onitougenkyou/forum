<?php

/**
*
*	Message Controleur
*
*
* @user Cedric
* @date 2017.03.27
**/
class MessageController
{
	private $db;
	private $var;
	
	private $mDao;	// Forum Dao
	private $mViewC;	// Forum View Controller
	
	
	
	/**
	*	Constructeur
	*
	**/
	public function __construct(CConnexion $db, $var = '')
	{
		$this->db = $db;
		$this->var = $var;
		
		// Instanciation du DAO
		$this->mDao = new MessageDao($this->db);

		// Instanciation de la Vue
		$this->mViewC = new MessageViewController();
		
	}
	
	
	
	/**
	*	Afficher la liste de forums
	*
	**/
	public function afficherListeMessages()
	{

		// Récupération de la liste des forums en tableau d'objet
		$messageListe = $this->mDao->getMessages();
		
		// Appel le controller de la vue du Forum qui renvoi le code HTML de la liste des forums
		return $this->mViewC->getViewMessageListe($messageListe);

	}
	
}


