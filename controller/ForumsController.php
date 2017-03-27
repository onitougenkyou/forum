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
	 
	/**
	*	Constructeur
	*		Appel les autres constructeurs en fonction des paramètres recu
	*		Il aurait été possible de récuéprer la valeur du get et d'appeler le bon constructeur sans passer par un if(x=Y)
	*			Mais ca aurait signifié utiliser une variable UTILISATEUR pour appeler un constructeur ...
	**/
	public function __construct(CConnexion $db, $action = '', $var = '')
	{
		// Debug
			var_dump($db);

		$this->db = $db;
		$this->db = $action;

		// Debug
			var_dump($this->db);
		
		// Debug
			echo 'Debug ForumsController : action='.$action.' & var='.$var.'<br>';
		
		if( $action == Config::getInstance()->get('forum') || $action == Config::getInstance()->get('ajoutForum') )
		{	// Affichage ou modification d'un forum
			
			$fC = new ForumController($this->db, $var);
			
			if($var == ''){
				// On affiche la liste des Forums
				$fC->afficherListeForums();
			}
			
		} else if ( $action == Config::getInstance()->get('sujet') || $action == Config::getInstance()->get('ajoutSujet') )
		{	// Affichage ou modification d'un sujet
			
			$sC = new SujetController($this->db);
		
		} else if ( $action == Config::getInstance()->get('ajoutMessage') )
		{	// Modification d'un message
	
			$mC = new MessageController($this->db, $var);
			
		}
		
		
	}
	
	
}