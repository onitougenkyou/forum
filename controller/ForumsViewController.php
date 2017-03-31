<?php

/**
*
*	Forums View Controleur
*		Gère la transition entre les variables et les vues
*
* @user Cedric
* @date 2017.03.27
**/
class ForumsViewController
{
	
	
	
	/*
	*	Create Page
	*		Créé la page du forum a partir des données HTML présente dans le controleur ForumsController
	*
	*/
	public function CreatePage($dataHTML)
	{
		/*
		*	Génération de la liste des forums
		*/
		ob_start();	// Début de l'interception

			// Titre
			if( !isset($dataHTML['titre']) )			$tplData['titre'] = 'TitrePageMessage';
			else										$tplData['titre']	= $dataHTML['titre'];
			
			// Forum Bandeau
			if( !isset($dataHTML['forums_bandeau']) )	$tplData['forums_bandeau'] = '';
			else										$tplData['forums_bandeau']	= $dataHTML['forums_bandeau'];
			
			// Formulaire
			if( !isset($dataHTML['formulaire']) )		$tplData['formulaire'] = '';
			else										$tplData['formulaire'] = $dataHTML['formulaire'];

			// Body
			if( !isset($dataHTML['body']) )			$tplData['body'] = '';
			else										$tplData['body']	= $dataHTML['body'];
			
			// Debug
			if( !isset($dataHTML['forums_debug']) )		$tplData['forums_debug'] 	= 'coucou';
			else										$tplData['forums_debug']	= $dataHTML['forums_debug'];
			
			// Affichage du template
			require_once('view/forum/forums.php');

		
		$dataHTML = ob_get_clean();		// Fin de l'interception
		
		// Renvoi
		return $dataHTML;
	}
	
	

}	
