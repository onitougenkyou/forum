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
	*		Renvoi le code HTML de la liste des forums
	*
	*/
	public function getViewForumListe($data)
	{
		$dataHTML = '';
		
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

	/*
	*	Get View Forum
	*		Renvoi le code HTML d'un forum
	*		Utilisé pour afficher les infos d'un forum quand on affiche la liste des sujets ou Messages
	*
	*/
	public function getViewForum(Forum $forum)
	{
		$dataHTML = '';
		
		// Début de l'interception
		ob_start();
		
			include('view/forum/forum_bandeau.php');
		
		// Fin de l'interception
		$dataHTML = ob_get_clean();
		return $dataHTML;
	}

}	
