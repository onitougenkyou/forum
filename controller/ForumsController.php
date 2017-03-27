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
		
		if( $this->action == Config::getInstance()->get('forum') || $this->action == Config::getInstance()->get('ajoutForum') )
		{	// Affichage ou modification d'un forum
			
			$fC = new ForumController($this->db, $this->var);
			
			if($this->var == ''){
				
				// On affiche la liste des Forums
				return $fC->afficherListeForums();
			}
			
		} else if ( $this->action == Config::getInstance()->get('sujet') || $this->action == Config::getInstance()->get('ajoutSujet') )
		{	
			// Affichage ou modification d'un sujet
			$sC = new SujetController($this->db);
		
		} else if ( $this->action == Config::getInstance()->get('ajoutMessage') ) {

			// Modification d'un message
			$mC = new MessageController($this->db, $this->var);
			
		}
		
		
	}
	
	
}