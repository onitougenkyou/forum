    <script type="text/javascript">
    $(document).ready(function(){
      $.chat({$user: '<?php  print($user->data['user_name'])  ?>'}).appendTo(document.body);
    })

    </script>
