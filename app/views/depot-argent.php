<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dépôt d'argent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Dépôt d'argent</h2>
                    </div>
                    <div class="card-body">
                        <form action="../controllers/traitement-depot.php" method="POST">
                            <div class="mb-3">
                                <label for="montant" class="form-label">Montant à déposer (€)</label>
                                <input type="number" 
                                       class="form-control" 
                                       id="montant" 
                                       name="montant" 
                                       min="0.01" 
                                       step="0.01" 
                                       required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="methode_paiement" class="form-label">Méthode de paiement</label>
                                <select class="form-select" id="methode_paiement" name="methode_paiement" required>
                                    <option value="">Choisissez une méthode</option>
                                    <option value="carte">MVola</option>
                                    <option value="virement">Orange Money</option>
                                    <option value="paypal">Airtel Money</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Effectuer le dépôt</button>
                                <a href="dashboard.php" class="btn btn-secondary">Retour</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 