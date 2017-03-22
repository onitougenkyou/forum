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
	* @param no		Type d'erreur, E_USER_NOTICE, E_USER_WARNING, E_USER_ERROR
	* @param str		Message d'erreur
	* @param file	option - le nom du fichier dans laquelle l'erreur a été rencontrée
	* @param line	option - la ligne de l'erreur dans le fichier
	**/
	function erreurPDO($no, $str, $file, $line)
	{
		$strReturn = '<p class="erreur">';
			$strReturn .= '<h1>ERREUR !!</h1>';
			$strReturn .= 'Erreur ['.$no.'] =>> <b>'.$str.'</b><br>';
			$strReturn .= 'Survenue dans le fichier : "<b>'.$file.'</b>" à la ligne <b>'.$line.'</b><br>';
			$strReturn .= '<i>Ceci était un message d\'erreur personnalité de PDO via la classe "GestionErreur"</i>';
		$strReturn .= '</p>';
		// Affichage de l'erreur
		echo $strReturn;
	}

}




