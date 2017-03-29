<html>
<head>
  <meta charset="UTF-8">
  <title>Chat jQuery</title>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <style type="text/css">
  #conversation {
    width: 300px;
    height: 400px;
    border: black 1px solid;
    background-color: #efecca;
    overflow-x: hidden;
    overflow-y: scroll;
    padding: 5px;
    margin-left: 10px;
  }
  fieldset {
    width: 330px;
    background-color: #e6e2af;
    border: black 1px solid;
  }
  </style>
</head>

<body>
  <?php include ('../header.html'); ?>
  <fieldset>
    <legend>Chat</legend>
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
      var nom = $('#nom').val();
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
