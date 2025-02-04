<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmManager Pro - Gestion d'Élevage</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= Flight::get('flight.base_url') ?>public/assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="<?= Flight::get('flight.base_url') ?>">FarmManager Pro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Flight::get('flight.base_url') ?>Animals">Mes Animaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Flight::get('flight.base_url') ?>EtatElevage">Statistiques</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section d-flex align-items-center">
        <div class="container text-center">
            <h1 class="display-3 fw-bold mb-4">FarmManager Pro</h1>
            <p class="lead mb-4">La solution complète pour la gestion de votre élevage</p>
            <a href="<?= Flight::get('flight.base_url') ?>Animals" class="btn btn-success btn-lg me-3">Gérer mes animaux</a>
            <a href="<?= Flight::get('flight.base_url') ?>EtatElevage" class="btn btn-outline-light btn-lg">Voir les statistiques</a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container py-5">
        <h2 class="text-center mb-5">Nos Fonctionnalités</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card h-100 p-4">
                    <div class="card-body text-center">
                        <i class="fas fa-cow feature-icon"></i>
                        <h4 class="card-title">Gestion des Animaux</h4>
                        <p class="card-text">Suivez facilement votre cheptel avec des fiches détaillées pour chaque animal.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100 p-4">
                    <div class="card-body text-center">
                        <i class="fas fa-weight-scale feature-icon"></i>
                        <h4 class="card-title">Suivi de Croissance</h4>
                        <p class="card-text">Surveillez le gain de poids et la croissance de vos animaux.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100 p-4">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line feature-icon"></i>
                        <h4 class="card-title">Statistiques</h4>
                        <p class="card-text">Analysez les performances de votre élevage en temps réel.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number" id="animalCount">0</div>
                        <div class="stat-label">Animaux Gérés</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Satisfaction Client</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Support Disponible</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <div class="container text-center">
            <h2 class="mb-4">Prêt à améliorer la gestion de votre élevage ?</h2>
            <p class="lead mb-4">Commencez dès maintenant à utiliser nos outils professionnels</p>
            <a href="<?= Flight::get('flight.base_url') ?>Animals/ajouterForm" class="btn btn-light btn-lg">Ajouter un animal</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>FarmManager Pro</h5>
                    <p>La solution moderne pour les éleveurs professionnels</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Contact</h5>
                    <p>Email: contact@farmmanager.pro<br>
                    Tél: +33 (0)1 23 45 67 89</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= Flight::get('flight.base_url') ?>public/assets/js/main.js"></script>
</body>
</html> 