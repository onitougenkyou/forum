<?php
include_once '../login/verif.php';
if (empty($_GET['id']) or !is_numeric($_GET['id'])){
  include '../profil.user/erreur_profil.php';
  include ('../header.html');
}

?>
<<<<<<< HEAD
<div class="infos-profil">
  <h5><?php print($user->data['user_role']); ?></h5>
  <?php print($user->data['user_avatar']); ?><br>
  Email : <?php print($user->data['user_email']); ?> <br>
  Prénom : <?php print($user->data['user_name']); ?><br>
  Nom : <?php print($user->data['user_name_family']); ?><br>
  Date de naissance : <?php print($user->data['user_date']); ?><br>
  Description : <?php print($user->data['user_description']); ?><br>
</div>
=======
<link rel="stylesheet" href="../css/profilvuStyle.css" type="text/css"  />
>>>>>>> 4cc600a8ceb1cbe69b54b3805ab911079f87decd

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
