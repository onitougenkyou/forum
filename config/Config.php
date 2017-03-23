<?php

/*
*	Class Config
*		Singleton
*		Pour la récupération de la configuration du site
*
*/

class Config
{
	
	private $settings = [];
	private static $instance;
	
	
	/**
	*	Constructeur
	*
	**/
	public function __construct()
	{
		$this->settings = require_once(dirname(__DIR__).'/config/configuration.php');
		
	}
	
	
	
	/**
	*	Get Instance
	*		Récupération de l'instance
	*
	**/
	public static function getInstance()
	{
		if(is_null(self::$instance)){
			self::$instance = new Config();	// Création de l'instance si elle n'existe pas
		}
		
		return self::$instance;
	}
	
	
	
	/**
	*	Get valeur
	*		Récupération des valeurs 
	**/
	public function get($var)
	{
		if( isset($this->settings[$var]) && !empty($this->settings[$var]) ){
			return $this->settings[$var];
		} else {
			return null;
		}
	}
}













