<?php
require_once 'login/verif.php';

if($user->is_loggedin()!="")
{
  $user->redirect('login/home.php');
}

if(isset($_POST['btn-login']))
{
  $uname = $_POST['txt_uname_email'];
  $umail = $_POST['txt_uname_email'];
  $upass = $_POST['txt_password'];

  if($user->login($uname,$umail,$upass))
  {
    $user->redirect('login/home.php');
  }
  else
  {
    $error = "Identifiants erronnés";
  }
}
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Connexion : cleartuts</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css"  />
  <link rel="stylesheet" href="login/style.css" type="text/css"  />
  <link href="https://fonts.googleapis.com/css?family=Macondo" rel="stylesheet">
</head>
<body>
  <div class="image-background">
    <img src="imagesForum/spectre.jpeg" class="img-responsive" alt="Spectre">
  </div>

  <div id="connexion" class="container">
    <div id="infoConnexion" class="form-container">
      <form method="post">
        <h2>Connexion.</h2><hr />
        <?php
        if(isset($error))
        {
          ?>
          <div class="alert alert-danger">
            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
          </div>
          <?php
        }
        ?>

        <div class="form-group">
          <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="txt_password" placeholder="Your Password" required />
        </div>
        <div class="clearfix"></div><hr />
        <div class="form-group">
          <button type="submit" name="btn-login" class="btn btn-block btn-primary">
            <i class="glyphicon glyphicon-log-in"></i>&nbsp;Connexion
          </button>
        </div>
        <br />
        <label id="insc">Pas de compte encore <a href="login/sign-up.php">Inscription</a></label>
      </form>
    </div>
  </div>

</body>
</html>
