<?php

/**
*
*	Sujet View Controleur
*		Gère la transition entre les variables et les vues
*
* @user Cedric
* @date 2017.03.27
**/
class SujetViewController
{
	
	
	
	/*
	*	Get View Forum Liste
	*		Renvoi le code HTML de la liste des sujets
	*
	*/
	public function getViewSujetListe($data)
	{
		/*
		*	Génération de la liste des forums
		*/
		ob_start();	// Début de l'interception

			$taille = count($data);
			
			echo '<ul>';
			for($i=0; $i<$taille; $i++)
			{
				echo '<li>';
				$sujet = $data[$i];
				include('view/forum/sujet.php');
				echo '</li>';
			}
			echo '<ul>';
	
		$dataHTML = ob_get_clean();		// Fin de l'interception
		
		return $dataHTML;


	}
	
	
	
	/*
	*	Get View Forum Header
	*		Renvoi le lien d'un forum (utile surtout en cas de sous forum)
	*
	*/
	public function getViewSujetHeader($sujet)
	{
	
		$dataHTML = ' / ';
		
		// Si $forum est un objet, on renvoi le titre
		if(is_object($sujet)){
			$dataHTML .= '<a href="?page='.Config::getInstance()->get('forums').'&action='.Config::getInstance()->get('sujet').'&var='.$sujet->getId().'">'.$sujet->getTitre().'</a>';
		}
		
		return $dataHTML;
	}



}	
