<?php
include_once('../login/verif.php');

$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$nom = $userRow['user_name'];
$date = $_POST['date'];
$min = $_POST['min'];
$sec = $_POST['seconde'];       //On récupère le pseudo et on le stocke dans une variable
$message = $_POST['message'];            //On fait de même avec le message
$ligne = $date. 'h '.$min.'m '.$sec.'s '. $nom.' : '.$message.'<br>';     //Le message est créé
$leFichier = file('chat.txt');             //On lit le fichier ac.htm et on stocke la réponse dans une variable (de type tableau)
array_unshift($leFichier, $ligne);       //On ajoute le texte calculé dans la ligne précédente au début du tableau
file_put_contents('chat.txt', $leFichier); //On écrit le contenu du tableau $leFichier dans le fichier ac.htm
?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Chat jQuery</title>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/tchatStyle.css" type="text/css"  />
</head>

<body>
  <?php include ('../header.html'); ?>

  <h1><?php print($user->data['user_name']); ?></h1>
  <fieldset id="cadre">
    <div id="conversation"></div><br />
    <form action="#" method="post">
      <input type="text" id="message" size="27">
      <button type="button" id="envoyer" title="Envoyer">Send</button>
    </form>
  </fieldset>

  <script>
  $(function() {
    afficheConversation();


    $('#envoyer').click(function() {
      var nom = $('#nom').val() ;
      var message = $('#message').val();
      var date = new Date();
      heure = date.getHours();
      min = date.getMinutes();
      seconde = date.getSeconds();
      $.post('', {
        'nom': nom,
        'date': heure, min, seconde,
        'message': message
      }, afficheConversation);
    });

    function longueur() {
      if (  $('#message').val() > 25) {
        return false;
      }

    }

    function afficheConversation() {
      $('#conversation').load('chat.txt');
      $('#message').val('');
      $('#message').focus();
    }

    setInterval(afficheConversation, 600000);
  });
  </script>

</body>
</html>
