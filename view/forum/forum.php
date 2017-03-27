<div class="forum">
	<?php
		if($forum->getImageId() != '')	echo '<img src="'.$forum->getImageId().'">';
	?>
	<h2>
		<a href="?page=<?php echo Config::getInstance()->get('forums'); ?>&forum=<?php echo $forum->getId(); ?>">
			<?php echo $forum->getTitre(); ?>
		</a>
	</h2>
	<p>
		<?php echo $forum->getDescription(); ?>
	</p>
</div>