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
	*		
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


}	
