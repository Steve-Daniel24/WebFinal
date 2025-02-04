<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal to Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Add Animal to Shop</h1>
    <form action="add_animal_shop" method="post">
        <label for="type_id">Type ID:</label>
        <input type="number" id="type_id" name="type_id" required><br>

        <label for="poids_actuel">Current Weight:</label>
        <input type="number" step="0.01" id="poids_actuel" name="poids_actuel" required><br>

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
</body>
</html>