<?php
require_once 'verif.php';

if($user->is_loggedin()!="")
{
  $user->redirect('home.php');
}

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);

if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
  // tell the user something went wrong
}

if(isset($_POST['btn-signup']))
{
  $uname = trim($_POST['txt_uname']);
  $umail = trim($_POST['txt_umail']);
  $upass = trim($_POST['txt_upass']);

  if($uname=="") {
    $error[] = "Entrez un pseudo";
  }
  elseif (strlen($uname) < 2) {
    $error[] = "Pseudo trop court";
  }
  elseif (preg_match("#[^\w\s]+#", $uname)) {
    $error[] = "Pseudo non valide";
  }
  else if($umail=="") {
    $error[] = "Entrez une adresse mail";
  }
  else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
    $error[] = 'Entrez une adresse mail valide';
  }
  else if($upass=="") {
    $error[] = "Entrez un mot de passe";
  }
  elseif ( ! preg_match("~[A-Z]~", $upass) ){
    $error[] = 'Il faut une majuscule';
  }
  elseif ( ! preg_match("~[0-9]~", $upass) ){
   $error[] = 'Il faut un nombre';
  }
  else if(strlen($upass) < 6){
    $error[] = "Le mot de passe doit contenir 6 caractères minimum";
  }
  else
  {
    try
    {
      $stmt = $DB_con->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
      $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
      $row=$stmt->fetch(PDO::FETCH_ASSOC);

      if($row['user_name']==$uname) {
        $error[] = "sorry username already taken !";
      }
      else if($row['user_email']==$umail) {
        $error[] = "sorry email id already taken !";
      }
      else
      {
        if($user->register($fname,$lname,$uname,$umail,$upass))
        {
          $user->redirect('sign-up.php?joined');
        }
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Sign up : cleartuts</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
  <link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
  <div class="container">
    <div class="form-container">
      <form method="post">
        <h2>Sign up.</h2><hr />
        <?php
        if(isset($error))
        {
          foreach($error as $error)
          {
            ?>
            <div class="alert alert-danger">
              <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
            </div>
            <?php
          }
        }
        else if(isset($_GET['joined']))
        {
          ?>
          <div class="alert alert-info">
            <i class="glyphicon glyphicon-log-in"></i> &nbsp; Inscription réussite <a href='index.php'>Connexion</a> ici
          </div>
          <?php
        }
        ?>
        <div class="form-group">
          <label>Votre pseudo :</label>
          <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
        </div>
        <div class="form-group">
          <label>Votre email :</label>
          <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />
        </div>
        <div class="form-group">
          <label>Votre mot de passe :</label>
          <input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
        </div>
        <div class="clearfix"></div><hr />
        <div class="form-group">
          <button type="submit" class="btn btn-block btn-primary" name="btn-signup">
            <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
          </button>
        </div>
        <br />
        <label>Possède un compte ! <a href="index.php">Se connecter</a></label>
      </form>
    </div>
  </div>

</body>
</html>
