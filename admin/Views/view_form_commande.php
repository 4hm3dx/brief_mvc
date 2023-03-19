<form action="?controller=commande&action=insert_commande" method="post">
    <label for="isbn">ID livre</label>
    <select name="selectl" id="">
        <option value="" disabled selected>Titre</option>
        <?php foreach ($livre as $r): ?>
            <option value="<?= $r->Id ?>"><?= $r->Titre ?></option>
        <?php endforeach ?>

    </select>
    <br />
    <label for="titre">Fournisseur</label>
    <select name="selectf" id="">
        <option value="" disabled selected>Raison sociale</option>
        <?php foreach ($fournisseur as $r): ?>
            <option value="<?= $r->Id_fournisseur ?>"><?= $r->raison_sociale ?></option>
        <?php endforeach ?>

    </select>
    <br />
    <label for="date">Date d'achat</label>
    <input required type="date" name="date" /> <br />
    <label for="prix">Prix</label>
    <input required id="prix" type="text" name="prix" />
    <br />
    <label for="nbr">Nombre d'exemplaires</label>
    <input required id="nbr" type="text" name="exemp" /> <br />


    <input type="submit" value="Ajouter" name="subcommande" />
</form>