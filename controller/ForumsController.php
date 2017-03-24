<?php

/**
*
*	Forums Controleur
*		Controleur de la partie Forum du site
*
* @user Cedric
* @date 2017.03.23
**/
class ForumsController
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
	*	Affichage de la liste des forums
	*
	**/
	public function afficherForums()
	{
		// Controleur Forums
		$fC = new ForumController($this->db);
		
		// Affichage de la liste du forum
		$fC->afficherListeForums();
	}
	
}