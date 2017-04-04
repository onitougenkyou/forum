<?php
//namespace Projet\Forum\Dao;

/**
*
*	Classe Message DAO
*		Lien entre les objets et la base de données
*
* @user Cedric
* @date 2017.03.20
**/
class MessageDao
{
	private $db;
	
	/**
	*	Constructeur
	*
	**/
	public function __construct(CConnexion $db)
	{
		$this->db= $db;
	}
	
	
	
	/**
	*	SELECT messageS
	*
	**/
	public function getMessages($sujetId, $user)
	{
		// Init
		$messages = array();
		
		// Création de la requête SQL
		$sql = 'SELECT `id`, 
						`date_creation`,
						`date_modification`,
						`auteur`,
						`acl`,
						`titre`,
						`texte`,
						`sujet_id`,
						`affichage`
				FROM `messages`
				WHERE `sujet_id` = :sujetId';
				
		// Préparation de la requête
		$query = $this->db->prepare($sql);
		
		// Bind de l'ID
		$query->bindParam(':sujetId', $sujetId, PDO::PARAM_INT);

		// Execution
		$query->execute();

		// Récupération de l'element a partir de l'objet PDO
		$result = $query->fetchAll();

		// Création des objets
		$taille = count($result);
		for($i=0; $i<$taille-1; $i++) {
			
			
			// Si le message doit être affiché
			if($result[$i]['affichage'] == 1) {

				// Récupération des infos utilisateur
				$user = new User($this->db);
				
				// On stocke le tableau des infos utilisateur dans l'attribut Auteur de l'objet Message
				$result[$i]['auteur'] = $user->getUser($result[$i]['auteur']);
				
				// Si l'auteur n'est pas trouvé, on refait une requête ... TODO DEL
				if( !is_array($result[$i]['auteur']) ) {
					$result[$i]['auteur'] = $user->getUser(0);
				}

				// Construction d'un objet Forum
				$message = new Message($result[$i]);
				
				// Enregistrement du Forum en tableau d'objet
				array_push($messages, $message);
			}
		}

		// Renvoi
		return $messages;
	}
	
	
	/**
	*	SELECT
	*		retourne un message en fonction de l'Id
	*
	**/
	public function getMessage($messageId)
	{
		// Création de la requête SQL
		$sql = 'SELECT `id`, 
						`date_creation`,
						`date_modification`,
						`auteur`,
						`acl`,
						`titre`,
						`texte`,
						`affichage`,
						`sujet_id`
				FROM `messages`
				WHERE `id` = :messageId';
		
		// Préparation de la requête
		$query = $this->db->prepare($sql);
		
		// Bind de l'ID
		$query->bindParam(':messageId', $messageId, PDO::PARAM_INT);

		// Execution
		$query->execute();

		// Récupération de l'element a partir de l'objet PDO
		$result = $query->fetchAll();
		
		// Création de l'objet Message
		$message = new Message($result[0]);

		// Renvoi
		return $message;
	}
	
	
	
	/**
	*	SELECT
	*		retourne un id message en fonction de l'Id
	*
	* @return 	L'ID de l'auteur du message
	**/
	public function getMessageAuteur($messageId)
	{
		// Création de la requête SQL
		$sql = 'SELECT `auteur` FROM `messages` WHERE `id` = :messageId';
		
		// Préparation de la requête
		$query = $this->db->prepare($sql);
		
		// Bind de l'ID
		$query->bindParam(':messageId', $messageId, PDO::PARAM_INT);

		// Execution
		$query->execute();

		// Récupération de l'element a partir de l'objet PDO
		$result = $query->fetchAll();
		
		// Création de l'objet Message
		if( isset($result[0]['auteur']) ) {
			$auteurId = $result[0]['auteur'];
		} else {
			$auteurId = 0;
		}
		// Renvoi
		return $auteurId;
	}
	
	
	
	/**
	*	Sauvegarde l'objet en base de données
	*
	**/
	public function addMessage(Message $message)
	{
		// Initialisation
			$id = $message->getId();
			
			// Si c'est un ajout, $ajout = true
			if( $id == '' )		$ajout = true;
			else					$ajout = false;
		
		// SQL
			if( $ajout ) {
				echo 'Ajout ! <br>';
				$message->setDateCreation('CURRENT_DATE()');
			} else {
				echo 'Modification ! <br>';
			}
			
			// Quoi qu'il arrive, c'est une modification
			$message->setDateModification('CURRENT_DATE()');
			
			// Création de la requête SQL
			$sql = "INSERT INTO `messages` (";
			
			// Si c'est un ajout, on enregistre la date de création
			if( $ajout )		$sql .= "		`date_creation`,";
							$sql .= "		`date_modification`,
											`auteur`,
											`acl`,
											`titre`,
											`texte`,
											`sujet_id`,
											`affichage`) 
										VALUES (";
			if( $ajout )		$sql .= "		:dateCreation,";
							$sql .= "		:dateModification,
											:auteur,
											:acl,
											:titre,
											:texte,
											:sujetId,
											:affichage)";
			// Si c'est un ajout, on enregistre la date de création

		// PDO
			// Préparation de la requête
			$query = $this->db->prepare($sql);

			// Bind
			if( $ajout )		$query->bindParam(':dateCreation', $message->getDateCreation, PDO::PARAM_STR);
				$query->bindParam(':dateModification', $message->getDateModification, PDO::PARAM_STR);
				$query->bindParam(':auteur', $message->getAuteur, PDO::PARAM_STR);
				$query->bindParam(':acl', $message->getAcl, PDO::PARAM_STR);
				$query->bindParam(':titre', $message->getTitre, PDO::PARAM_STR);
				$query->bindParam(':texte', $message->getTexte, PDO::PARAM_STR);
				$query->bindParam(':sujetId', $message->getSujetId, PDO::PARAM_STR);
				$query->bindParam(':affichage', $message->getAffichage, PDO::PARAM_STR);

			// Execution
			$query->execute();
			
		/**/
		// Renvoi
		return true;
	}
	
	
	
	/**
	*	Supprime un objet en base de données
	*
	**/
	public function supprimer($messageId)
	{
		// Création de la requête SQL
		$sql = 'DELETE FROM `messages` WHERE `id` = :messageId';
		
		// Préparation de la requête
		$query = $this->db->prepare($sql);
		
		// Bind de l'ID
		$query->bindParam(':messageId', $messageId, PDO::PARAM_INT);

		// Execution
		$query->execute();
	
		// Renvoi
		return 'Supprimé';
	}
	
	
	
	/**
	*	Désactive un objet en base de données
	*
	**/
	public function desactiver($messageId)
	{
		return 'desactivé';
	}
	
}