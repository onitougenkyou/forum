<?php

/**
*
*	Forums Page Controleur
*		Gère la création des vues
*
* @user Cedric
* @date 2017.03.27
**/
class ForumsPageController
{
	
	private $db;
	
	private $action;	// Données de la page en cours
	private $var;		// Données de la page en cours
	
	private $fC;		// Forum Controlleur
	private $fPageC;	// Forum Page Controlleur
	private $sC;		// Sujet Controlleur
	private $mC;		// Message Controlleur
	
	private $html;	// HTML de la page
	
	
	/**
	*	Constructeur
	*		Appel les autres constructeurs en fonction des paramètres recu
	**/
	public function __construct($db, $action, $var)
	{
		$this->db 		= $db;
		$this->action 	= $action;
		$this->var 		= $var;
		
		$this->html['body'] 		= '';

		$this->fC = new ForumController($this->db);
		$this->sC = new SujetController($this->db);
		$this->mC = new MessageController($this->db);
		
		$this->fvC = new ForumsViewController();
		
		Config::getInstance()->set('debug', '<h1>DEBUG</h1>');

	}
	
	
	
	/**
	*	Forum Liste
	*		Page qui affiche la liste des Forums
	**/
	public function forumListe($user)
	{
		$this->html['body'] = $this->fC->afficherListe($user);
	}
	
	
	
	/**
	*	Forum Ajout
	*		Page qui gère l'ajout des forums
	**/
	public function forumAjout()
	{
		
	}
	
	
	
	/**
	*	Sujet Liste
	*		Page qui affiche la liste des Sujets
	**/
	public function sujetListe($forumId, $user)		// TODO DEL, Param pour avoir l'user en cours
	{
		$this->html['body'] =  $this->sC->afficherListe($forumId, $user);
	}
	
	
	
	/**
	*	Sujet ajout
	*		Page qui gère l'ajout des sujets
	**/
	public function sujetAjout()
	{
		
	}
	
	
	
	/**
	*	Message Liste
	*		Page qui affiche la liste des Message
	*
	* @Param		sujetId		Id du sujet a affiché
	* @Param 	user			TODO DEL Utilisateur actuellement connecté
	**/
	public function messageListe($sujetId, $user)
	{
		$this->html['body'] .=  $this->mC->afficherListe($sujetId, $user);
	}
	

	
	/**
	*	Message supprimer
	*		Page qui affiche la liste des Message
	**/
	public function messageSupprimer()
	{
		$this->html['body'] .=  $this->mC->supprimer($this->var);
	}
	

	
	/**
	*	Message Ajout
	*		Affiche le formulaire pour ajouter un Message
	**/
	public function messageAfficherFormulaire($sujetId, $messageId)
	{
		$this->html['body'] = $this->mC->afficherFormulaire($sujetId, $messageId);
	}
	
	
	/**
	*	Message Traitement
	*		Page qui gère le traitement des messages
	*		Si on trouve un ID dans le POST, c'est une modification
	*		Si non, un enregistrement
	**/
	public function messageRecuTraitement()
	{
		$this->html['body'] = $this->mC->traiterFormulaire();
	}
	
	
	
	/**
	*	get Info Header
	*		Génére le code HTML du forum_bandeau qui est appelé dans toute les pages
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
				// On affiche le bandeau du forum 
				$bandeauForumHTML .= $this->fC->getInfoHeader($this->var);
				
			} else {
				// Sinon partout
				
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

	
	/*
	*	get HTML
	*		Renvoi l'ensemble du code HTML avec le template général du Forum
	*
	*/
	public function getHTML()
	{
		
		// Génération du bandeau et enregistrement
		$this->html['forums_bandeau'] 	= $this->getInfoHeader();
		$this->html['forums_debug'] 	= Debug::getInstance()->getHTML();
		
		// Renvoi le code HTML généré a partir d'HTML réceptionné par ForumsController
		$dataHTML = $this->fvC->CreatePage($this->html);
		
		// Page complete du site
		return $dataHTML;
	}
}
