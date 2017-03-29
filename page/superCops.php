<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Super Cops </title>
  </head>
  <body>
    <?php include 'controller/pagesController.php'; ?>
    <div class="block-text">
      Super Cops </br><!-- EN ENORME MAGGLE -->
      <img src="http://lejournaldessorties.com/wp-content/uploads/2015/01/Let_s_Be_Cops_review_article_story_large.jpg" class="image Super Cops"></br>
      <p><strong> Z-Corps </strong> est un jeu d'horreur proposant aux joueurs de faire face à une apocalypse zombie
         aux Etats-Unis en 2012. Les auteurs ont souhaité retranscrire l'ambiance des films de zombies
         tels que Dawn of the dead, Diary of the dead, Rec, Bienvenue à Zombieland, ou encore 28 jours
         plus tard et Shaun of the dead.</p>
      <p>Face à cette apocalypse zombie, les joueurs pourront soit incarner des survivants dans une
         Amérique en proie au chaos, soit des membres d'une milice anti-zombie baptisée Z-corps.
         Cette milice, qui donne son nom au jeu, est en fait un groupe armé privé à la solde d'une
         grande entreprise spécialiste de la santé et de l'hygiène nommée One World.
         Le gouvernement américain, ayant le plus grand mal à agir contre l'épidémie, fait appel à
         cette société et à cette milice pour régler le problème.</p>
      <p>Si les joueurs font partie des Z-corps, ils devront enquêter sur l'origine de l'invasion,
         secourir des survivants, composer avec l'armée américaine et bien sûr survivre.
         Au début du jeu, la contamination n'en est qu'à sa sixième semaine, mais petit à petit
         celle-çi devrait évoluer en fonction des actions des joueurs et des suppléments à paraître.</p>
    </div>
    <div class="block-Joueur">
      Cette partie à lieu <strong> le Dimanche </strong> selon la partie étant en cours
      Joueurs présent dans cette partie :

      <!-- test -->

      <?php
      $joueur1 = new Joueur();
      $joueur1->Pseudo("jean");
      $joueur2 = new Joueur();
      $joueur2->Pseudo("michel");
      $joueur3 = new Joueur();
      $joueur3->Pseudo("audrey");
      $tableauJoueursZcorps[] = $joueur1;
      $tableauJoueursZcorps[] = $joueur2;
      $tableauJoueursZcorps[] = $joueur3;
      ?>

      <form method="post">
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
            <?=$joueur->joueur_pseudo?><br>
        <?php } ?>
    </div>
    <a href="Partie.php">Retour</br>
  </body>
</html>
