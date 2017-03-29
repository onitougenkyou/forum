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
      $.post('donneesChat.php', {
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
