<?php
ini_set('display_errors', 1);

/*
*
*	CONFIGURATION
*
*/
	// Variable du site
	include('config/configuration.php');

	// Tools
	include('tools/Form.php');			// Permet de générer des formulaires HTML
	include('tools/HTTPRequest.php');	// Traite les données recu en GET/POST
	include('tools/GestionErreur.php');	// Gestion des erreurs dans PDO (affichage)
	
	// Connexion
	include('tools/CConnexion.php');
	$db = new CConnexion($config['host'], $config['dbName'], $config['user'], $config['pass']);

	// Objet	
	include('model/Forum.php');
	include('model/Sujet.php');
	include('model/Message.php');

	// DAO des objets
	include('dao/ForumDao.php');
	include('dao/SujetDao.php');
	include('dao/MessageDao.php');

	// Coeur du forum
	include('controller/ForumController.php');


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