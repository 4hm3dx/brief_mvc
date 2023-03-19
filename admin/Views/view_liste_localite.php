<form action="?controller=fournisseur&action=affiche_localite" method="post">
    <select name="localite" id="">
        <option value="" disabled selected>Choisissez la localite</option>
        <?php foreach ($localite as $r): ?>
            <option value="<?= $r->localite ?>"><?= $r->localite ?></option>
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
            <?php foreach ($affiche_localite as $f): ?>
                <tr>
                    <td>
                        <?= $f->code_fournisseur ?>
                    </td>
                    <td>
                        <?= $f->raison_sociale ?>
                    </td>
                    <td>
                        <?= $f->rue_fournisseur ?>
                    </td>
                    <td>
                        <?= $f->code_postal ?>
                    </td>
                    <td>
                        <?= $f->localite ?>
                    </td>
                    <td>
                        <?= $f->pays ?>

                    </td>
                    <td>
                        <?= $f->tel_fournisseur ?>
                    </td>
                    <td>
                        <?= $f->url_fournisseur ?>
                    </td>
                    <td>
                        <?= $f->email_fournisseur ?>
                    </td>
                    <td>
                        <?= $f->fax_fournisseur ?>
                    </td>


                </tr>
            <?php endforeach; ?>
        </body>
    </table>
<?php endif; ?>