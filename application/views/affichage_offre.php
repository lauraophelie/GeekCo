<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des offres</title>
</head>
<body>
    <h2>Liste des offres</h2>
    <table border="1px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Texte</th>
                <th>Date Publication</th>
                <th>Date Fin</th>
                <th>Lieu</th>
                <th>Type</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offres as $offre) { ?>
                <tr>
                    <td><?php echo $offre['id']; ?></td>
                    <td><?php echo $offre['texte']; ?></td>
                    <td><?php echo $offre['datepublication']; ?></td>
                    <td><?php echo $offre['datedefinvalidite']; ?></td>
                    <td><?php echo $offre['idlieu']; ?></td>
                    <td><?php echo $offre['idtypeoffre']; ?></td>
                    <td><a href="<?php echo site_url('offre/Affichage_UpdateOffre/' . $offre['id']); ?>">Modifier</a></td>
                    <td><a href="<?php echo site_url('offre/deleteOffre/' . $offre['id']); ?>">Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="<?php echo site_url('offre/index'); ?>">ajouter un offre</a>
</body>
</html>