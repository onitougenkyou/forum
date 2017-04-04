<?php
/**
 * Classe fictive en attendant d'avoir une autentification Viable
 */
include_once 'model/Element.php';
class Personage extends Element
{

  protected static $table = 'personage';
  protected static $primaryKey = 'id';
  /**
  * Déclaration de variables de la classe
  */

  public $id = 0;
  public $userId = 0;
  public $partyId = 0;
  public $name = '';

  /**
  * GETTER AND SETTER
  */
  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getUserId()
  {
    return $this->name;
  }

  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getPartyId()
  {
    return $this->partyId;
  }

  public function setPartyId($partyId)
  {
    $this->partyId = $partyId;
  }

}
