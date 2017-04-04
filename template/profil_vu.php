<?php
if (empty($_GET['id']) or !is_numeric($_GET['id'])){
if($user->is_loggedin())
{
?>

<div id="vuProfil"class="container profil">
  <div class="row">
    <div class="col-xs-12">
      <div class="infos-profil">

        <?php print($user->data['user_avatar']); ?><br>
        <label>Email : <?php print($user->data['user_email']); ?> </label> <br>
        <label>Prénom : <?php print($user->data['user_name']); ?></label>  <br>
        <label>Nom : <?php print($user->data['user_name_family']); ?></label> <br>
        <label>Date de naissance : <?php print($user->data['user_date']); ?></label>  <br>
        <label>Description : <?php print($user->data['user_description']); ?></label> <br>
      </div>
      <div class="infos-button">
        <button id="btn-modif" type="button" name="button-infos"><a href="../profil.user/change_infos_user.php">Modification</a></button>
      </div>
    </div>
  </div>
</div>
<?php
}
else
echo "test";
}

 ?>
