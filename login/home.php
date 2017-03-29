<?php


include_once 'verif.php';
if(!$user->is_loggedin())
{
 $user->redirect('../login.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>Bienvenue - <?php print($user->data['user_email']); ?></title>
</head>

<body>

<div class="header">
    <div class="right">
     <label><a href="logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
    </div>
</div>
<div class="content">
Bienvenue : <?php print($user->data['user_name']); ?>
</div>
<div class="profil-button">
  <a href="../template/profil_vu.php">Accéder à votre profil</a>
</div>
</div>
</body>
</html>
