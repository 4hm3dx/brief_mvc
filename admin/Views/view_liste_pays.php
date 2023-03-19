<form action="?controller=fournisseur&action=affiche_pays" method="post">
    <select name="pays" id="">
        <option value="" disabled selected>Choisissez le pays</option>
        <?php foreach ($pays as $p): ?>
            <option value="<?= $p->pays ?>"><?= $p->pays ?></option>
        <?php endforeach ?>



    </select>

    <input type="submit" value="Ajouter" />
</form>

<br />

<?php if ($position !== 1): ?>

    <table class='table table-bordered table-responsive-md bg_table'>
        <thead>
            <tr>
                <th>Code</th>
                <th>Raison sociale</th>
                <th>Rue</th>
                <th>Code postal</th>
                <th>Localité</th>
                <th>Pays</th>
                <th>Tel</th>
                <th>Url</th>
                <th>Email</th>
                <th>Fax</th>
            </tr>
        </thead>

        <body>
            <?php foreach ($affiche_pays as $f): ?>
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