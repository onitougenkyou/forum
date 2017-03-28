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
	public function __construct(CConnexion $db)
	{
		$this->db = $db;
	}
	
	
	
	/**
	*	SELECT forumS
	*		Renvoi la liste des forums
	*
	* @param		limitStart	index de démarrage des résultats
	* @param 	limitNb		Nombre de résultat a afficher
	* @return	retourne un tableau de résultat
	**/
	public function getForums($parent = null, $limitStart = 0, $limitNb = 0)
	{
		// Init
		$forums = array();
		
		// Création de la requête SQL
		$sql = 'SELECT `id`, 
						`date_creation`,
						`date_modification`,
						`auteur`,
						`acl`,
						`titre`,
						`description`,
						`parent_id`,
						`nb_sujet`,
						`dernier_message_id`,
						`affichage`,
						`image_id`
				FROM `forums`';
				
		// Envoi de la requête & récupération
		$result = $this->db->bddSelect($sql, 0);
		
		// Création des objets
		$taille = count($result);
		for($i=0; $i<$taille; $i++) {
			
			// Construction d'un objet Forum
			$forum = new Forum($result[$i]);
			
			// Enregistrement du Forum en tableau d'objet
			$forums[$i] = $forum;
		}
		
		// Renvoi
		return $forums;
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