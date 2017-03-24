<?php
if (empty($_GET['id']) or !is_numeric($_GET['id'])){
  include 'erreur_profil.php';
} else {
  include '../template/profil_vu.php';
}
 ?>
