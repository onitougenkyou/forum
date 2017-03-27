<?php
//namespace Projet\Forum\Dao;

/**
*
*	Classe Sujet DAO
*		Lien entre les objets et la base de données
*
* @user Cedric
* @date 2017.03.20
**/
class SujetDao
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
	*	SELECT sujetS
	*		Renvoi une liste des sujets
	*
	* @param		limitStart	index de démarrage des résultats
	* @param 	limitNb		Nombre de résultat a afficher
	* @return	retourne un tableau de résultat
	**/
	public function getSujets()
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
						`texte`,
						`affichage`,
						`forum_id`
				FROM `sujets`';
				
		// Envoi de la requête & récupération
		$result = $this->db->bddSelect($sql, 0);
		
		// Création des objets
		$taille = count($result);
		for($i=0; $i<$taille; $i++) {
			
			// Construction d'un objet Forum
			$sujet = new Sujet($result[$i]);
			
			// Enregistrement du Forum en tableau d'objet
			$sujets[$i] = $sujet;
		}
		
		// Renvoi
		return $sujets;
	}
	
	
	
	/**
	*	SELECT
	*		retourne un sujet en fonction de l'Id
	*
	**/
	public function getSujet($sujetId)
	{
		// SQL
		
		// Variable
		$id = '';
		$auteur = '';
		$titre = '';
		$description = '';
		
		// Création de l'objet
		$forum = new Sujet();
			$forum->setId('');
			$forum->setDateCreation('');
			$forum->setDateModification('');
			$forum->setAuteur('');
			$forum->setAcl('');
			$forum->setTitre('');
			$forum->setImage('');
			$forum->setParentId('');
			$forum->setNbSujet('');
			$forum->setDernierSujetId('');
			
		
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
	public function supprimer($sujetId)
	{
		return 'Supprimé';
	}
	
	
	
	/**
	*	Désactive un objet en base de données
	*
	**/
	public function desactiver($sujetId)
	{
		return 'desactivé';
	}
	
}