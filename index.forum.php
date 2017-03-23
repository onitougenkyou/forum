<?php
ini_set('display_errors', 1);

/*
*
*	CONFIGURATION
*
*/
	// Variable du site
	require_once('config/configuration.php');

	// Tools
	require_once('tools/Form.php');			// Permet de générer des formulaires HTML
	require_once('tools/HTTPRequest.php');		// Traite les données recu en GET/POST
	require_once('tools/GestionErreur.php');	// Gestion des erreurs dans PDO (affichage)
	
	// Connexion à la BDD
	require_once('tools/CConnexion.php');
	$db = new CConnexion($config['host'], $config['dbName'], $config['user'], $config['pass']);

	// Objet	
	require_once('model/Forum.php');
	require_once('model/Sujet.php');
	require_once('model/Message.php');

	// DAO des objets
	require_once('dao/ForumDao.php');
	require_once('dao/SujetDao.php');
	require_once('dao/MessageDao.php');

	// Coeur du forum
	require_once('controller/ForumController.php');


	// DEBUG
	set_error_handler(array('GestionErreur', 'erreurPDO'));



/*
*
*	Corps
*
*/
	// Création du controller
	$fC = new ForumController($db);
	
	// Affichage de la liste du forum
	$fC->afficherListeForums();