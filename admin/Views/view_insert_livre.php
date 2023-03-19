<form action="?controller=livre&action=insert_livre" method="post">
    <label for="isbn">ISBN</label>
    <input required id="isbn" type="text" name="isbn" /> <br />
    <label for="titre">Titre</label>
    <input required id="titre" type="text" name="titre" /> <br />
    <label for="theme">Thème</label>
    <input required id="theme" type="text" name="theme" /> <br />
    <label for="nbpages">Nb pages</label>
    <input required id="nbpages" type="text" name="nbpages" />
    <br />
    <label for="format">Format</label>
    <input required id="format" type="text" name="format" /> <br />
    <label for="nom">Nom auteur</label>
    <input required id="nom" type="text" name="nom" /> <br />
    <label for="prenom">Prénom auteur</label>
    <input required id="prenom" type="text" name="prenom" /> <br />
    <label for="editeur">Éditeur</label>
    <input required id="editeur" type="text" name="editeur" /> <br />
    <label for="annee">Année édition</label>
    <input required id="annee" type="text" name="annee" /> <br />
    <label for="prix">Prix</label>
    <input required id="prix" type="text" name="prix" /> <br />
    <label for="langue">Langue</label>
    <input required id="langue" type="text" name="langue" /> <br />
    <input type="submit" value="Ajouter" name="sublivre" />
</form>