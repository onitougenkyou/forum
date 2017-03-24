<?php
ini_set('display_errors', 1);

/*
*
*	CONFIGURATION
*
*/
	// Variable du site
	require_once('config/Config.php');

	// Tools
	require_once('tools/Form.php');			// Permet de générer des formulaires HTML
	require_once('tools/GestionErreur.php');	// Gestion des erreurs dans PDO (affichage)
	
	
	
		
	// Connexion à la BDD
	require_once('tools/CConnexion.php');
	// $db = new CConnexion($config['host'], $config['dbName'], $config['user'], $config['pass']);
	$db = new CConnexion();

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


	// DEBUG
	set_error_handler(array('GestionErreur', 'erreurPDO'));

	
/*
*	Traitement des GET
*
*/
	if( isset($_GET['page']) && !empty($_GET['page']) )	$page = $_GET['page'];
	else												$page = 'vide';


/*
*
*	Corps
*
*/

	require_once('page/menu.php');
	
	switch($page)
	{
		case 'forums'		:	require_once('page/forums.php');	break;
		default			:	require_once('page/accueil.php');	break;
	}
	

	echo '<h2>Debug</h2>';
	if(isset($page))		echo 'page : '.$page.'<br>';
	if(isset($action))	echo 'action : '.$action.'<br>';





