<?php
//namespace Projet\Forum\Tools;

/**
*
*	Classe Formulaire
*		Création d'un formulaire
*
* @user Cedric
* @date 2017.03.20
**/
class Form
{
	private $html;
	private $cible;
	
	public function __construct($cible = '', $methode = 'POST')
	{
		$this->cible 		= $cible;
		$this->html 		= '<form  method="'.$methode.'" action="'.$cible.'"';
	
		$this->html .= '>';
		
	}
	
	
	
	/*
	*	Ajoute un champ input
	*		Les paramètres sont : 
	*			String	label 	: Chaine qui sera devant le champ
	*			String 	type 	: Type d'input
	*			String 	nomVar 	: Nom de la variable
	*			String	value 	: Valeur du champ
	*			String	size 	: Taille du champ
	*			Boolean	br		: Avec ou sans br
	*
	*/
	public function addInput($array)
	{
		// Init
		$strRetour = '';
		
			// Label
			if(isset($array['label']) && $array['label'] != '')		$strRetour .= '<label>'.$array['label'].'</label> : ';
			
			// Input
			$strRetour .= '<input ';
				if(isset($array['type']) 	&& $array['type'] != '')		$strRetour .= 'type="'.$array['type'].'" ';
				if(isset($array['nomVar'])	&& $array['nomVar'] != '')		$strRetour .= 'name="'.$array['nomVar'].'" ';
				if(isset($array['value']) 	&& $array['value'] != '')		$strRetour .= 'value="'.$array['value'].'" ';
				if(isset($array['size']) 	&& $array['size'] != '')		$strRetour .= 'size="'.$array['size'].'" ';
			$strRetour .= '>';
			
			// Br
			if(isset($array['br']))		if($array['br'])			$strRetour .= '<br> ';
		
		// Init
		$this->html .=  $strRetour;
	}
	
	
	
	/*
	*	Ajoute un champ textArea
	*		Les paramètres sont : 
	*			String 	label 		: Chaine qui sera devant le champ
	*			String 	nomVar 		: Nom de la variable
	*			String	cols 		: Nombre de colonne
	*			String 	rows 		: Nombre de ligne
	*			String 	maxlength 	: Nombre maximum de mot
	*
	*/
	public function addTexteArea($array)
	{
		$strRetour = '';
		
			// Label
			if(isset($array['label']) && $array['label'] != '')		$strRetour .= '<label>'.$array['label'].'</label> : ';

			$strRetour .= '<textarea ';
				if(isset($array['nomVar']) 	&& $array['nomVar'] != '')		$strRetour .= 'name="'.$array['nomVar'].'" ';
				if(isset($array['cols']) 		&& $array['cols'] != '')		$strRetour .= 'cols="'.$array['cols'].'" ';
				if(isset($array['rows']) 		&& $array['rows'] != '')		$strRetour .= 'rows="'.$array['rows'].'" ';
				if(isset($array['maxlength']) 	&& $array['maxlength'] != '')	$strRetour .= 'maxlength="'.$array['maxlength'].'" ';
			$strRetour .= '>';
				
				// Valeur du textarea
				if(isset($array['value']) 		&& $array['value'] != '')		$strRetour .= $array['value'];
				
			$strRetour .= '</textarea>';
			
			// Br
			if(isset($array['br']))		if($array['br'])			$strRetour .= '<br> ';


		$this->html .= $strRetour;
	}
	
	
	
	/*
	*	Get Form
	*		Récupération du formulaire
	*
	*/
	public function getForm()
	{
		$this->html .= '</form>';
		return $this->html;
	}
}