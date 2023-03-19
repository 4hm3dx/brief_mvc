Résultat de votre recherche :
<br />


<table class='table table-bordered table-responsive-md bg_table'>
    <thead>
        <tr>
            <th>Code fournisseur</th>
            <th>Raison sociale</th>
            <th>Rue</th>
            <th>Code postal</th>
            <th>Localité</th>
            <th>Pays</th>
            <th>Tel</th>
            <th>Url</th>
            <th>Email</th>
            <th>Fax</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($fournisseur as $f): ?>
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
                <td>
                    <?= "<a href='?controller=fournisseur&action=retrieve_fournisseur&id=" . $f->Id_fournisseur . "'>Modifier</a> " ?>
                </td>
                <td>
                    <?= "<a href='?controller=fournisseur&action=delete_fournisseur&id=" . $f->Id_fournisseur . "'>Supprimer</a> " ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>