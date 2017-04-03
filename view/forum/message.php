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
			<a href="?page=<?php echo Config::getInstance()->get('forums'); ?>&action=<?php echo Config::getInstance()->get('modifMessage'); ?>&var=<?php echo $message->getId(); ?>">Modifier</a>
			<a href="?page=<?php echo Config::getInstance()->get('forums'); ?>&action=<?php echo Config::getInstance()->get('supprMessage'); ?>&var=<?php echo $message->getId(); ?>">Supprimer</a>
		</div>
	</div>
</div>