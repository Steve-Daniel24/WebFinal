  <?php $title = "Not Found 404"; ?>

    <?php ob_start(); ?>
        <div class="page-title dark-background">
        <div class="container">
            <nav class="breadcrumbs">
            <ol>
                <li><a href="home.php">Back to Home</a></li>
                <!-- <li class="current">Starter Page</li> -->
            </ol>
            </nav>
            <!-- <h1>Starter Page</h1> -->
        </div>
        </div><!-- End Page Title -->

        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Page Not Foud</h2>
            <p>The page you are looking for doesn't exist.</p>
        </div><!-- End Section Title -->
        </section><!-- /Starter Section Section -->
    <?php $content = ob_get_clean(); ?>

<?php require('base.php') ?>
