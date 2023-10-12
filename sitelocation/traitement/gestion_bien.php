<?php
require_once '../class/bien.class.php'; // Assurez-vous que le fichier Bien.php est correctement inclus.
// Gestion de l'ajout de bien
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addBien'])) {
    $data = [
        ':nom' => $_POST['nom'],
        ':rue' => $_POST['rue'],
        ':cop' => $_POST['cop'],
            // Récupérez les autres données du formulaire de manière similaire
    ];
    Bien::insertBien($data);
}

// Gestion de la mise à jour d'un bien
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateBien'])) {
    $id = $_POST['id']; // Récupérez l'ID du bien à mettre à jour
    $data = [
        ':nom' => $_POST['nom'],
        ':rue' => $_POST['rue'],
        ':cop' => $_POST['cop'],
            // Récupérez les autres données du formulaire de mise à jour de manière similaire
    ];
    Bien::updateBien($id, $data);
}

// Gestion de la suppression de bien
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteBien'])) {
    $id = $_POST['delete_id']; // Récupérez l'ID du bien à supprimer
    Bien::deleteBien($id);
}

// Récupérer tous les biens depuis la base de données
$biens = Bien::getAllBiens();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gestion des Biens</title>
    </head>
    <body>
        <h1>Liste des Biens</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Rue</th>
                <th>Code Postal</th>
                <!-- Ajoutez d'autres en-têtes de colonnes pour les autres attributs -->
                <th>Actions</th>
            </tr>
            <?php foreach ($biens as $bien) : ?>
                <tr>
                    <td><?= $bien['id_bien'] ?></td>
                    <td><?= $bien['nom_bien'] ?></td>
                    <td><?= $bien['rue_bien'] ?></td>
                    <td><?= $bien['cop_bien'] ?></td>
                    <!-- Affichez d'autres attributs ici -->
                    <td>
                        <form method="post">
                            <input type="hidden" name="delete_id" value="<?= $bien['id_bien'] ?>">
                            <button type="submit" name="deleteBien">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Ajouter un Bien</h2>
        <form method="post">
            <input type="text" name="nom" placeholder="Nom du Bien" required>
            <input type="text" name="rue" placeholder="Adresse" required>
            <input type="text" name="cop" placeholder="Code Postal" required>
            <!-- Ajoutez d'autres champs pour les autres attributs -->
            <button type="submit" name="addBien">Ajouter</button>
        </form>

        <h2>Modifier un Bien</h2>
        <form method="post">
            <input type="text" name="id" placeholder="ID du Bien à mettre à jour" required>
            <input type="text" name="nom" placeholder="Nouveau Nom">
            <input type="text" name="rue" placeholder="Nouvelle Adresse">
            <input type="text" name="cop" placeholder="Nouveau Code Postal">
            <!-- Ajoutez d'autres champs pour les autres attributs à mettre à jour -->
            <button type="submit" name="updateBien">Mettre à jour</button>
        </form>
    </body>
</html>
