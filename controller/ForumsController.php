<?php

/**
*
*	Forums Controleur
*		Controleur de la partie Forum du site
*		Gère l'appel en fonction des actions a effectués
*		Peut appeler les controlleurs Forum, Sujet ou Message en fonction de l'action
*
*
* @user Cedric
* @date 2017.03.23
**/
class ForumsController
{
	private $db;
	private $action;
	private $var;
	 
	/**
	*	Constructeur
	*		Appel les autres constructeurs en fonction des paramètres recu
	**/
	public function __construct(CConnexion $db, $action = '', $var = '')
	{

		$this->db 		= $db;
		$this->action 	= $action;
		$this->var 		= $var;

		// Debug
			echo 'Debug ForumsController : action='.$action.' & var='.$var.'<br>';
	}
	
	
	
	/**
	*	getForumController
	*		Appel le controlleur du forum
	**/
	public function getPageController()
	{
		/*
			Affichage de la liste des forums
				action = forum							
				vue : forums
		*/
		if( $this->action == '' 
			|| ( $this->action == Config::getInstance()->get('forum') && $this->var == '' ) 
			) {
			// On affiche la liste des forums
			echo '<h2>ForumController</h2>';
			$fC = new ForumController($this->db);
			return $fC->afficherListeForums();
		}
		
		
		/*
			Affichage d'un forum (liste sujet)
				action = forum 			& var = z
				vue : sujets
		*/
		if( $this->action == Config::getInstance()->get('forum') && is_numeric($this->var) ) {
			// On affiche la liste des sujets pour un forum donné
			echo '<h2>SujetController</h2>';
			$fS = new SujetController($this->db, $this->var);
			return $fS->afficherListeSujets();
		}
		
		
		
		/* 
			Affichage d'un sujet (liste message)
				action = sujet 			& var = z		
				vue messages		
		*/
		if( $this->action == Config::getInstance()->get('sujet') && is_numeric($this->var) ) {
			// On affiche la liste des message pour un forum donné
			echo '<h2>MessageController</h2>';
			$fM = new MessageController($this->db, $this->var);
			return $fM->afficherListeMessages();
		}
		
		
		
	}
	
	
}