<?php
/**
*
*	Classe Forum Dao
*		Lien entre les objets et la base de données
*
* @user Cedric
* @date 2017.03.20
**/
class ForumDao
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
	*	SELECT forumS
	*
	**/
	public function getForums()
	{
		$forum = new Forum('1', 'Titre du forum', 'Description du forum');
		
		$tabRetour =  array($forum, $forum);
				
		return $tabRetour;
	}
	
	
	
	/**
	*	SELECT
	*		retourne un forum en fonction de l'Id
	*
	**/
	public function getForum($forumId)
	{
		// SQL
		
		// Variable
		$id = '';
		$auteur = '';
		$titre = '';
		$description = '';
		
		// Création de l'objet
		$forum = new Forum();
			$forum->setId('');
			$forum->setDateCreation('');
			$forum->setDateModification('');
			$forum->setAuteur('');
			$forum->setAcl('');
			$forum->setTitre('');
			$forum->setImage('');
			$forum->setParentId('');
			$forum->setNbSujet('');
			$forum->setDernierForumId('');
			
		
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
	public function supprimer($forumId)
	{
		return 'Supprimé';
	}
	
	
	
	/**
	*	Désactive un objet en base de données
	*
	**/
	public function desactiver($forumId)
	{
		return 'desactivé';
	}
	
}