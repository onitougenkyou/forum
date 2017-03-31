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
	public function afficherListe($sujetId)
	{

		// Récupération de la liste des forums en tableau d'objet
		$messageListe = $this->mDao->getMessages($sujetId);
		
		// Appel le controller de la vue du Forum qui renvoi le code HTML de la liste des forums
		return $this->mViewC->getViewMessageListe($messageListe);

	}
	
	
	
	/**
	*	Afficher le formulaire d'ajout de message
	*		Quand on souhaite créer un nouveau message, un message vide est créé et envoyé a la vue pour remplir le formulaire
	*		Ca permet d'utiliser la même fonction de la vue pour les modifications
	*			action = ajoutMessage
	*			var = 5	// sujetId
	*
	**/
	// public function afficherFormulaire($sujetId)
	public function afficherFormulaire($sujetId, $messageId)
	{
		// Création du Message
		$message = new Message();
		
		
		if($sujetId != 0)		$message->setSujetId($sujetId);		// Ajout d'un message
		else					$message->setId($messageId);			// Modification d'un message
		
		// Création du formulaire 
		$form = new Form();
		
		// Envoi du Formulaire & du Message à la vue pour créer le Formulaire
		$form = $this->mViewC->getForm($form, $message);
		
		// Envoi du formulaire a la vue pour inclure le formulaire dans un template
		$dataHTML = $this->mViewC->getFormHTML($form);
		
		// Renvoi du code HTML
		return $dataHTML;
	}
	
	
	
	/**
	*	Traitement des Messages recu via le formulaire
	*		Création, Modification
	*		Envoi 
	*
	**/
	public function traiterFormulaire($sujetId)
	{
		
		// Debug::getInstance()->set('Formulaire', __CLASS__,  __FILE__, __LINE__ , ' hiddenvalue : '.Request::getInstance()->get('envoyer'));
		
		$message = new Message();
			
			$message->setAuteur(Request::getInstance()->get('auteur'));
			$message->setAcl(Request::getInstance()->get('acl'));
			$message->setTitre(Request::getInstance()->get('titre'));
			$message->setTexte(Request::getInstance()->get('texte'));
			$message->setSujetId(Request::getInstance()->get('sujetId'));
			$message->setAffichage(Request::getInstance()->get('affichage'));
		
		echo $message;
		
		Request::getInstance()->get('envoyer');
		
		
		

	}
	

	
	
}


