<div class="sujet">
	<h2>
		<a href="?page=<?php echo Config::getInstance()->get('forums'); ?>&action=<?php echo Config::getInstance()->get('sujet'); ?>&var=<?php echo $sujet->getId(); ?>">
			<?php echo $sujet->getTitre(); ?>
		</a>
	</h2>
	<p>
		<?php echo $sujet->getTexte(); ?>
	</p>
</div>