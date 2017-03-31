<?php

//$nom = $userRow['user_name'];
$nom = $_POST['nom'];
$date = $_POST['date'];
$min = $_POST['min'];
$message = $_POST['message'];            //On fait de même avec le message
$ligne = $date. ':'.$min.' '. $nom.' : '.$message.'<br>';     //Le message est créé
$leFichier = file('chat.txt');             //On lit le fichier ac.htm et on stocke la réponse dans une variable (de type tableau)
array_unshift($leFichier, $ligne);       //On ajoute le texte calculé dans la ligne précédente au début du tableau
file_put_contents('chat.txt', $leFichier);
?>
