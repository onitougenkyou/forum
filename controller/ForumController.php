<?php

/**
*
*	Forum Controleur
*
*
* @user Cedric
* @date 2017.03.18
**/
class ForumController
{
	private $db;
	
	/**
	*	Constructeur
	*
	**/
	public function __construct($db)
	{
		$this->db = $db;
	}
	
	
	
	/**
	*	Afficher la liste de forums
	*
	**/
	public function afficherListeForums()
	{
		// Instanciation du ForumDao
		$fDao = new ForumDao($this->db);
		
		// Récupération de la liste des forums en tableau d'objet
		$forumListe = $fDao->getForums();
		
		
		
		/*
		*	Génération de la liste des forums
		*/
		
		ob_start();	// Début de l'interception

			$taille = count($forumListe);
			
			echo '<ul>';
			for($i=0; $i<$taille; $i++)
			{
				echo '<li>';
				$tplForum = $forumListe[$i];
				include('template/forum/forum.php');
				echo '<li>';
			}
			echo '<ul>';
	
		$tplIndexForum['body'] 	= ob_get_clean();		// Fin de l'interception

		// Initialisation du template
		$tplIndexForum['titre'] 	= 'TitrePageForum';
		
		// Affichage du template
		include('template/index.forum.php');
	}
	
	
	
	/**
	*	Afficher la liste des sujets d'un forum
	*
	**/
	public function afficherListeSujets($forumId)
	{
		$strRetour = 'Liste des Sujets du forum : '.$forumId;
		
		return $strRetour;
	}
	
	
	
	/**
	*	Afficher la liste des messages d'un sujet
	*
	**/
	public function afficherListeMessages($sujetId)
	{
		$strRetour = 'Liste des Messages du Sujet : '.$sujetId;
		
		return $strRetour;
	}
	
	
	
}


