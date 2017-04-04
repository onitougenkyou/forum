<div class="hollowEarth">
  <div class="block-text">
    <h2 id="gameTitle">Hollow Earth Expedition</h2><!-- EN ENORME MAGGLE -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <img src="imagesForum/pagesJdr/pageHollowEarthExpedition.jpg" class="image Hollow_Earth">
        </div>
        <div class="col-xs-12">
          <p><strong class="game"> Hollow Earth Expedition </strong> est à la base un jeu qui emmène les joueurs à
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
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="block-Joueur">
                      Cette partie à lieu <strong> le Dimanche </strong> selon la partie étant en cours
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


                      <form method="post" action="">
                        <label>Ajouter un Joueur</label>
                        <input type="text" name="ajoutOK">
                        <input type="submit" name="Ajout" value="ajout"></br>
                      </form>
                      <form method="post" action="">
                        <label>Supprimer un joueur</label>
                        <input type="text" name="supprimerOK">
                        <input type="submit" name="Supprimer" value="Supprimer"></br>
                      </form>
                    </div>
                  </div>
                </div>
              <a href="?page=<?php echo Config::getInstance()->get('jdr'); ?>">Retour</br>
