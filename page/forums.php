<?php

	if(isset($_GET['action']) && !empty($_GET['action']))	$action = $_GET['action'];
	else												$action = 'vide';

	
	// Création du controller
	$fsC = new ForumsController($db);
	
	// Affichage
	$fsC->afficherForums();