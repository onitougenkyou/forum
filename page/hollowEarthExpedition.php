<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Hollow Earth Expedition </title>
  </head>
  <body>
    <?php include '../controller/pagesController.php'; ?>
    <?php include ('../header.html'); ?>
    <div class="block-text">
      Hollow Earth Expedition </br><!-- EN ENORME MAGGLE -->
      <img src="https://lh3.googleusercontent.com/proxy/54t3MvwlrK1jBH6qp-cx2ZY4pbRTv6U8ftl8EtNtob6NcSm7uHb3hcsalUx46Y9jXDy-mQeKr2PjgDf36i6mI6t6ENOPH9ovAPSEqod-SkceM0CaNsZxlBRfrCmTxJar457qBrEvQdi7HlgTvJIVzmCagf2k=w512-h254-p" class="image Super Cops"></br>
      <p><strong> Hollow Earth Expedition </strong> est à la base un jeu qui emmène les joueurs à
      l'époque troublée de la grande dépression, à la découverte de terres mystérieuses fourmillant
      de secrets, de monstres... et de nazis !</p>
      <p> Dans l'entre-deux-guerres, au cours d'une expédition au pôle Nord, un groupe de scientifiques tombe
      sur l'une des entrées d'une terre inconnue, The Hollow Earth. Ils y découvrent des espèces mystérieuses
      ou disparues, des ethnies étranges et souvent dangereuses mais aussi les traces d'une civilisation aujourd'hui
      éteinte que les légendes ont retenue sous différents noms, comme Atlantide ou Babylone... </p>
      <p> Quelques années plus tard, une nouvelle expédition se monte et les PJ y sont conviés.
      Mais le secret de The Hollow Earth est bien gardé et entre les sectes mystiques et le nazisme naissant,
      la concurrence est rude. Sans oublier que si, d'un pôle à l'autre en passant par le triangle des Bermudes,
      les entrées sont nombreuses, les sorties le sont beaucoup moins...</p>
      <p> Seulement, en ce qui concerne nos partie, nous nous servons uniquement du support que nous
      propose ce jeu car il est maléable et s'adapte parfaitement au jeux de rôle médiéval fantastique
      dont nous avons l'habitude de jouer.</p>
      <p> Nos parties actuelle basé sur ce support sont "Celtic" un univers qui porte nos personnages
      dans un univers bercé par de nombreuses légendes celte.
      et une autre partie qui nous ammène au monde d'aujourd'hui où ange et démon sont enfermé ... sur terre
      et où il ne fais pas bon vivre quand on est humain !</p>
      Celtic est masterisé par <?php //joueur Jimmy ?> </br>
      Ange et démon est masterisé par <?php //Quentin ?> </br>

    </div>
    <div class="block-Joueur">
      Cette partie à lieu <strong> le Dimanche </strong> selon la partie étant en cours
      Joueurs présent dans cette partie :

      <!-- test -->

      <?php
      $joueur1 = new Joueur();
      $joueur1->setPseudo("jean");
      $joueur2 = new Joueur();
      $joueur2->setPseudo("michel");
      $joueur3 = new Joueur();
      $joueur3->setPseudo("audrey");
      $tableauJoueursZcorps[] = $joueur1;
      $tableauJoueursZcorps[] = $joueur2;
      $tableauJoueursZcorps[] = $joueur3;
      ?>

      <form method="post" action="">
        <label>Ajouter un Joueur</label>
        <input type="text" name="ajoutOK">
        <input type="submit" name="Ajout" value="ajout"></br>
        <?php

          if (isset($_POST["ajoutOK"])) {
            $ajout=$_POST["ajoutOK"];
            ajoutDeJoueur($ajout, $tableauJoueursZcorps);
          }
        ?>
        <label>Supprimer un joueur</label>
        <input type="text" name="supprimerOK">
        <input type="submit" name="Supprimer" value="Supprimer"></br>
        <?php
        if (isset($_POST["supprimerOK"])) {
          $ajout=$_POST["supprimerOK"];
          supprimerJoueur($ajout, $tableauJoueursZcorps);
        }
        ?>
        <?php foreach ($tableauJoueursZcorps as $joueur) { ?>
            <?=$joueur->joueurPseudo?><br>
        <?php } ?>
    </div>
    <a href="Partie.php">Retour</br>
  </body>
</html>
