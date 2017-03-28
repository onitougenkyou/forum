<?php

	if(isset($_GET['action']) && !empty($_GET['action']))	$action = $_GET['action'];
	else												$action = '';
	if(isset($_GET['var']) && !empty($_GET['var']))		$var = $_GET['var'];
	else												$var = '';

	
		


	// Création du controller & envoi de l'action
	$fsC = new ForumsController($db, $action, $var);
	
	// Gère l'appel des pages du controller
	$tplData['body'] = $fsC->getPageController();

	
	
	
	/*
	*	Partie gérer par le controlleur du site a créer
	*
	*			 |	 |	 |	 |
	*			 |	 |	 |	 |
	*			\./	\./	\./	\./
	*			 °	 °	 °	 °
	*/
	
	// Initialisation du template
	$tplIndexForum['titre'] 	= 'TitrePageMessage';
	
	// Affichage du template
	require_once('view/forum/forums.php');














