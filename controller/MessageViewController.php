<?php

/**
*
*	Message View Controleur
*		Gère la transition entre les variables et les vues
*
* @user Cedric
* @date 2017.03.27
**/
class MessageViewController
{
		
	
	/*
	*	Get View Message Liste
	*		
	*
	*/
	public function getViewMessageListe($data)
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
				$tplForum = $data;
				include('view/message/mesage.php');
				echo '</li>';
			}
			echo '<ul>';
	
		$tplIndexForum['body'] 	= ob_get_clean();		// Fin de l'interception

		// Initialisation du template
		$tplIndexForum['titre'] 	= 'TitrePageForum';
		
		// Affichage du template
		require_once('view/forum/index.forum.php');

	}


}	
