<?php
//namespace Projet\Forum\Dao;

/**
*
*	Classe Message DAO
*		Lien entre les objets et la base de données
*
* @user Cedric
* @date 2017.03.20
**/
class MessageDao
{
	private $db;
	
	/**
	*	Constructeur
	*
	**/
	public function __construct($db)
	{
		$this->db= $db;
	}
	
	
	
	/**
	*	SELECT messageS
	*
	**/
	public function getMessages()
	{
		$message = new Message('Utilisateur', 'Titre du message', 'Description du message');
		
		return array($message, $message);
	}
	
	
	
	/**
	*	SELECT
	*		retourne un message en fonction de l'Id
	*
	**/
	public function getMessage($messageId)
	{
		// SQL
		
		// Variable
		$id = '';
		$auteur = '';
		$titre = '';
		$description = '';
		
		// Création de l'objet
		$forum = new Message();
			$forum->setId('');
			$forum->setDateCreation('');
			$forum->setDateModification('');
			$forum->setAuteur('');
			$forum->setAcl('');
			$forum->setTitre('');
			$forum->setImage('');
			$forum->setParentId('');
			$forum->setNbSujet('');
			$forum->setDernierMessageId('');
			
		
		// return 
		return $forum;
	}
	
	
	
	/**
	*	Sauvegarde l'objet en base de données
	*
	**/
	public function sauvegarder()
	{
		
		return 'Sauvegardé';
	}
	
	
	
	/**
	*	Supprime un objet en base de données
	*
	**/
	public function supprimer($messageId)
	{
		return 'Supprimé';
	}
	
	
	
	/**
	*	Désactive un objet en base de données
	*
	**/
	public function desactiver($messageId)
	{
		return 'desactivé';
	}
	
}