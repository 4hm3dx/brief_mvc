<form action="?controller=commande&action=all_cafournisseur" method="post">
    <select name="acfournisseur" id="">
        <option value="" disabled selected>Choisissez la raison sociale</option>
        <?php foreach ($acfournisseur as $r): ?>
            <option value="<?= $r->Id_fournisseur ?>"><?= $r->raison_sociale ?></option>
        <?php endforeach ?>



    </select>

    <input type="submit" value="Ajouter" />
</form>

Résultat de votre recherche :
<br />

<?php if ($position !== 1): ?>
    <table class='table table-bordered table-responsive-md bg_table'>

        <thead>
            <tr>
                <th>Numéro de commande</th>
                <th>ISBN</th>
                <th>Raison sociale</th>
                <th>Auteur</th>
                <th>Titre</th>
                <th>Date d'achat</th>
                <th>Prix d'achat</th>
                <th>Nombres d'exemplaires</th>
            </tr>
        </thead>

        <body>
            <?php foreach ($tabfournisseur as $ac): ?>
                <tr>
                    <td>
                        <?= $ac->Id_commande ?>
                    </td>
                    <td>
                        <?= $ac->ISBN ?>
                    </td>
                    <td>
                        <?= $ac->raison_sociale ?>
                    </td>
                    <td>
                        <?= $ac->Nom_auteur ?>
                        <?= $ac->Prenom_auteur ?>
                    </td>
                    <td>
                        <?= $ac->Titre ?>
                    </td>
                    <td>
                        <?= $ac->Date_achat ?>

                    </td>
                    <td>
                        <?= $ac->Prix_achat ?>
                    </td>
                    <td>
                        <?= $ac->Nbr_exemplaires ?>
                    </td>


                </tr>
            <?php endforeach; ?>
        </body>
    </table>
<?php endif; ?>