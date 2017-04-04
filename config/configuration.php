<?php
/*
*	Sélection des paramètre de la base de données
*
*/$conf = array();
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

	if($_SERVER['SERVER_ADDR'] == 'localhost')
	{
		$conf = array(
			'host' 		=> 'localhost',
			'dbName' 	=> 'dblogin',
			'user'		=> 'root',
			'pass'		=> ''
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
*	Droit
*
*/
	$droit = array (

		// page
		'Visiteur' 		=> 0,
		'Membre' 		=> 1,
		'Modérateur' 		=> 2,
		'Admin'			=> 3,
		'SuperAdmin' 		=> 4
	);

/*
*	Configuration
*
*/
	$config = array (

		// page
		'cleFormulaire' 		=> '156f4ds6541f5s6df4'
	);

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
			'modifMessage' 		=> 'modifMessage', 	// & var = id Message
			'supprMessage' 		=> 'supprMessage', 	// & var = id Message
		'profilSetting' 			=> 'profilSetting'	,			// ??
		'profil'							=> 'Profil',
		'jdr'									=> 'Jeu_de_role',
		'contact'							=> 'contact',
		'tchat'								=> 'chat',
		'login'								=> 'login',
		'logout'							=> 'logout',
		'hollow'							=> 'HollowEarthExpedition',
		'donjonEtDragon'			=> 'Donjon_Et_Dragon',
		'superCops'						=> 'Super_Cops',
		'zCorps'							=> 'zCorps'
	);



/*
*	Renvoi
*		Tout les tableaux sont enregistré dans $conf
*
*/

	// Concaténation
	$conf = array_merge($conf, $droit);

	// Concaténation
	$conf = array_merge($conf, $config);

	// Concaténation
	$conf = array_merge($conf, $route);

	// Renvoi de la config
	return $conf;
