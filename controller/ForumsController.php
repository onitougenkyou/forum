<?php


function checkDroit($id)
{
	return true;
}
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

	private $fPageC;	// Forums Page Controlleur
	
	
	/**
	*	Constructeur
	*		Appel les autres constructeurs en fonction des paramètres recu
	*
	* @param		Object		$db			Object PDO permettant l'accès la base de donnée
	**/
	public function __construct(CConnexion $db)
	{
		$this->db 		= $db;
		$this->action		= Request::getInstance()->get('action');
		$this->var		= Request::getInstance()->get('var');
	}
	
	
	
	/**
	*	getForumController
	*		Appel Forums Page Controller
	*
	* @param		array()		$user		Tableau contenant les informations de l'utilisateur connecté
	**/
	public function createPage($user)
	{
		$this->fPageC 	= new ForumsPageController($this->db, $this->action, $this->var);
		
		/*
		*	Affichage de la liste des forums			action = forum							
		*/
		if( $this->action == '' || 
			( $this->action == Config::getInstance()->get('forum') && $this->var == '' ) ) {
			$this->fPageC->forumListe($user);
		}
		
		/*
		*	Affichage des sujets d'un forum 			action = forum 			& var = z
		*/
		if( $this->action == Config::getInstance()->get('forum') && is_numeric($this->var) ) {
			$this->fPageC->sujetListe($this->var, $user);
		}
		
		/* 
		*	Affichage d'un sujet 			action = sujet 			& var = z		
		*/
		if( $this->action == Config::getInstance()->get('sujet') && is_numeric($this->var) ) {
			$this->fPageC->messageListe($this->var, $user);
		}
		
		/* 
		*	Suppression d'un message		action = sujet 			& var = z		
		*/
		if( $this->action == Config::getInstance()->get('supprMessage') && is_numeric($this->var) ) {
			$this->fPageC->messageSupprimer($this->var);
			$this->fPageC->messageListe($this->var);
		}
		
		/* 
		*	Ajouter/Modifier un Message			action = ajoutMessage || action = modifMessage ||  			& var = z
		*		Vérification des droits
		*/
		if( ( $this->action == Config::getInstance()->get('ajoutMessage') 
				|| $this->action == Config::getInstance()->get('modifMessage') )
				&& ( is_numeric($this->var) && $user->checkDroit(Config::getInstance()->get('Membre')) ) ) {
				// && is_numeric($this->var) && checkDroit(Config::getInstance()->get('Membre')) ) {
				
				Debug::getInstance()->set('debug', __CLASS__,  __FILE__, __LINE__ , ' Ajouter/Modifier un Message');
			
			$messageId = 0;
			$sujetId = 0;
			
			if( Request::getInstance()->get('formEnvoyer') == Config::getInstance()->get('cleFormulaire') ) {
				// Traitement d'un formulaire
				$this->fPageC->messageRecuTraitement($this->var);
				Debug::getInstance()->set('debug', __CLASS__,  __FILE__, __LINE__ , ' Traitement d\'un message');
			
			} else {
				// Affichage du Formulaire
				if( $this->action == Config::getInstance()->get('ajoutMessage') ) {
					// Nouveau Message
					$sujetId = $this->var;
					Debug::getInstance()->set('debug', __CLASS__,  __FILE__, __LINE__ , ' Nouveau message');
					
				} else {
					// Modification
					$messageId = $this->var;
					Debug::getInstance()->set('debug', __CLASS__,  __FILE__, __LINE__ , ' Modification d\'un message');
				
				}
				$this->fPageC->messageAfficherFormulaire($sujetId, $messageId, $user);
			}
		}
		
	}
	
	
	
	/*
	*	Get HTML
	*		Renvoi l'ensemble du code HTML de ForumsPageController avec le template général du Forum
	*
	* @param	array()		Id de l'utilisateur actuellement connecté
	* @return	String		code HTML
	*/
	public function getHTML($user)
	{
		// Génération du bandeau et enregistrement
		return $this->fPageC->getHTML($this->action, $this->var, $user);
	}
	
}