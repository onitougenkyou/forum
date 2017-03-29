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
	
	private $fC;		// Forum Controlleur
	private $sC;		// Sujet Controlleur
	private $mC;		// Message Controlleur
	private $fvC;		// Forum View Controlleur
	
	private $html;	// Code HTML du forum
	
	
	
	/**
	*	Constructeur
	*		Appel les autres constructeurs en fonction des paramètres recu
	**/
	public function __construct(CConnexion $db, $action = '', $var = '')
	{

		$this->db 			= $db;
		$this->action 		= $action;
		$this->var 			= $var;
		$this->html['body'] 	= '';

		$this->fC = new ForumController($this->db);
		$this->sC = new SujetController($this->db);
		$this->mC = new MessageController($this->db);
		$this->fvC = new ForumsViewController();
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
			
			// Récupération de l'HTML
			$this->html['body'] .= $this->fC->afficherListeForums();
		}
		
		
		
		/*
			Affichage d'un forum (liste sujet)
				action = forum 			& var = z
				vue : sujets
		*/
		if( $this->action == Config::getInstance()->get('forum') && is_numeric($this->var) ) {
			
			// Récupération de l'HTML
			$this->html['body'] .=  $this->sC->afficherListeSujets($this->var);
		}
		
		
		
		/* 
			Affichage d'un sujet (liste message)
				action = sujet 			& var = z		
				vue messages		
		*/
		if( $this->action == Config::getInstance()->get('sujet') && is_numeric($this->var) ) {
			
			// Récupération de l'HTML
			$this->html['body'] .= $this->mC->afficherListeMessages($this->var);
		}

	}
	
	
	
	/**
	*	get Info Header
	*		Génére le code HTML du forum_bandeau en fonction de la page appelée
	*		Il contient l'emplacement de l'utilisateur
	*		Par exemple
	*			Forum
	*			Forum / TitreForum
	*			Forum / TitreForum / TitreSujet
	*
	**/
	private function getInfoHeader()
	{
		$bandeauForumHTML = '';
		
		// Demande du header au Forum, doit normalement renvoyer 'Forum'
		$bandeauForumHTML .= $this->fC->getInfoHeader();
		
		
		if( is_numeric($this->var) ) {

			// Si action = forum
			if( $this->action == Config::getInstance()->get('forum') ) {
				$bandeauForumHTML .= $this->fC->getInfoHeader($this->var);
			}
			
			// Si action = sujet
			if( $this->action == Config::getInstance()->get('sujet') ) {
			
				// Récupère le forum_id du sujet a partir de l'Id du Sujet
				$sujet = $this->sC->getSujet($this->var);

				// On doit trouver l'Id du forum dans lequel le sujet est contenu
				$bandeauForumHTML .= $this->fC->getInfoHeader($sujet->getForumId());
				
				// Puis on affiche le sujet
				$bandeauForumHTML .= $this->sC->getInfoHeader($this->var);
			}
		}
		
		
		// Enregistrement de l'HTML
		return $bandeauForumHTML;
	}
	
	
	
	/**
	*	get HTML
	*		Renvoi l'ensemble du code HTML avec le template général du Forum
	*
	**/
	public function getHTML()
	{
		// Génération du bandeau et enregistrement
		$this->html['forums_bandeau'] = $this->getInfoHeader();
		
		// Renvoi le code HTML généré a partir d'HTML réceptionné par ForumsController
		$dataHTML = $this->fvC->CreatePage($this->html);
		
		// Page complete du site
		return $dataHTML;
		 
	}
	
	
	

	
}