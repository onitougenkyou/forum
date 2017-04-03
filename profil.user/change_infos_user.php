<?php
if($user->is_loggedin())
{


if(isset($_POST['btn-submit']))
{
  //var_dump($_POST);
  $uname = trim($_POST['txt_uname']);
  $upass = trim($_POST['txt_upass']);
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

<link rel="stylesheet" href="../css/profilvuStyle.css" type="text/css"  />

<div class="container change-infos">
  <form action="" method="post">
    <div class="form-group row">
      <label for="txt_uname" class="col-sm-2 col-form-label">Votre pseudo</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txt_uname" value="<?php print($user->data['user_name']); ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="txt_upass" class="col-sm-2 col-form-label">Changer de mot de passe</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="txt_upass" placeholder="Mot pas de passe">
      </div>
    </div>
    <div class="form-group row">
      <label for="txt_name_family" class="col-sm-2 col-form-label">Votre nom de famille</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txt_name_family" value="<?php print($user->data['user_name_family']); ?>" placeholder="Votre nom de famille">
      </div>
    </div>
    <div class="form-group row">
      <label for="txt_mail" class="col-sm-2 col-form-label">Votre Email</label>
      <div class="col-sm-10">
        <input type="mail" class="form-control" name="txt_mail" value="<?php print($user->data['user_email']); ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="txt_date" class="col-sm-2 col-form-label">Votre date de naissance</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="txt_date" value="<?php print($user->data['user_date']); ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="txt_description" class="col-sm-2 col-form-label">Votre description (250 charactères MAX)</label>
      <div class="col-sm-10">
        <textarea name="txt_description" rows="8" cols="80" value="<?php print($user->data['user_description']); ?>"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" id="btn-envoi" name="btn-submit">Modifier</button>
      </div>
    </div>
  </form>
</div>
<?php
}
 ?>
