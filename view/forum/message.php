<div class="message">
	<div class="utilisateur">
		<p class="pseudo">
			<?php echo $message->getAuteur(); ?>
		</p>
		
		<div class="avatar">
			<img src="">
		</div>
	</div>
	<div class="contenu">
		<p class="titre">
			<?php echo $message->getTitre(); ?>
		</p>
		<p class="texte">
			<?php echo $message->getTexte(); ?>
		</p>
		<div class="lien">
			<a href="">Modifier</a>
			<a href="">Supprimer</a>
		</div>
	</div>
</div>