<?php

/**
*
*	Forum View Controleur
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
	* @param		array()		$data		Tableau d'objet Forum
	* @return	String		Le code HTML
	*/
	public function getViewForumListe($data)
	{
		$dataHTML = '';
		
		/*
		*	Génération de la liste des forums
		*/
		ob_start();	// Début de l'interception

			$taille = count($data);
			
			echo '<ul class="list-unstyled">';
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
	*	Get View Forum Header
	*		Renvoi le lien du forum ou d'un forum
	*
	* @param		Object/Integer	$forum		Objet Forum ou 0
	* @return	String			Code HTML contenant les liens du bandeau
	*/
	public function getViewForumHeader($forum)
	{
		$dataHTML = '';
		
		// Si $forum est un objet, on renvoi le titre
		if(is_object($forum)){
			// On affiche le lien du forum
			$dataHTML .= '<li class="breadcrumb-item"><a href="?page='.Config::getInstance()->get('forums').'&action='.Config::getInstance()->get('forum').'&var='.$forum->getId().'">'.$forum->getTitre().'</a></li>';
		
		} else {
			// Sinon, on affiche Forum car sans paramètre, on est forcement a la racine
			$dataHTML .= '<li class="breadcrumb-item"><a href="?page='.Config::getInstance()->get('forums').'">Forum</a></li>';
		}

		return $dataHTML;
	}

}	
