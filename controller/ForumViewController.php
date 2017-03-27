<?php

/**
*
*	Forums View Controleur
*		Gère la transition entre les variables et les vues
*
* @user Cedric
* @date 2017.03.27
**/
class ForumViewController
{
	
	/*
	*	Get View Forum Liste
	*
	*/
	public function getViewForumListe($data)
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
				$forum = $data[$i];
				include('view/forum/forum.php');
				echo '</li>';
			}
			echo '<ul>';
	
		$dataHTML = ob_get_clean();		// Fin de l'interception
		
		// Renvoi
		return $dataHTML;

	}


}	
