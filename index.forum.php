<?php
ini_set('display_errors', 1);

include('modele/Forum.php');
include('modele/Sujet.php');
include('modele/Message.php');


echo '<h1>Test</h1>';


// 
$auteur = 5;

/**
*	Forum
**/
	$forum = new Forum($auteur, 'Nouveau Forum', 'Description du Forum');

	// Affichage de l'objet
	echo (string)$forum;


/**
*	Sujet
**/
	$sujet = new Sujet($auteur, 'Nouveau sujet', 'Description du sujet', 1);
	
	// Affichage de l'objet
	echo (string)$sujet;


/**
*	Message
**/
	$message = new Message($auteur, 'Nouveau Message', 'Texte du <b>Message</b>', 1);
	
	// Affichage de l'objet
	echo (string)$message;
