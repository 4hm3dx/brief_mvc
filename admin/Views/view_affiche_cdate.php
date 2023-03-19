<form action="?controller=commande&action=all_cdate" method="post">
    <select name="acdate" id="">
        <option value="" disabled selected>Choisissez la date</option>
        <?php foreach ($acdate as $r): ?>
            <option value="<?= $r->Date_achat ?>"><?= $r->Date_achat ?></option>
        <?php endforeach ?>



    </select>

    <input type="submit" value="Ajouter" />
</form>

Résultat de votre recherche :
<br />

<?php if ($position !== 1): ?>
    <table class='table table-bordered table-responsive-md bg_table'>

        <head>
            <tr>
                <th>Numéro de commande</th>
                <th>ISBN</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Raison sociale</th>
                <th>Date d'achat</th>
                <th>Prix d'achat</th>
                <th>Nombres d'exemplaires</th>
            </tr>
        </head>

        <body>
            <?php foreach ($tabdate as $ac): ?>
                <tr>
                    <td>
                        <?= $ac->Id_commande ?>
                    </td>
                    <td>
                        <?= $ac->ISBN ?>
                    </td>
                    <td>
                        <?= $ac->Titre ?>
                    </td>
                    <td>
                        <?= $ac->Nom_auteur ?>
                        <?= $ac->Prenom_auteur ?>
                    </td>
                    <td>
                        <?= $ac->raison_sociale ?>
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