<?php

	if(isset($_GET['action']) && !empty($_GET['action']))	$action = $_GET['action'];
	else												$action = '';
	if(isset($_GET['var']) && !empty($_GET['var']))		$var = $_GET['var'];
	else												$var = '';

	
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
	require_once('controller/ForumController.php');
	require_once('controller/SujetController.php');
	require_once('controller/MessageController.php');

	// Vues du forum
	require_once('controller/ForumsViewController.php');
	require_once('controller/ForumViewController.php');
	require_once('controller/SujetViewController.php');
	require_once('controller/MessageViewController.php');


	// Création du controller & envoi de l'action
	$fsC = new ForumsController($db, $action, $var);
	
	// Gère l'appel des pages du controller
	$fsC->getPageController();
	
	// Affichage
	echo $fsC->getHTML();
	














