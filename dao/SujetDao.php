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
	public function getSujets($forumId)
	{
		// Init
		$messages = array();
		
		// Création de la requête SQL
		$sql = 'SELECT `id`, 
						`date_creation`,
						`date_modification`,
						`auteur`,
						`acl`,
						`titre`,
						`texte`,
						`forum_id`,
						`affichage`
				FROM `sujets`
				WHERE `forum_id` = :forumId';
		
		// Préparation de la requête
		$query = $this->db->prepare($sql);
		
		// Bind de l'ID
		$query->bindParam(':forumId', $forumId, PDO::PARAM_INT);

		// Execution
		$query->execute();

		// Récupération de l'element a partir de l'objet PDO
		$result = $query->fetchAll();

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
				FROM `sujets`
				WHERE `id` = :sujetId';
				
		// Préparation de la requête
		$query = $this->db->prepare($sql);
		
		// Bind de l'ID
		$query->bindParam(':sujetId', $sujetId, PDO::PARAM_INT);

		// Execution
		$query->execute();

		// Récupération de l'element a partir de l'objet PDO
		$result = $query->fetchAll();
		
		// Création de l'objet Sujet
		$sujet = new Sujet($result[0]);

		// Renvoi
		return $sujet;
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