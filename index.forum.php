<?php
ini_set('display_errors', 1);

function checkDroit($int = 1)
{
	if($int = 1)	return true;
	else			return false;
}

/*
*
*	CONFIGURATION
*
*/
	// Variable du site
	require_once('tools/Config.php');
	require_once('tools/Request.php');			// Traitement des Get/Post

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

	// DEBUG
	set_error_handler(array('GestionErreur', 'erreurPDO'));

	
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
	switch(Request::getInstance()->get('page'))
	{
		case Config::getInstance()->get('accueil')		:	require_once('page/accueil.php');	break;
		case Config::getInstance()->get('forums')		:	require_once('page/forums.php');	break;
		default										:	require_once('page/accueil.php');	break;
	}




















