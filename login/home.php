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



  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css"  /> -->
  <link rel="stylesheet" href="../css/homeStyle.css" type="text/css"  />
  <title>Bienvenue - <?php print($user->data['user_email']); ?></title>

</head>

<body>
  <?php include ('../header.php'); ?>
  <div class="block-body">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="content">
            Bienvenue : <?php print($user->data['user_name']); ?>
          </div>
        </div>
        <div id="artice" class="row">
          <div class="col-xs-12 col-lg-6">
            <img src="../imagesForum/cavalier.jpg" class="img-responsive" alt="cavalier">
          </div>
          <div class="col-xs-12 col-lg-6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus euismod ligula neque, nec laoreet sapien sagittis sit amet. Donec lobortis dolor sit amet lacus consequat, quis pellentesque ex volutpat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse sapien ipsum, luctus sed convallis quis, condimentum quis orci. Pellentesque ac porta est. Etiam ut ultricies odio. Aenean eleifend ante in felis hendrerit ultrices. Donec nec est velit. Maecenas dapibus nulla eget leo dapibus, at porttitor elit consectetur. Aenean et nunc dapibus velit vulputate auctor. Phasellus justo justo, congue eget leo in, tincidunt feugiat purus.
          </div>
        </div>
      </div>
    </div>
  </body>


  </html>
