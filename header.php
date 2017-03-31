<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Macondo" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/headStyle.css" type="text/css"  />
  <script src="../Plugin-chat/dist/tools.js"></script>
  <script src="../Plugin-chat/dist/plugin.js"></script>
    <link rel="stylesheet" href="../css/tchat.css" type="text/css"  />
    <link rel="stylesheet" href="../css/profilVuStyle.css" type="text/css"  />

</head>
<body>

  <div class="head-picture">
    <img src="../imagesForum/demon.jpg" class ="img-responsive" alt="demon">
  </div>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Menu réduit pour responsive -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" id="btn-Menu" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../page/partie.php"><label id="jdr">JDR</label></a></li>
              <li><a href="#"><label id="forum">Forum</label></a></li>
              <li><a href="facebook.com"><label id="facebook">Facebook</label></a></li>
              <li><a href="#"><label id="contact">contactez</label></a></li>
            </ul>
          </li>
          <li><a href="../login/home.php" id ="home">Accueil</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a id="profil" href="../template/profil_vu.php"> Profil</a></li>
          <li><a id ="btn-logout" class="navbar-brand deco" href="logout.php?logout=true">logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div id = "crane">
    <img src="../imagesForum/navbar/tete.png" class="img-responsive" alt="crane">
  </div>

  <!-- <div id= "coloneD">
    <img src="../imagesForum/colone.png" class="img-responsive" alt="Colonne">
  </div>
  <div id="coloneG">
    <img src="../imagesForum/colone.png" class="img-responsive" alt="Colonne">
  </div> -->

  <script type="text/javascript">
$(document).ready(function(){
  $.chat().appendTo(document.body);
})

</script>
</body>
</html>
