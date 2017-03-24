<?php
/**
 *
 */
class ClassName extends AnotherClass
{

  private $id;
  private $uname;
  private $umail;

  function __construct(argument)
  {
    # code...
  }

  public function __toString(){
    $retour = '';
      $retour = "Utilisateur : ".$this->uname.'<br>';
      $retour = "Email : ".$this->umail.'<br>';
  }

  public function setName($uname){
    $this->uname = $uname;
  }
  public function setUmail($umail){
    $this->umail = $umail;
  }
}


 ?>
