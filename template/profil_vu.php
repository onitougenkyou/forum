<?php
include_once '../login/verif.php';
if (empty($_GET['id']) or !is_numeric($_GET['id'])){
  include '../profil.user/erreur_profil.php';
}

?>
<div class="infos-profil">
  <h5><?php print($user->data['user_role']); ?></h5>
  <?php print($user->data['user_avatar']); ?><br>
  Email : <?php print($user->data['user_email']); ?> <br>
  Prénom : <?php print($user->data['user_name']); ?><br>
  Nom : <?php print($user->data['user_name_family']); ?><br>
  Date de naissance : <?php print($user->data['user_date']); ?><br>
  Description : <?php print($user->data['user_description']); ?><br>
</div>

<div class="infos-button">
<button type="button" name="button-infos"><a href="../profil.user/change_infos_user.php">Modification</a></button>
</div>
