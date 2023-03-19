<form action="?controller=fournisseur&action=raison_sociale" method="post">
    <select name="raison_sociale" id="">
        <option value="" disabled selected>Choisissez la raison sociale</option>
        <?php foreach ($raison_sociale as $r): ?>
            <option value="<?= $r->raison_sociale ?>"><?= $r->raison_sociale ?></option>
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
            <?php foreach ($affiche_raison as $f): ?>
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