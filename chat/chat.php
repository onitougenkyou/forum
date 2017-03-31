<?php include_once '../login/verif.php';
include ('../header.php'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <script src="../Plugin-chat/dist/tools.js"></script>
    <script src="../Plugin-chat/dist/plugin.js"></script>
  </head>
  <body>
    <script type="text/javascript">
    $(document).ready(function(){
      $.chat({$user: '<?php  print($user->data['user_name'])  ?>'}).appendTo(document.body);
    })

    </script>
  </body>
</html>
