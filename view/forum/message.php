<div class="message">
	<div class="auteur">
		<?php echo $message->getAuteur(); ?>
	</div>
	<div class="message">
		<h2>
			<?php echo $message->getTitre(); ?>
		</h2>
		<p>
			<?php echo $message->getTexte(); ?>
		</p>
	</div>
</div>