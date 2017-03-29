<?php
ini_set('display_errors', 1);

function checkDroit()
{
	return true;
}

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
	$db = new CConnexion(
		Config::getInstance()->get('host'),
		Config::getInstance()->get('dbName'), 
		Config::getInstance()->get('user'),
		Config::getInstance()->get('pass')
	);
	// $db = new CConnexion();



	// DEBUG
	set_error_handler(array('GestionErreur', 'erreurPDO'));

	
/*
*	Traitement des GET
*
*/
	if( isset($_GET['page']) && !empty($_GET['page']) )	$page = $_GET['page'];
	else												$page = '';


/*
*
*	Corps
*
*/

		
	// Affichage du menu 
	// 	Pourquoi pas via le template ? 
	require_once('view/site/menu.php');
	
	/*
	*	Appel des controller en fonction de ?page=
	*/
	switch($page)
	{
		case Config::getInstance()->get('accueil')		:	require_once('page/accueil.php');	break;
		case Config::getInstance()->get('forums')		:	require_once('page/forums.php');	break;
		default										:	require_once('page/accueil.php');	break;
	}
	

	echo '<h2>Debug</h2>';
	if(isset($page))		echo 'page : '.$page.'<br>';
	if(isset($action))	echo 'action : '.$action.'<br>';





