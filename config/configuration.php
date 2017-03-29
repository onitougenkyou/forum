<?php
/*
*	Sélection des paramètre de la base de données
*	
*/
	if($_SERVER['SERVER_ADDR'] == '10.2.2.37')
	{	
		// Configuration Cédric
		$conf = array(
			'host' 		=> '10.2.2.34',
			'dbName' 	=> 'IMIEforum',
			'user'		=> 'IMIEforum',
			'pass'		=> 'root'
		);

	}

	if($_SERVER['SERVER_ADDR'] == '127.0.0.1')
	{
		$conf = array(
			'host' 		=> '127.0.0.1',
			'dbName' 	=> 'dbName',
			'user'		=> 'login',
			'pass'		=> 'password'
		);
	}

	if($_SERVER['SERVER_ADDR'] == 'Internet Adresse')
	{
		$conf = array(
			'host' 		=> '10.2.2.34',
			'dbName' 	=> 'IMIEforum',
			'user'		=> 'IMIEforum',
			'pass'		=> 'root'
		);
	}


/*
*	Routes
*		Pages=XXXX & action=YYYY & var=ZZZZ
*	
*/
	$route = array (
		
		// page
		'accueil' 		=> 'Accueil',				// Accueil
		'forums' 		=> 'Forums',				// Forums
			'forum' 				=> 'forum',			// Affichage d'un forum	& var = id Forum
			'sujet' 				=> 'sujet', 			// Affichage d'un sujet	& var = id Sujet
			'ajoutForum' 			=> 'ajoutforum',
			'ajoutSujet' 			=> 'ajoutSujet', 		// & var = id Forum
			'ajoutMessage' 		=> 'ajoutMessage', 	// & var = id Sujet
			'modifieMessage' 		=> 'modifieMessage', 	// & var = id Message
		'admin' 			=> 'admin',				// ??
		 
	);
	
	
	
/*
*	Renvoi
*	
*/
	// Concaténation
	$conf = array_merge($conf, $route);
	
	// Renvoi de la config
	return $conf;
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	