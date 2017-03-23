<?php
if(!isset($article['titre']))	$article['titre'] = 'Titre d\'article';
if(!isset($article['texte']))	$article['texte'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquet sem quis nisi facilisis condimentum. Aliquam erat volutpat. Sed commodo fringilla tempus. In sed dictum nunc. Suspendisse a sem vel libero imperdiet congue nec at turpis. Aenean tincidunt tortor libero. Sed tempus vestibulum porta. Cras ac sapien at tellus cursus lacinia placerat vitae ligula. Morbi bibendum sed dui sed auctor. In hac habitasse platea dictumst. Mauris porta, sem a pretium luctus, mi felis euismod lectus, vitae congue orci odio a justo. Suspendisse maximus lacus sed ipsum euismod, nec rutrum nibh ullamcorper. Donec rhoncus, eros sed vulputate mattis, ex dui auctor libero, eu varius elit nibh eget velit. Donec sit amet justo vel ipsum facilisis fringilla. Pellentesque eget porttitor erat. ';


?><article class="article form">
	<div class="inner">

		<h2>
			<?php echo $article['titre']; ?>
		</h2>
		<p>
			<?php echo $article['texte']; ?>
		</p>
	</div>
</article>				
