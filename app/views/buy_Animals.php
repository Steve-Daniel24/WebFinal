<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Animals</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<h1>Buy Animals</h1>
    <table>
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
                    <form action="buy_animal" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($animal['id']); ?>">
                            <button type="submit">Buy</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </body>
</html>
             