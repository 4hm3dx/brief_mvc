<form action="?controller=livre&action=affiche_auteur" method="post">
    <select name="auteur" id="">
        <option value="" disabled selected>Choisissez l'auteur</option>
        <?php foreach ($auteur as $a): ?>
            <option value="<?= $a->Nom_auteur ?>     <?= $a->Prenom_auteur ?>"><?= $a->Nom_auteur ?>     <?= $a->Prenom_auteur ?>
            </option>
        <?php endforeach ?>
    </select>
    <input type="submit" value="Afficher" />
</form>

<br />

<?php if ($position !== 1): ?>

    <table class='table table-bordered table-responsive-md bg_table'>
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Titre</th>
                <th>Thème</th>
                <th>Nombre de page</th>
                <th>Format</th>
                <th>Auteur</th>
                <th>Editeur</th>
                <th>Année d'édition</th>
                <th>Prix</th>
                <th>Langue</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($affiche_auteur as $l): ?>
                <tr>
                    <td>
                        <?= $l->ISBN ?>
                    </td>
                    <td>
                        <?= $l->Titre ?>
                    </td>
                    <td>
                        <?= $l->Theme ?>
                    </td>
                    <td>
                        <?= $l->Nb_pages ?>
                    </td>
                    <td>
                        <?= $l->Format ?>
                    </td>
                    <td>
                        <?= $l->Nom_auteur ?>
                        <?= $l->Prenom_auteur ?>
                    </td>
                    <td>
                        <?= $l->Editeur ?>
                    </td>
                    <td>
                        <?= $l->Annee ?>
                    </td>
                    <td>
                        <?= $l->Prix ?>
                    </td>
                    <td>
                        <?= $l->Langue ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>