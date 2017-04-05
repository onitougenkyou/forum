<?php

	/**
	*	SELECT messageS
	*
	* @param	integer			$sujetId	ID du sujet, les messages lié seront affiché
	* @return	array(Forum)	retourne un tableau de résultat
	**/
	public function getMessages($sujetId)
	{
		$messages = array();
		
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
				
		$query = $this->db->prepare($sql);
		$query->bindParam(':sujetId', $sujetId, PDO::PARAM_INT);
		$query->execute();

		$result = $query->fetchAll();

		$taille = count($result);
		for($i=0; $i<$taille-1; $i++) {

			if($result[$i]['affichage'] == 1) {
				$user = new User($this->db);
				$result[$i]['auteur'] = $user->getUser($result[$i]['auteur']);
				if( !is_array($result[$i]['auteur']) ) {
					$result[$i]['auteur'] = $user->getUser(0);
				}
				$message = new Message($result[$i]);
				array_push($messages, $message);
			}
		}
		return $messages;
	}
