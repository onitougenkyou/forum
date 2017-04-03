<?php

ini_set('display_errors', 1);


/*INSERT INTO `forums` (`id`, `date_creation`, `date_modification`, `auteur`, `acl`, `titre`, `description`, `affichage`, `image_id`, `parent_id`, `nb_sujet`, `dernier_message_id`) VALUES
(1, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum01', 'Description01', 1, NULL, NULL, 5, 1),
(2, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum02', 'Description02', 1, NULL, NULL, 5, 2),
(3, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum03', 'Description03', 1, 1, NULL, 5, 3),
(4, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum04', 'Description04', 1, NULL, 1, 5, 4),
(5, '2017-03-22 00:00:00', '2017-03-22 00:00:00', 1, NULL, 'Forum05', 'Description05', 0, NULL, NULL, 5, 5);


INSERT INTO `sujets` (`id`, `date_creation`, `date_modification`, `auteur`, `acl`, `titre`, `texte`, `affichage`, `forum_id`) VALUES
(1, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet01', 'Description01', 1, 1),
(2, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet02', 'Description02', 1, 1),
(3, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet03', 'Description03', 1, 1),
(4, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet04', 'Description04', 0, 1),
(5, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet05', 'Description05', 1, 1),

(11, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet11', 'Description06', 1, 2),
(12, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet12', 'Description07', 1, 2),
(13, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet13', 'Description08', 1, 2),
(14, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet14', 'Description09', 0, 2),
(15, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet15', 'Description10', 1, 2),

(21, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet16', 'Description11', 1, 3),
(22, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet17', 'Description12', 1, 3),
(23, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet18', 'Description13', 1, 3),
(24, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet19', 'Description14', 0, 3),
(25, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet20', 'Description15', 1, 3),

(31, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet21', 'Description16', 1, 4),
(32, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet22', 'Description17', 1, 4),
(33, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet23', 'Description18', 1, 4),
(34, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet24', 'Description19', 0, 4),
(35, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet25', 'Description20', 1, 4),

(36, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet26', 'Description21', 1, 5),
(37, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet27', 'Description22', 1, 5),
(38, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet28', 'Description23', 1, 5),
(39, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet29', 'Description24', 0, 5),
(40, '2017-03-23 00:00:00', '2017-03-23 00:00:00', 1, NULL, 'Sujet30', 'Description25', 1, 5);
/**/

$data = '';
$data .= "DROP TABLE IF EXISTS `messages`;<br>";

$data .= "CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_modification` datetime DEFAULT NULL,
  `auteur` int(11) DEFAULT NULL,
  `acl` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `titre` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `texte` text COLLATE utf8_bin,
  `sujet_id` int(11) DEFAULT NULL,
  `affichage` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;<br>";

$data .= "INSERT INTO `messages` (`id`, `date_creation`, `date_modification`, `auteur`, `acl`, `titre`, `texte`, `sujet_id`, `affichage`) VALUES<br>";


$id = 0;
// Pour 30 sujets

for($i=1; $i<41; $i++){
	
	// On fait 50 sujets
	for($j=0; $j<50; $j++) {
		
		$id++;
		
		// id
		$data .= "(".$id.", ";
		
		// Date Creation
		$data .= "'2017-03-23 00:00:00', ";
		
		// Date Modification
		$data .= "'2017-03-23 00:00:00', ";
		
		// Auteur
		$data .= "1, ";
		
		// acl 
		$data .= "NULL, ";
		
		// Titre
		$data .= "'Message".$id."', ";
		
		// Texte
		$data .= "'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam molestie auctor. Cras ac orci in felis vestibulum semper eu vitae elit. Donec quis mauris nisl. Maecenas at felis at enim interdum molestie.',";
		
		// sujet_id
		$data .= $i.", ";
		
		// affichage
		if($id % 3 == 0) 	$data .= "0";
		else				$data .= "1";
		
		$data .= "),<br>";
	}
}


$data = substr($data,0,-1).';';


echo $data;