<?php

if(!isset($tplIndexForum['titre']))	$tplIndexForum['titre'] = 'Titre de page';
if(!isset($tplIndexForum['body']))	$tplIndexForum['body'] = 'Corps de page';


?><!DOCTYPE html>
<html>
	<head>
		<title>
			<?php echo $tplIndexForum['titre']; ?>
		</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">		
	</head>
	<body>
		
		
		<header class="block-entete">
			<div class="inner">			
				<h2><?php echo $tplIndexForum['titre']; ?></h2>
			</div>
		</header>

		
		
		<nav class="block-nav">
				<div class="inner">
				<header>
					<nav class="menu">
							<ul>
								<li><a href="">Home</a></li>
								<li><a href="">Parties</a></li>
								<li><a href="">Forum</a></li>
								<li><a href="">Login</a></li>
							</ul>
					</nav>
				</header>
			</div>
		</nav>
			
		<main class="block-centre">
				<div class="inner">
				
					<div class="block-principal">
					<section class="section">
						<div class="forums">
							<?php 
								echo $tplIndexForum['body'];
							?>
						</div>
					</section>
				</div>
			
			</div><!-- fin inner -->
		</main>
					

		<footer class="block-pied">
			<div class="inner">
				
			</div>
		</footer>
			
			
	</body>
</html>