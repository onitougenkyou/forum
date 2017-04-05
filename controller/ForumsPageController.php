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
	
	private $fC;		// Forum Controlleur
	private $fPageC;	// Forum Page Controlleur
	private $sC;		// Sujet Controlleur
	private $mC;		// Message Controlleur
	
	private $html;	// HTML de la page
	
	
	/**
	*	Constructeur
	*		Appel les autres constructeurs en fonction des paramètres recu
	*
	* @param		Object		$db			Objet PDO pour la connexion à la BDD
	**/
	public function __construct($db)
	{
		$this->db 		= $db;
		
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
	*
	* @param		array()		$user		Tableau contenant les informations de l'utilisateur connecté
	**/
	public function forumListe($user)
	{
		$this->html['body'] = $this->fC->afficherListe($user);
	}
	
	
	
	/**
	*	Forum Ajout
	*		Page qui gère l'ajout des forums
	*
	**/
	public function forumAjout()
	{
		
	}
	
	
	
	/**
	*	Sujet Liste
	*		Page qui affiche la liste des Sujets
	*
	* @param		integer		$forumId		Id du forum, permettant d'afficher les sujets de celui ci
	* @param		array()		$user		Tableau contenant les informations de l'utilisateur connecté
	**/
	public function sujetListe($forumId, $user)
	{
		$this->html['body'] =  $this->sC->afficherListe($forumId, $user);
	}
	
	
	
	/**
	*	Sujet ajout
	*		Page qui gère l'ajout des sujets
	*
	**/
	public function sujetAjout()
	{
		
	}
	
	
	
	/**
	*	Message Liste
	*		Page qui affiche la liste des Message
	*
	*
	* @param		integet		$sujetId		Id du sujet, permettant d'afficher les messages de celui ci
	* @param		array()		$user		Tableau contenant les informations de l'utilisateur connecté
	**/
	public function messageListe($sujetId, $user)
	{
		$this->html['body'] .=  $this->mC->afficherListe($sujetId, $user);
	}
	

	
	/**
	*	Message supprimer
	*		Page qui affiche la liste des Message
	*
	* @param		integer		$messageId	Id du message à supprimer
	**/
	public function messageSupprimer($messageId)
	{
		$this->html['body'] .=  $this->mC->supprimer($messageId);
	}
	

	
	/**
	*	Message Ajout
	*		Affiche le formulaire pour ajouter un Message
	*			Si sujetId = 0, c'est un message à ajouter
	*			Si messageId = 0, c'est un message a modifier
	*
	* @param		integer		$sujetId		Id du sujet, permet de renseigner le champ hidden sujet_id
	* @param		integer		$messageId	Id du message à modifier
	* @param		array()		$user		Tableau contenant les informations de l'utilisateur
	**/
	public function messageAfficherFormulaire($sujetId, $messageId, $user)
	{
		$this->html['body'] = $this->mC->afficherFormulaire($sujetId, $messageId, $user);
		Debug::getInstance()->set('PAGE', __CLASS__,  __FILE__, __LINE__ , ' message Afficher Formulaire');
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
	* @param		integer		$action		action de GET, Permet de générer les liens du fil d'arianne
	* @param		integer		$var			var de GET, Permet de générer les liens du fil d'arianne
	* @return	String		code HTML
	**/
	private function getInfoHeader($action, $var)
	{
		$bandeauForumHTML = '';
		
		// Demande du header au Forum, doit normalement renvoyer 'Forum'
		$bandeauForumHTML .= $this->fC->getInfoHeader();
		
		
		if( is_numeric($var) ) {

			// Si action = forum
			if( $action == Config::getInstance()->get('forum') ) {
				// On affiche le bandeau du forum 
				$bandeauForumHTML .= $this->fC->getInfoHeader($var);
				
				
			} else {
				// Sinon partout
				
				// Récupère le forum_id du sujet a partir de l'Id du Sujet
				$sujet = $this->sC->getSujet($var);

				// On doit trouver l'Id du forum dans lequel le sujet est contenu
				$bandeauForumHTML .= $this->fC->getInfoHeader($sujet->getForumId());
				
				// Puis on affiche le sujet
				$bandeauForumHTML .= $this->sC->getInfoHeader($var);
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
	public function getHTML($action, $var)
	{
		
		// Génération du bandeau et enregistrement		TODO a revoir pour toujours l'avoir
		if( $action == Config::getInstance()->get('forum') || $action = Config::getInstance()->get('sujet') ) {
			$this->html['forums_bandeau'] 	= $this->getInfoHeader($action, $var);
		} else {
			$this->html['forums_bandeau'] 	= '';
		}
		
		
		$this->html['forums_debug'] 	= Debug::getInstance()->getHTML();
		
		// Renvoi le code HTML généré a partir d'HTML réceptionné par ForumsController
		$dataHTML = $this->fvC->CreatePage($this->html);
		
		// Page complete du site
		return $dataHTML;
	}
}
