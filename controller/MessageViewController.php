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
	* @param 	array()		$data		Liste d'objets message
	* @return	String		Code HTML
	*/
	public function getViewMessageListe($data, $user)
	{
		
		// Init
		$tplDataMessage['admin'] = '';
		
		/*
		*	Génération de la liste des forums
		*/
		ob_start();	// Début de l'interception

			$taille = count($data);
			
			// Ajout du lien pour ajouter un message
			echo $this->getAjouterMessage($user);
			
			echo '<ul class="list-unstyled">';

			foreach ($data as $value) {

				
				// Sélection d'un message
				$message = $value;
				
				// Vérification des droits

					// Récupération du nom de l'utilisateur du message
					$userNameBDD = $message->getAuteur()['user_name'];
					
					// Récupération du nom de l'utilisateur connecté
					$userNameConnected = 'Invité';
					// $userIdConnected = $user['user_name'];
					
					// Récupération du role de l'utilisateur
					// $userIdRole = $message->getAuteur()['user_role'];
					$userIdRole = Config::getInstance()->get('Modérateur');
					
					// Si l'utilisateur connecté est l'auteur du message ou Modérateur
					if( $userNameBDD == $userNameConnected ) {
						// Affichage du lien de suppression
						$tplDataMessage['admin'] = '<a href="?page='.Config::getInstance()->get('forums').'&action='.Config::getInstance()->get('supprMessage').'&var='.$message->getId().'">Supprimer</a>';
					} else {
						$tplDataMessage['admin'] = '';
					}
					
					// Si l'utilisateur connecté est l'auteur du message
					if( $userNameBDD == $userNameConnected || $user->checkDroit($userIdRole) ) {
						// Affichage du lien de modification
						$tplDataMessage['admin'] = '<a href="?page='.Config::getInstance()->get('forums').'&action='.Config::getInstance()->get('modifMessage').'&var='.$message->getId().'">Modifier</a>';
					} else {
						$tplDataMessage['admin'] .= '';
					}
					
				// Mise en forme des informations de chaque message
				
					// Auteur (id = auteur)
					$tplDataMessage['auteur'] 				= $message->getAuteur()['user_name'];
					$tplDataMessage['dateCreation'] 		= $message->getDateCreation();
					$tplDataMessage['dateModification'] 	= $message->getDateModification();
					$tplDataMessage['titre'] 				= $message->getTitre();
					$tplDataMessage['texte'] 				= $message->getTexte();
					$tplDataMessage['avatar']				= $message->getAuteur()['user_avatar'];

				echo '<li>';
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
	* @param 	array()		$user		Tableau d'information sur l'utilisateur connecté
	* @return	String		Code HTML
	*/
	private function getAjouterMessage($user)
	{
		if(	Request::getInstance()->get('action') != Config::getInstance()->get('ajoutMessage') ) {
			// Affichage du lien
			
			ob_start();	// Début de l'interception
			
				if( $user->checkDroit(Config::getInstance()->get('Membre')) ) {
					// Création du lien
					$formulaire_lien = '<a href="?page='.Config::getInstance()->get('forums').'&action='.Config::getInstance()->get('ajoutMessage').'&var='.Request::getInstance()->get('var').'">Ajouter un message</a>';
					
					// Le code est inclus dans le template
					include('view/forum/message_lien_form.php');
				}

		
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
	* @param 	Object		$form		Objet Form
	* @return	String		Code HTML
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
	* @Param		Object		$form		Objet Form qui est a modifier pour y include des champs
	* @Param		Object		$message		Message a include dans le formulaire dans le cas d'une modification
	* @param 	array()		$user		Tableau d'information sur l'utilisateur connecté
	* @return	Object		Retourne l'objet Form modifié
	*/
	public function getForm(Form $form, Message $message, $user)
	{
		// Clé utilisé pour savoir si un formulaire a été envoyé
		$cleFormulaire = Config::getInstance()->get('cleFormulaire');
		
		// Ajout ou Modification
		if( $message->getSujetId() ) {
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
