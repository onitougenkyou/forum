<?php
include_once('../login/verif.php');

$nom = print($user->data['user_name']);
$date = $_POST['date'];
$min = $_POST['min'];
$sec = $_POST['seconde'];       //On récupère le pseudo et on le stocke dans une variable
$message = $_POST['message'];            //On fait de même avec le message
$ligne = $date. 'h '.$min.'m '.$sec.'s '. $nom.' : '.$message.'<br>';     //Le message est créé
$leFichier = file('chat.txt');             //On lit le fichier ac.htm et on stocke la réponse dans une variable (de type tableau)
array_unshift($leFichier, $ligne);       //On ajoute le texte calculé dans la ligne précédente au début du tableau
file_put_contents('chat.txt', $leFichier); //On écrit le contenu du tableau $leFichier dans le fichier ac.htm
?>
