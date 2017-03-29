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
					// Sélection d'un message
					$message = $data[$i];

					// On inclus le template
					include('view/forum/message.php');
				echo '</li>';
			}
			echo '<ul>';
	
		$dataHTML = ob_get_clean();		// Fin de l'interception
		
		return $dataHTML;

	}


}	
