<?php
//namespace Projet\Forum\Tools;

/**
*
*	Classe de connexion
*		Connexion a la base de données
*
*		Utilisation : 
*			$db = new CConnexion($host, $dnName, $user, $pass);
*
*			$db = new CConnexion($host, $dnName, $user, $pass);
*
* @user Cedric
* @date 2017.03.20
**/
class CConnexion extends PDO
{
	private $host;
	private $dbName;
	private $user;
	private $pass;


	/**
	*	Constructeur
	*
	* @param 	host
	* @param 	dbName
	* @param 	user
	* @param 	pass
	* @return 	un objet PDO
	**/
	public function __construct($host='', $dbName='', $user='', $pass='')
	{
		$this->host 		= $host;
		$this->dbName 	= $dbName;
		$this->user 		= $user;
		$this->pass 		= $pass;
		
		parent::__construct('mysql:host='.$this->host.';dbname='.$this->dbName, $this->user, $this->pass);
		$this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// always disable emulated prepared statement when using the MySQL driver
		$this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	}
}