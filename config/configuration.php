<?php

/*
*	Sélection des paramètre de la base de données
*/
if($_SERVER['SERVER_ADDR'] == '10.2.2.37')
{
	// Configuration Cédric
	$config['host'] 		= '10.2.2.34';
	$config['dbName'] 	= 'IMIEforum';
	$config['user']		= 'IMIEforum';
	$config['pass']		= 'root';

}

if($_SERVER['SERVER_ADDR'] == '127.0.0.1')
{
	$config['host'] 		= '127.0.0.1';
	$config['dbName'] 	= 'dbName';
	$config['user']		= 'login';
	$config['pass']		= 'password';

}

if($_SERVER['SERVER_ADDR'] == 'Internet Adresse')
{
	$config['host'] 		= '10.2.2.34';
	$config['dbName'] 	= 'IMIEforum';
	$config['user']		= 'IMIEforum';
	$config['pass']		= 'root';

}
