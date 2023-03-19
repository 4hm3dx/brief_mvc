<?php foreach ($fournisseuret as $f): ?>
    <form action="?controller=fournisseur&action=edit_fournisseur&id=<?= $f->Id_fournisseur; ?>" method="post">

        <label for="codef">Code fournisseur</label>
        <input id="codef" type="text" name="codef" value="<?= $f->code_fournisseur ?>" /> <br />
        <label for="raison">Raison sociale</label>
        <input id="raison" type="text" name="raison" value="<?= $f->raison_sociale ?>" /> <br />
        <label for="theme">Rue du fournisseur</label>
        <input id="rue" type="text" name="rue" value="<?= $f->rue_fournisseur ?>" /> <br />
        <label for="codep">Code postal</label>
        <input id="codep" type="text" name="codep" value="<?= $f->code_postal ?>" />
        <br />
        <label for="localite">Localite</label>
        <input id="localite" type="text" name="localite" value="<?= $f->localite ?>" /> <br />
        <label for="pays">Pays</label>
        <input id="pays" type="text" name="pays" value="<?= $f->pays ?>" /> <br />
        <label for="telf">Téléphone</label>
        <input id="telf" type="text" name="telf" value="<?= $f->tel_fournisseur ?>" /> <br />
        <label for="url">Url</label>
        <input id="url" type="text" name="url" value="<?= $f->url_fournisseur ?>" /> <br />
        <label for="mail">Email</label>
        <input id="mail" type="text" name="mail" value="<?= $f->email_fournisseur ?>" /> <br />
        <label for="fax">Fax</label>
        <input id="fax" type="text" name="fax" value="<?= $f->fax_fournisseur ?>" /> <br />

        <div class="submit">
            <input type="submit" value="Ajouter" name="subeditf" />
        </div>
    </form>
<?php endforeach; ?>