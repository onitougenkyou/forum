<?php

/*
*	Class Request
*		Singleton
*		Accès au données GET / POST
*
* @user Cedric
* @date 2017.03.29
*/

class Request
{
	
	private $request = [];
	private static $instance;
	
	
	/**
	*	Constructeur
	*
	**/
	private function __construct()
	{
		// TODO : Ajouter une vérification, les données page & action recu sont-elles présent dans Config ? 
		// TODO : Factoriser via fonction ? 
		
		// Page
		if( isset($_GET['page']) && !empty($_GET['page']) ) {
			$this->request['page'] = $_GET['page'];
		} else {
			$this->request['page'] = '';
		}
		
		// Action
		if( isset($_GET['action']) && !empty($_GET['action']) ) {
			$this->request['action'] = $_GET['action'];
		} else {
			$this->request['action'] = '';
		}
		
		// Var
		if( isset($_GET['var']) && !empty($_GET['var']) ) {
			$this->request['var'] = $_GET['var'];
		} else {
			$this->request['var'] = '';
		}
		
		
	}
	
	
	
	/**
	*	Get Instance
	*		Récupération de l'instance
	*
	**/
	public static function getInstance()
	{
		if(is_null(self::$instance)){
			self::$instance = new Request();	// Création de l'instance si elle n'existe pas
		}
		return self::$instance;
	}
	
	
	
	/**
	*	Get valeur
	*		Récupération des valeurs 
	**/
	public function get($var)
	{
		if( isset($this->request[$var]) && !empty($this->request[$var]) ) {
			// Si la variable a déjà été récupéré (page, action ou var)
			return $this->request[$var];
		} else {
			// Sinon, on récupére a la volé
			// TODO : A sécuriser, htmlspecialchars & Config::getInstance()->get('cleFormulaire') ?
			if( isset($_POST[$var]) && !empty($_POST[$var]) ) {
				return $_POST[$var];
			} else {
				return null;
			}
		}
	}
}













