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
	
	private $mDao;	// Forum Dao
	private $mViewC;	// Forum View Controller
	
	
	
	/**
	*	Constructeur
	*
	**/
	public function __construct(CConnexion $db)
	{
		$this->db = $db;
		
		// Instanciation du DAO
		$this->mDao = new MessageDao($this->db);

		// Instanciation de la Vue
		$this->mViewC = new MessageViewController();
		
	}
	
	
	
	/**
	*	Afficher la liste de forums
	*
	* @param		integer		$sujetId		Id d'un sujet
	* @param		array()		$user		Tableau contenant les infos de l'utilisateur connecté
	* @return	String		Un objet Sujet
	**/
	public function afficherListe($sujetId, $user)
	{
		// Récupération de la liste des forums en tableau d'objet
		$messageListe = $this->mDao->getMessages($sujetId, $user);
		
		// Appel le controller de la vue du Forum qui renvoi le code HTML de la liste des forums
		return $this->mViewC->getViewMessageListe($messageListe, $user);		// TODO DEL Passage en param pour avoir l'utilisateur en cours

	}
	
	
	
	/**
	*	Afficher le formulaire d'ajout de message
	*		Quand on souhaite créer un nouveau message, un message vide est créé et envoyé a la vue pour remplir le formulaire
	*		Ca permet d'utiliser la même fonction de la vue pour les modifications
	*			action = ajoutMessage
	*			var = 5	// sujetId
	*
	* @param 	integer		$sujetId 	Id du sujet dans lequel le message sera enregistré
	* @param 	integer		$messageId 	Id du message a modifier
	* @return	String		Code HTML
	**/
	public function afficherFormulaire($sujetId = 0, $messageId = 0)
	{
		Debug::getInstance()->set('Formulaire', __CLASS__, __FILE__, __LINE__ , 'Affichage d\'un formulaire');
		
		if($sujetId != 0) {
			// Création du Message
			$message = new Message();
			
			// Ajout d'un message
			$message->setSujetId($sujetId);
			
			Debug::getInstance()->set('Formulaire', __CLASS__, __FILE__, __LINE__ , 'Nouveau message dans le sujet : '.$sujetId);
			
		} else {
			// Récupération du message via l'id du message transmis
			$message = $this->mDao->getMessage($messageId);
			
			// Modification d'un message
			$message->setId($messageId);		
			
			Debug::getInstance()->set('Formulaire', __CLASS__, __FILE__, __LINE__ , 'Modification du message : '.$messageId);
		}
		
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
	*
	* @return	boolean		Vrai si le message a été enregistré
	**/
	public function traiterFormulaire()
	{
		$message = new Message();
			
			// Si un ID est présent, c'est une modification
			if( Request::getInstance()->get('id') != '' ) {
				$message->setAuteur(Request::getInstance()->get('id'));
			}
			
			$message->setAuteur(Request::getInstance()->get('auteur'));
			$message->setAuteur(Request::getInstance()->get('auteur'));
			$message->setAcl(Request::getInstance()->get('acl'));
			$message->setTitre(Request::getInstance()->get('titre'));
			$message->setTexte(Request::getInstance()->get('texte'));
			$message->setSujetId(Request::getInstance()->get('sujetId'));
			$message->setAffichage(Request::getInstance()->get('affichage'));

			// Si un ID est présent, c'est une modification
			if( Request::getInstance()->get('id') != '' ) {
				Debug::getInstance()->set('Formulaire', __CLASS__,  __FILE__, __LINE__ , ' Modification Message envoyé : '.$message);
			} else {
				Debug::getInstance()->set('Formulaire', __CLASS__,  __FILE__, __LINE__ , ' Ajout Message envoyé : '.$message);
			}
		
		if( $this->mDao->addMessage($message) ) {
			return true;
		} else {
			return false;
		}
		
	}
	
	
	
	/**
	*	Supression des messages
	*
	*
	* @param		integer		$messageId		Id d'un message
	* @return	String		Message de confirmation ou d'infirmation pour l'enregistrement du message
	**/
	public function supprimer($messageId = 0)
	{
		// Récupération de l'auteur du message
		$auteurId = $this->mDao->getMessageAuteur($messageId);
		
		// Récupération du profil de l'auteur
		// TODO Inclure recherche de l'auteur pour la sécurité
		
		// Vérification des droits
		if( checkDroit(true) ) {
			// Supression
			$this->mDao->supprimer($messageId);
			
			return 'Message supprimé';
		} else {
			// TODO Gestion des messages d'information
			return 'Droit refusé';
		}
		
		
	}
	

	
	
}


