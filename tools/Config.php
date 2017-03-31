<?php

/*
*	Class Config
*		Singleton
*		Pour la récupération de la configuration du site
*
* @user Cedric
* @date 2017.03.18
*/

class Config
{
	
	private $settings = [];
	private static $instance;
	
	
	/**
	*	Constructeur
	*
	**/
	private function __construct()
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
	
	
	
	/**
	*	Set valeur
	*		Stocke des valeurs 
	**/
	public function set($var = '', $valeur = '')
	{
		if($var != ''){
			if( empty($this->settings[$var]) )	$this->settings[$var] = $valeur;
			else								$this->settings[$var] .= $valeur;
		}
	}
}













