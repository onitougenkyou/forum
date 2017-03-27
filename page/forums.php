<?php

	if(isset($_GET['action']) && !empty($_GET['action']))	$action = $_GET['action'];
	else												$action = '';
	if(isset($_GET['var']) && !empty($_GET['var']))		$var = $_GET['var'];
	else												$var = '';

	
		


	// Création du controller & envoi de l'action
	$fsC = new ForumsController($db, $action, $var);
	















