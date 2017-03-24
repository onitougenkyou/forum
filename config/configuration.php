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
*	Routes / Pages
*	
*/
	$route = array (
		
		'accueil' 	=> 'Accueil',
		'forums' 	=> 'forums'
	);
	
	
	
/*
*	Renvoi
*	
*/
	// Concaténation
	$conf = array_merge($conf, $route);
	
	// Renvoi de la config
	return $conf;
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	