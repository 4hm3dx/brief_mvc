Résultat de votre recherche :
<br />


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
        <?php foreach ($commande as $c): ?>
            <tr>
                <td>
                    <?= $c->Id_commande ?>
                </td>
                <td>
                    <?= $c->ISBN ?>
                </td>
                <td>
                    <?= $c->Titre ?>
                </td>
                <td>
                    <?= $c->Nom_auteur ?>
                    <?= $c->Prenom_auteur ?>
                </td>
                <td>
                    <?= $c->raison_sociale ?>
                </td>
                <td>
                    <?= $c->Date_achat ?>

                </td>
                <td>
                    <?= $c->Prix_achat ?>
                </td>
                <td>
                    <?= $c->Nbr_exemplaires ?>
                </td>


            </tr>
        <?php endforeach; ?>
    </body>
</table>