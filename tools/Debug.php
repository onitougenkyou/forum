<?php

/*
*	Class Debug
*		Singleton
*		Affichage des informations de debug
*		Utilisation : Debug::getInstance()->set('CLE', __CLASS__,  __FILE__, __LINE__ , ' MESSAGE');
*
* @user Cedric
* @date 2017.03.18
*/

class Debug
{
	
	private $infos = array();
	private static $instance;
	
	
	/**
	*	Constructeur
	*
	**/
	private function __construct()
	{
		// $this->infos = array();
	}
	
	
	
	/**
	*	Get Instance
	*		Récupération de l'instance
	*
	**/
	public static function getInstance()
	{
		if(is_null(self::$instance)){
			self::$instance = new Debug();	// Création de l'instance si elle n'existe pas
		}
		
		return self::$instance;
	}
	
	
	
	/**
	*	Get valeur
	*		Récupération des valeurs 
	**/
	public function get($var)
	{
		if( isset($this->infos[$var]) && !empty($this->infos[$var]) ){
			return $this->infos[$var];
		} else {
			return null;
		}
	}
	
	
	
	/**
	*	Get valeur
	*		Récupération des valeurs 
	**/
	public function getHTML()
	{
		if( isset($this->infos) && !empty($this->infos) ){
			
			$strRetour = '';
			// Pour chaque valeur ($var), on génére l'HTML
			foreach($this->infos as $key => $value) {
				
				$strRetour .= '<p>';
					$strRetour .= '<b>'.$this->infos[$key]['classe'].'</b><br>';
					$strRetour .= '<b>'.$this->infos[$key]['fichier'].'</b> - '.$this->infos[$key]['ligne'].'<br>';
					$strRetour .= '<b>'.$this->infos[$key]['var'].'</b> : '.$this->infos[$key]['valeur'].'<br>';
				$strRetour .= '</p>';
			}

			// Renvoi de la chaine
			return $strRetour;
			
		} else {
			return null;
		}
	}
	
	
	
	/**
	*	Set valeur
	*		Stocke des valeurs 
	**/
	public function set($var = '', $classe ='', $fichier = '', $ligne = '',$valeur = '')
	{
		// Si on obtient bien quelque chose a enregistrer
		if($var != ''){
			
			$info['var'] = $var;
			$info['classe'] 	= $classe;
			$info['fichier']	= $fichier;
			$info['ligne'] 	= $ligne;
			$info['valeur'] 	= $valeur;
		
			array_push($this->infos, $info);
		}
	}
}













