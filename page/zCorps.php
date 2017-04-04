
<div class="zCorps">
  <div class="block-text">
    <h2 id="gameTitle">Z-Corps</h2>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <img src="http://www.ajdr.org/wp-content/uploads/2012/01/flickr-3297910747-original-1024x747.jpg" class="image Z-corps">
        </div>
        <div class="col-xs-12">
          <p><strong class="game"> Z-Corps </strong> est un jeu d'horreur proposant aux joueurs de faire face à une apocalypse zombie
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
      </div>
      <div class="rpw">
        <div class="col-xs-12">
          <div class="block-Joueur">
            Cette partie à lieu <strong> le samedi </strong> sur une demande de tout les joueurs au MD (Maitre du donjon)
            Joueurs présent dans cette partie :

            <table>
              <tbody>
                <?php foreach(Personage::getList(array('partyId' => 0)) as $joueur) { ?>
                  <tr>
                    <td><?=$joueur->getName()?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

            <form method="post">
              <label>Ajouter un Joueur</label>
              <input type="text" name="ajoutOK">
              <input type="submit" name="Ajout" value="ajout"></br>

              <label>Supprimer un joueur</label>
              <input type="text" name="supprimerOK">
              <input type="submit" name="Supprimer" value="Supprimer"></br>

          </div>
        </div>
      </div>
            <a href="?page=<?php echo Config::getInstance()->get('jdr'); ?>">Retour</br>
    </div>
  </div>
</div>
