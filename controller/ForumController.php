<?php

/**
*
*	Classe Sujet
*		Elle contient l'ensemble des suejt d'un forum
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
		
		// Début de l'interception
		ob_start();

			$taille = count($forumListe);
			
			echo '<ul>';
			for($i=0; $i<$taille; $i++)
			{
				echo '<li>';
				$tplForum = $forumListe[$i];
				include('template/forum.php');
				echo '<li>';
			}
			echo '<ul>';
			
			// echo '<pre>';
			// print_r($forumListe);
			// echo '</pre>';
			
		
		
		// Fin de l'interception
		$tplIndexForum['body'] 	= ob_get_clean();
		
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


