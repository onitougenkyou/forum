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
	private $var;
	
	/**
	*	Constructeur
	*
	**/
	public function __construct(CConnexion $db, $var)
	{
		$this->db = $db;
		$this->var = $var;
		
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
				include('view/forum/forum.php');
				echo '</li>';
			}
			echo '<ul>';
	
		$tplIndexForum['body'] 	= ob_get_clean();		// Fin de l'interception

		// Initialisation du template
		$tplIndexForum['titre'] 	= 'TitrePageForum';
		
		// Affichage du template
		require_once('template/index.forum.php');
	}
	
}


