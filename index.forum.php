<?php
ini_set('display_errors', 1);

/*
	0	Visiteur
	1	Membre
	2	Modérateur
	3	Admin
	4	SuperAdmin

*/
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
	

	// Connexion à la BDD
	require_once('tools/CConnexion.php');
	$db = new CConnexion(
		Config::getInstance()->get('host'),
		Config::getInstance()->get('dbName'),
		Config::getInstance()->get('user'),
		Config::getInstance()->get('pass')
	);
