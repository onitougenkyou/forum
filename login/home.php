<?php
include_once 'verif.php';
if(!$user->is_loggedin())
{
 $user->redirect('../login.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css"  /> -->
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>Bienvenue - <?php print($userRow['user_email']); ?></title>
</head>

<body>
<?php include ('../header.html'); ?>
<div class="content">
Bienvenue : <?php print($userRow['user_name']); ?>
</div>
<div class="profil-button">
  <a href="../template/profil_vu.php">Accéder à votre profil</a>
</div>
</div>
</body>
</html>
