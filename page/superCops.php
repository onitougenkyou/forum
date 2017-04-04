<<<<<<< HEAD

=======
<div class="superCops">

  <div class="block-text">
    <h2 id='gameTitle'>  Super Cops</h2>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <img src="imagesForum/pagesJdr/pageSuperCops.jpg" class="image Super_Cops">
        </div>
        <div class="col-xs-12">
          <p><strong class="game"> Super Cops </strong> est un jeu d'Investigation/enquète proposant aux joueurs d'entrer dans la police
             aux Etats-Unis (police criminel, Fbi etc...). L'auteur de ce Jeux de rôle a souhaité nous montrer
             nous immerger dans le monde d'aujourd'hui par les yeux de policiers plus ou moins expérimenté
             en quête de l'ordre parmis les citoyens de New York</p>
          <p>Face aux quotidien dans un commissariat, les joueurs pourront incarner un membre des forces de l'ordre
             gradé ou non et devrons résoudre des affaires que le MD nous livrera avec finesse.</p>
          <p>A savoir que ce jeux de rôle prend pour support "monde des ténèbres" et que l'intégralité du jeux à été
             pensée et crée par le MD qui fera jouer ce JDR.</p>
          <p>Cette partie est masterisé par Jimmy.</p>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="block-Joueur">
          Cette partie à lieu <strong> le Dimanche </strong> selon la partie étant en cours
          Joueurs présent dans cette partie :
          <table>
            <tbody>
              <?php foreach(Personage::getList(array('partyId' => 2)) as $joueur) { ?>
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
          </form>
          <form method="post">
            <label>Supprimer un joueur</label>
            <input type="text" name="supprimerOK">
            <input type="submit" name="Supprimer" value="Supprimer"></br>
          </form>
        </div>
      </div>
    </div>
  </div>
    <a href="?page=<?php echo Config::getInstance()->get('jdr'); ?>">Retour</br>
</div>
>>>>>>> 1589736bd9a4adf529d9399a3ba1162e26ae0b45
