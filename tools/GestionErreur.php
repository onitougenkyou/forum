<?php
//namespace Projet\Forum\Tools;

/**
*
*	Classe de gestion d'erreur
*		Gère les erreurs PHP et plus
*		set_error_handler(array('GestionErreur', 'ma_methode'));
*
* @user Cedric
* @date 2017.03.20
**/
class GestionErreur
{
	
	/**
	*	Constructeur
	*
	**/
	public function __construct($db)
	{

	}
	
	
	
	/**
	*	ERROR PDO
	*
	* @param no			Type d'erreur, E_USER_NOTICE, E_USER_WARNING, E_USER_ERROR
	* @param str		Message d'erreur
	* @param file		option - le nom du fichier dans laquelle l'erreur a été rencontrée
	* @param line		option - la ligne de l'erreur dans le fichier
	**/
	function erreurPDO($no, $str, $file, $line)
	{
		echo '<p>Erreur ['.$no.'] : '.$str.'<br/>';
		echo 'Survenue dans le fichier : "'.$file.'" à la ligne '.$line.'.</p>';
	}

}