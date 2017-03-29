<?php
include_once '../login/verif.php';
if (empty($_GET['id']) or !is_numeric($_GET['id'])){
  include '../profil.user/erreur_profil.php';
  include ('../header.html');
}

$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="../css/profilvuStyle.css" type="text/css"  />

<div class="container profil">
  <div class="row">
    <div class="col-xs-12">
      <div class="infos-profil">
        <h5><?php print($userRow['user_role']); ?></h5>
        <?php print($userRow['user_avatar']); ?><br>
        Email : <?php print($userRow['user_email']); ?> <br>
        Prénom : <?php print($userRow['user_name']); ?><br>
        Nom : <?php print($userRow['user_name_family']); ?><br>
        Date de naissance : <?php print($userRow['user_date']); ?><br>
        Description : <?php print($userRow['user_description']); ?><br>
      </div>
      <div class="infos-button">
        <button id="btn-modif" type="button" name="button-infos"><a href="../profil.user/change_infos_user.php">Modification</a></button>
      </div>
    </div>
  </div>
</div>
