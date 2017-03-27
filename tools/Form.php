<?php
//namespace Projet\Forum\Tools;

/**
*
*	Classe Formulaire
*		Connexion a la base de données
*
* @user Cedric
* @date 2017.03.20
**/
class Form
{
	private $html;
	
	public function __construct()
	{
		$this->html = '<form>';
	}
	
	public function addInput($array)
	{
		$strReturn = '';
		if(isset($array['label']) && $array['label'] != '')		$strReturn .= '<label>'.$array['label'].'</label> : ';
		$strReturn .= '<input ';
			if(isset($array['type']) && $array['type'] != '')		$strReturn .= 'type="'.$array['type'].'" ';
			if(isset($array['nomVar']) && $array['nomVar'] != '')		$strReturn .= 'name="'.$array['nomVar'].'" ';
			if(isset($array['value']) && $array['value'] != '')		$strReturn .= 'value="'.$array['value'].'" ';
			if(isset($array['size']) && $array['size'] != '')		$strReturn .= 'size="'.$array['size'].'" ';
		$strReturn .= '>';
		if(isset($array['br']))		if($array['br'])			$strReturn .= '<br> ';
		
		$this->html .=  $strReturn;
	}
	
	public function getForm()
	{
		$this->html .= '</form>';
		return $this->html;
	}
}