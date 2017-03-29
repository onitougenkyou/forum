<?php include_once '../login/verif.php';

if(isset($_POST['btn-submit']))
{
  $uname = trim($_POST['txt_uname']);
  $upass = trim($_POST['txt_pass']);
  $unameFamily = trim($_POST['txt_name_family']);
  $umail = trim($_POST['txt_mail']);
  $udate = trim($_POST['txt_date']);
  $udescription = trim($_POST['txt_description']);

// vérif pseudo
  if($uname=="") {
    $error[] = "Entrez un pseudo";
  }
  else if (strlen($uname) < 2) {
    $error[] = "Pseudo trop court";
  }
  else if (preg_match("#[^\w\s]+#", $uname)) {
    $error[] = "Pseudo non valide";
  }

  elseif ($udate == "")
  {
    $udate = $user->data['user_date'];
  }

  // vérif nom
  else if ($unameFamily != "" && preg_match("#[^\w\s]+#", $unameFamily)){
    $error[] = "Nom de famille invalide";
  }

  // vérif description
  else if(strlen($udescription) > 250 || (strlen($udescription) < 2 && strlen($udescription) > 0)){
    $error[] = "Longueur de la description non respecté";
  }

  // vérif mail
  else if($umail=="") {
    $error[] = "Entrez une adresse mail";
  }
  else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
    $error[] = 'Entrez une adresse mail valide';
  }
  // vérif pass
   if($upass!="")
   {
    $user->passChange = true;
    if ( ! preg_match("~[A-Z]~", $upass) )
    {
      $error[] = 'Il faut une majuscule';
    }
    else if ( ! preg_match("~[0-9]~", $upass) )
    {
      $error[] = 'Il faut un nombre';
    }
    else if(strlen($upass) < 6)
    {
      $error[] = "Le mot de passe doit contenir 6 caractères minimum";
    }
  }
  else
  {
    $upass = $user->data['user_pass'];
    $user->passChange = false;
  }
  // else
  // {
  //   try
  //   {
  //     $stmt = $DB_con->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
  //     $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
  //     $row=$stmt->fetch(PDO::FETCH_ASSOC);

      // if($row['user_name']==$uname) {
      //   $error[] = "Ce pseudo est déjà utilisé";
      // }
      // else if($row['user_email']==$umail) {
      //   $error[] = "Cette email est déja utilisé";
      // }
      // else
      // {
      //   if($user->register($fname,$lname,$uname,$umail,$upass))
      //   {
      //     $user->redirect('sign-up.php?joined');
      //   }
      // }
  //   }
  //   catch(PDOException $e)
  //   {
  //     echo $e->getMessage();
  //   }
  // }
  $user->modification($uname,$upass,$unameFamily,$umail,$udate,$udescription );
}

?>

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
    <i class="glyphicon glyphicon-log-in"></i> &nbsp; modification réussites!
  </div>
  <?php
}
?>

<form class="form-info" action="" method="post">
  <label for ="txt_uname">Votre pseudo</label>
  <input type="text" name="txt_uname" value="<?php print($user->data['user_name']); ?>"> <br>

  <label for="txt_pass">Changer de mot de passe</label>
  <input type="password" name="txt_pass" placeholder="Nouveau mot de passe"><br>

  <label for="txt_name_family">Votre nom de famille</label>
  <input type="text" name="txt_name_family" value="<?php print($user->data['user_name_family']); ?>" placeholder="Nom de famille"> <br>

  <label for="txt_mail">Votre email</label>
  <input type="text" name="txt_mail" value="<?php print($user->data['user_email']); ?>"><br>

  <label for="txt_date">Votre date de naissance</label>
  <input type="date" name="txt_date" value="<?php print($user->data['user_date']); ?>" > <br>

  <label for="txt_description">Votre description (250 charactères MAX)</label>
  <textarea name="txt_description" rows="8" cols="80" value="<?php print($user->data['user_description']); ?>"></textarea> <br>

  <input type="submit" name="btn-submit" value="Envoyez">
</form>
