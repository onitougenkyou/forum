<div class="forum">
	<?php
		if($tplForum->getImageId() != '')	echo '<img src="'.$tplForum->getImageId().'">';
	?>
	<h2>
		<a href="?page=<?php echo Config::getInstance()->get('forums'); ?>&forum=<?php echo $tplForum->getId(); ?>">
			<?php echo $tplForum->getTitre(); ?>
		</a>
	</h2>
	<p>
		<?php echo $tplForum->getDescription(); ?>
	</p>
</div>