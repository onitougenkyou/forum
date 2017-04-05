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
			
			echo '<ul class="list-unstyled">';
			for($i=0; $i<$taille; $i++)
			{
				$sujet = $data[$i];
					
				// Auteur (id = auteur)
				if($sujet->getAuteur() != null ) { 
					$tplDataSujet['auteur'] 				= $sujet->getAuteur()['user_name'];
				} else {
					$tplDataSujet['auteur']				= '1';
				}
				
				
				$tplDataSujet['id'] 				= $sujet->getId();
				$tplDataSujet['dateCreation'] 		= $sujet->getDateCreation();
				$tplDataSujet['dateModification'] 	= $sujet->getDateModification();
				$tplDataSujet['titre'] 			= $sujet->getTitre();
				$tplDataSujet['texte'] 			= $sujet->getTexte();
				$tplDataSujet['avatar']			= $sujet->getAuteur()['user_avatar'];
				
				
				
				echo '<li>';
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
		$dataHTML = '';
		
		// Si $forum est un objet, on renvoi le titre
		if(is_object($sujet)){
			$dataHTML .= '<li class="breadcrumb-item"><a href="?page='.Config::getInstance()->get('forums').'&action='.Config::getInstance()->get('sujet').'&var='.$sujet->getId().'">'.$sujet->getTitre().'</a></li>';
		}
		
		return $dataHTML;
	}



}	
