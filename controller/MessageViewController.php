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
	
	private $form;
	
	
	
	/**
	*	Constructeur
	*		Appel les autres constructeurs en fonction des paramètres recu
	**/
	public function __construct()
	{
		$this->form = new Form();
	}
	
	
	
	/*
	*	Get View Message Liste
	*
	*/
	public function getViewMessageListe($data)
	{
		/*
		*	Génération de la liste des forums
		*/
		ob_start();	// Début de l'interception

			$taille = count($data);
			
			//
			
			// Ajout du lien pour ajouter un message
			echo $this->getAjouterMessage();
			
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
	
	
	
	/*
	*	get Ajouter Message
	*		Ajout un lien vers le formulaire d'ajout de message
	*
	*/
	private function getAjouterMessage()
	{
		if(	Request::getInstance()->get('action') != Config::getInstance()->get('ajoutMessage') ) {
			// Affichage du lien
			
			ob_start();	// Début de l'interception
			
				// Création du lien
				$formulaire_lien = '<a href="?page='.Config::getInstance()->get('forums').'&action='.Config::getInstance()->get('ajoutMessage').'&var='.Request::getInstance()->get('var').'">Ajouter un message</a>';
				
				// Le code est inclus dans le template
				include('view/forum/message_lien_form.php');
		
			// Et récupérer dans dataHTML
			$dataHTML = ob_get_clean();		// Fin de l'interception
			
			// Le code HTML est renvoyé au controller
			return $dataHTML;

		} else {
			// Si la page active est celle pour ajouter un lien, on n'affiche pas le lien
			return '';
		}
	}

	
	
	
	/*
	*	get Ajouter Formulaire Message
	*		Inclus le fomulaire d'ajout de message dans le template
	*
	*/
	public function getFormHTML(Form $form)
	{
		/*
		*	Génération de la liste des forums
		*/
		ob_start();	// Début de l'interception
		
			// On récupère le code HTML
			$formulaire = $form->getForm();
			
			// Le code est inclus dans le template
			include('view/forum/formulaire_message.php');
	
		// Et récupérer dans dataHTML
		$dataHTML = ob_get_clean();		// Fin de l'interception
		
		// Le code HTML est renvoyé au controller
		return $dataHTML;

		
	}

	
	
	
	/*
	*	get Formulaire Message
	*		Créer une grande partie du formulaire
	*
	*/
	public function getForm(Form $form, Message $message)
	{
		// Clé utilisé pour savoir si un formulaire a été envoyé
		$cleFormulaire = Config::getInstance()->get('cleFormulaire');
		
		// Ajout ou Modification
		if($message->getSujetId() != 0) {
			// Ajout d'un message 
		
				// SujetId
				$data = array ('type' => 'hidden', 'nomVar' => 'sujetId', 'value' => $message->getSujetId());
				$form->addInput($data);
				Debug::getInstance()->set('debug', __CLASS__,  __FILE__, __LINE__ , ' Ajout d\'un message<br>sujetId = '.$message->getSujetId().'<br>id = '.$message->getId());
			
		} else {
			// Modification d'un message

				// id
				$data = array ('type' => 'hidden', 'nomVar' => 'id', 'value' => $message->getId());
				$form->addInput($data);
				Debug::getInstance()->set('debug', __CLASS__,  __FILE__, __LINE__ , ' Modification d\'un message');
		}

		// Auteur
		$data = array ('label' => 'Auteur',	'type' => 'text', 'nomVar' => 'auteur', 'value' => $message->getAuteur(), 'size' => 20, 'br' => true);
		$form->addInput($data);
		
		// ACL
		// $data = array ('label' => 'ACL',	'type' => 'text', 'nomVar' => 'acl', 'value' => '', 'size' => 20, 'br' => true);
		// $form->addInput($data);
		
		// Titre
		$data = array ('label' => 'Titre',	'type' => 'text', 'nomVar' => 'titre', 'value' => $message->getTitre(), 'size' => 20, 'br' => true);
		$form->addInput($data);
		
		// Texte
		$data = array ('nomVar' => 'texte', 'cols' => 100, 'rows' => 15, 'value' => $message->getTexte(), 'br' => true);
		$form->addTexteArea($data);
		
		// Affichage
		$data = array ('label' => 'Afficher ?', 'type' => 'text', 'nomVar' => 'affichage', 'value' => $message->getAffichage(), 'size' => 20, 'br' => true);
		$form->addInput($data);
		
		// Submit
		$data = array ('type' => 'submit', 'nomVar' => 'envoyer', 'value' => 'Envoyer', 'br' => true);
		$form->addInput($data);
		
		// Hidden
		$data = array ('type' => 'hidden', 'nomVar' => 'formEnvoyer', 'value' => $cleFormulaire, 'br' => true);
		$form->addInput($data);
			
		// Renvoi le formulaire
		return $form;


		
	}

}	
