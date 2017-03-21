<?php
//namespace Projet\Forum\Tools;

/**
*
*	Classe HTTPRequest
*		Traite les données recu dans le post/get
*
* @user Cedric
* @date 2017.03.20
**/
class HTTPRequest
{
	private $html;
	
	public function __construct()
	{
		$this->html = '<form>';
	}
	
	/**
	*	Get Get
	*		Récupère les données recu via GET
	**/
	public function getGet($var)
	{
		// Si la variable existe et n'est pas vide
		if(!isset($_GET[$var]) && !empty($_GET[$var])) {
			return $_GET[$var];
		}
		else
			return '';
		
	}
	
	/**
	*	Get Post
	*		Récupère les données recu via POST
	**/
	public function getPost($var)
	{
		// Si la variable existe et n'est pas vide
		if(!isset($_POST[$var]) && !empty($_POST[$var])) {
			return $_POST[$var];
		}
		else
			return '';
		
	}
	
}