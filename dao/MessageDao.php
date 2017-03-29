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
	public function __construct(CConnexion $db)
	{
		$this->db= $db;
	}
	
	
	
	/**
	*	SELECT messageS
	*
	**/
	public function getMessages($sujetId)
	{
		// Création de la requête SQL
		$sql = 'SELECT `id`, 
						`date_creation`,
						`date_modification`,
						`auteur`,
						`acl`,
						`titre`,
						`texte`,
						`sujet_id`,
						`affichage`
				FROM `messages`
				WHERE `sujet_id` = :sujetId';
				
		// Préparation de la requête
		$query = $this->db->prepare($sql);
		
		// Bind de l'ID
		$query->bindParam(':sujetId', $sujetId, PDO::PARAM_INT);

		// Execution
		$query->execute();

		// Récupération de l'element a partir de l'objet PDO
		$result = $query->fetchAll();

		// Création des objets
		$taille = count($result);
		for($i=0; $i<$taille; $i++) {
			
			// Construction d'un objet Forum
			$message = new Message($result[$i]);
			
			// Enregistrement du Forum en tableau d'objet
			$messages[$i] = $message;
		}

		// Renvoi
		return $messages;
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