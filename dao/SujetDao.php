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
	public function __construct($db)
	{
		$this->db= $db;
	}
	
	
	
	/**
	*	SELECT sujetS
	*
	**/
	public function getSujets()
	{
		$sujet = new Sujet('Utilisateur', 'Titre du Sujet', 'Description du sujet');

		return array($sujet, $sujet);
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