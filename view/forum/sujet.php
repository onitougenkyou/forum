<div class="sujet">
	<div class="titre">
		<a href="?page=<?php echo Config::getInstance()->get('forums'); ?>&action=<?php echo Config::getInstance()->get('sujet'); ?>&var=<?php echo $tplDataSujet['id']; ?>">
			<?php echo $tplDataSujet['titre']; ?>
		</a>
	</div>
	<div class="description">
		<?php echo $tplDataSujet['texte']; ?>
	</div>
	<div class="auteur">
		<?php echo $tplDataSujet['auteur']; ?>
	</div>
</div>
