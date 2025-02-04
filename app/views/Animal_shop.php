<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique d'Animaux - FarmManager Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= Flight::get('flight.base_url') ?>public/assets/css/style.css">
</head>
<body>
    <h1>Add Animal to Shop</h1>
    <form action="add_animal_shop" method="post">
        <label for="type_id">Type ID:</label>
        <input type="number" id="type_id" name="type_id" required><br>

    <div class="container py-5">
        <h1 class="mb-4">Boutique d'Animaux</h1>
        
        <div class="row g-4">
            <?php foreach ($animals as $animal): ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($animal->nom) ?></h5>
                            <p class="card-text">
                                Espèce: <?= htmlspecialchars($animal->espece) ?><br>
                                Poids: <?= htmlspecialchars($animal->poids) ?> kg<br>
                                Taille: <?= htmlspecialchars($animal->taille) ?> cm
                            </p>
                            <p class="card-text">
                                <strong>Prix: <?= number_format($animal->price, 2) ?> €</strong>
                            </p>
                            <form action="<?= Flight::get('flight.base_url') ?>shop/buy/<?= $animal->id ?>" method="POST">
                                <button type="submit" class="btn btn-success">Acheter</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<<<<<<< Updated upstream
        <label for="poids_min_vente">Min Sale Weight:</label>
        <input type="number" step="0.01" id="poids_min_vente" name="poids_min_vente" required><br>

        <label for="poids_max">Max Weight:</label>
        <input type="number" step="0.01" id="poids_max" name="poids_max" required><br>

        <label for="prix_vente_kg">Sale Price per Kg:</label>
        <input type="number" step="0.01" id="prix_vente_kg" name="prix_vente_kg" required><br>

        <label for="jours_sans_manger">Days Without Food:</label>
        <input type="number" id="jours_sans_manger" name="jours_sans_manger" required><br>

        <label for="perte_poids_par_jour">Weight Loss per Day:</label>
        <input type="number" step="0.01" id="perte_poids_par_jour" name="perte_poids_par_jour" required><br>

        <input type="submit" value="Add Animal">
    </form>

    <h1>Animal Shop</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type ID</th>
                <th>Poids Actuel (kg)</th>
                <th>Poids Min Vente (kg)</th>
                <th>Poids Max (kg)</th>
                <th>Prix Vente/kg (€)</th>
                <th>Jours Sans Manger</th>
                <th>Perte Poids/jour (kg)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($animals as $animal): ?>
                <tr>
                    <td><?php echo htmlspecialchars($animal['id']); ?></td>
                    <td><?php echo htmlspecialchars($animal['type_id']); ?></td>
                    <td><?php echo htmlspecialchars($animal['poids_actuel']); ?></td>
                    <td><?php echo htmlspecialchars($animal['poids_min_vente']); ?></td>
                    <td><?php echo htmlspecialchars($animal['poids_max']); ?></td>
                    <td><?php echo htmlspecialchars($animal['prix_vente_kg']); ?></td>
                    <td><?php echo htmlspecialchars($animal['jours_sans_manger']); ?></td>
                    <td><?php echo htmlspecialchars($animal['perte_poids_par_jour']); ?></td>
                    <td>
                    <form action="Animalshop_delete" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($animal['id']); ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
=======
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
>>>>>>> Stashed changes
</body>
</html>