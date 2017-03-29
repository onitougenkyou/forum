<?php

if(!isset($tplData['body']))	$tplData['body'] = 'Corps de page';


?>
<div class="forums">
	<div class="forums_bandeau">
		<?php echo $tplData['forums_bandeau']; ?>
	</div>
	<div class="forums_liste">
		<?php echo $tplData['body']; ?>
	</div>
</div>