<?php

	// Objet	
	require_once('model/Forum.php');
	require_once('model/Sujet.php');
	require_once('model/Message.php');

	// DAO des objets
	require_once('dao/ForumDao.php');
	require_once('dao/SujetDao.php');
	require_once('dao/MessageDao.php');

	// Coeur du forum
	require_once('controller/ForumsController.php');
	require_once('controller/ForumsPageController.php');
		require_once('controller/ForumController.php');
		require_once('controller/SujetController.php');
		require_once('controller/MessageController.php');

	// Vues du forum
	require_once('controller/ForumsViewController.php');
	require_once('controller/ForumViewController.php');
	require_once('controller/SujetViewController.php');
	require_once('controller/MessageViewController.php');

	// DEBUG
	require_once('tools/GestionErreur.php');	// Gestion des erreurs dans PDO (affichage)
	set_error_handler(array('GestionErreur', 'erreurPDO'));
	
	// Connexion à la BDD
	require_once('tools/CConnexion.php');
	$db = new CConnexion(
		Config::getInstance()->get('host'),
		Config::getInstance()->get('dbName'),
		Config::getInstance()->get('user'),
		Config::getInstance()->get('pass')
	);
	
	// Création du controller & envoi de $action et $var 
	$fsC = new ForumsController($db);
	
	// Génère la page forum a partir du code généré par les différentes vues
	$fsC->createPage($user);
	
	// Affichage
	echo $fsC->getHTML();
	














