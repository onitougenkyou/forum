<?php
//namespace Projet\Forum\Tools;

/**
*
*	Classe de connexion
*		Connexion a la base de données
*
*		Utilisation : 
*			$db = new CConnexion($host, $dnName, $user, $pass);
*			$db = new CConnexion($host, $dnName, $user, $pass);
*
*		A l'ouverture de la connexion, on met un FetchMode par défaut
*		Il est utilisé a connexion
*		A chaque connexion, on vérifie si le fetchmode n'a pas changé
*
*		Avoir un defautFetchMode et un customFetchMode permet de ne pas faire un setFetchMode
*			a chaque requête
*
* @user Cedric
* @date 2017.03.20
**/
// class CConnexion extends PDO						// ERROR01 - $db n'est pas stocké en attribut
class CConnexion
{
	private $host;
	private $dbName;
	private $user;
	private $pass;
	
	private $db;
	
	// Valeur possible : assoc, both, bound, class, into, lazy, named, num, obj
	private $customFetchMode;		// Valeur actuelle
	private $defautFetchMode;		// Défini dans le constructeur, et ne change plus


	/**
	*	Constructeur
	*
	* @param 	host
	* @param 	dbName
	* @param 	user
	* @param 	pass
	* @return 	un objet PDO
	**/
	public function __construct($host='', $dbName='', $user='', $pass='', $defautFetchMode = 'assoc')
	// public function __construct($defautFetchMode = 'assoc')
	{
		$this->host 	= $host;
		$this->dbName = $dbName;
		$this->user 	= $user;
		$this->pass 	= $pass;
		
		// Enregistrement du type de fetch en attribut
		$this->defautFetchMode = $defautFetchMode;		
		
		// Appel du constructeur de PDO
		// parent::__construct(
		$db = new PDO(												// ERROR01 - $db n'est pas stocké en attribut
			'mysql:host='.$this->host.';dbname='.$this->dbName,
			$this->user,
			$this->pass,
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));	// UTF-8 proof
		
		// Niveau des rapports d'erreur
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);						// ERROR01 - $db n'est pas stocké en attribut			
		// $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);					
		
		// Initialise le fetchmode avec la valeur par défaut $this->defautFetchMode
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->getObjetFetchMode($this->defautFetchMode));
		// $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->getObjetFetchMode($this->defautFetchMode));
		
		// Enables emulation of prepared statements
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		// $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		
		$this->db = $db;
	}
	
	
	
	/*
	*	BDD SELECT 
	*		Renvoi le résultat d'une requête, avec ou sans limite
	*		Fonctionnne par page : 0,3 - 1,3 - 2,3
	*		ou en fonction du nombre de résultat souhaité
	*
	*		Récupérer les enregistrements 0, 1, 2
	*			bddSelectLimit($sql, 0, 3)
	*			bddSelectLimit($sql, 3)
	*		Récupérer les enregistrements 15, 16, 17
	*			bddSelectLimit($sql, 5, 3)
	*
	* @param		offset	index de démarrage des résultats
	* @param 	nombre	Nombre de résultat a afficher
	* @return	retourne un tableau de résultat
	*/
	public function bddSelect($sql = '', $offset = 0, $nombre = 0)
	{
		$limitNb = false;
		
		// Création de la LIMIT
		if($nombre == 0){		// On a un seul nombre passé en paramètre
			
			// On demande a partir de l'Offset 0, jusqu'a $nombre
			if($offset != 0) $sql .= 'LIMIT :offset';
	
		} else {				// Deux nombres passé en paramètre
			
			// On demande a partir de l'Offset 0, jusqu'a $nombre
			if(true)	{
				$limitNb = true;		// Pour l'ajout d'un deuxieme bind
				$sql .= 'LIMIT :offset, :nombre';
			}
		}
		
		// Debug 
		// echo 'sql: '.$sql.'<br>offset : '.$offset.'<br>nombre : '.$nombre.'<br>';
		
		// PDO
		// $query = $this->prepare($sql);
		$query = $this->db->prepare($sql);						// ERROR01 - $db n'est pas stocké en attribut
		
		if($nombre != 0) 	$query->bindValue(':offset', 	(int) $offset, PDO::PARAM_INT);		// demande par l'offset X
		if($limitNb)		$query->bindValue(':nombre', 	(int) $nombre, PDO::PARAM_INT);		// Avec une limite 
		
		// Vérification si le mode de résultat à changé
		// if($this->customFetchMode != $this->defautFetchMode)
			// $query = $this->changerFetchMode($query);
		
		if($this->customFetchMode != $this->defautFetchMode)			// ERROR01 - $db n'est pas stocké en attribut
			$query = $this->changerFetchMode($query);					// ERROR01 - $db n'est pas stocké en attribut
		
		// Execution
		$query->execute();
		
		// Récupération de l'element a partir de l'objet PDO
		$result = $query->fetchAll();
		
		// Renvoi
		return $result;
		
		
	}
	
	
	
	/*
	*	Change Fetch Mode
	*		Permet de changer le FetchMode en fonction de $this->customFetchMode
	*		Utilisé dans toute les fonctions qui effectue des requêtes SQL
	*/
	public function changerFetchMode($query)
	{
		// $query->setFetchMode($this->getObjetFetchMode($this->customFetchMode));			// ERROR01 - $db n'est pas stocké en attribut
		$query->setFetchMode($this->getObjetFetchMode($this->customFetchMode));
		return $query;
	}
	
	
	
	/*
	*	Get Objet Fetch Mode
	*		Récupère l'objet fetchMode
	*		ou de $this->customFetchMode
	*/
	private function getObjetFetchMode($mode)
	{
		switch($mode)
		{
			case 'assoc'	:	return PDO::FETCH_ASSOC;	break;
			case 'both'	:	return PDO::FETCH_BOTH;	break;
			case 'bound'	:	return PDO::FETCH_BOUND;	break;
			case 'class'	:	return PDO::FETCH_CLASS;	break;
			case 'into'	:	return PDO::FETCH_INTO;	break;
			case 'lazy'	:	return PDO::FETCH_LAZY;	break;
			case 'named'	:	return PDO::FETCH_NAMED;	break;
			case 'num'	:	return PDO::FETCH_NUM;	break;
			case 'obj'	:	return PDO::FETCH_OBJ;	break;
			default		:	return PDO::FETCH_ASSOC;	break;
		}
	}
	
	
	
	/*
	*	customFetchMode
	*		Valeur possible : assoc, both, bound, class, into, lazy, named, num, obj
	*/
	public function setCustomFetchMode($mode)
	{
		// $this->customFetchMode = $mode;				// ERROR01 - $db n'est pas stocké en attribut
		$this->db->customFetchMode = $mode;
	}
}













