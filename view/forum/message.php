<div class="message">
	<div class="utilisateur col-md-1 col-xs-1">
	
		<div class="pseudo text-left">
			<?php echo $tplDataMessage['auteur']; ?>
		</div>
		
		<div class="avatar text-center">
			<?php echo $tplDataMessage['avatar']; ?>
			
		</div>
		
	</div>
	<div class="contenu col-md-11 col-xs-11">
	
		<div class="titre text-left">
			<span class="id">#<?php echo $message->getId(); ?></span>
			<span class="titre"><?php echo $message->getTitre(); ?></span>
		</div>
		<div class="texte text-left">
			<p>
				<?php echo $message->getTexte(); ?>
				<br>
				<br>
				dernière modification : <?php echo $tplDataMessage['dateModification']; ?>
			</p>
		</div>
		<div class="lien">
			<div class="dateCreation col-md-11 text-left">
				Date de création : <?php echo $tplDataMessage['dateCreation']; ?>
			</div>
			
			<div class="admin col-md-1 text-left">
				<?php echo $tplDataMessage['admin']; ?>
			</div>
		</div>
		
	</div>
</div>