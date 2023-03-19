<form action="?controller=fournisseur&action=raison_sociale" method="post">
    <select name="raison_sociale" id="">
        <option value="" disabled selected>Choisissez la raison sociale</option>
        <?php foreach ($raison_sociale as $r): ?>
            <option value="<?= $r->raison_sociale ?>"><?= $r->raison_sociale ?></option>
        <?php endforeach ?>



    </select>

    <input type="submit" value="Ajouter" />
</form>