<!DOCTYPE html>
<html lang="en">
    <head>
      <?php include 'head.php'; ?>
    </head>

    <body>
        <?php include 'header.php'; ?>

        <!-- MAIN SECTION : ITO ILAY MIOVA -->
        <main class="main">
            <?= $content ?>
        </main>

        <?php include 'footer.php'; ?>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>
        
        <!-- Vendor JS Files -->
        <script src="assets-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets-pages/vendor/php-email-form/validate.js"></script>
        <script src="assets-pages/vendor/aos/aos.js"></script>
        <script src="assets-pages/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets-pages/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="assets-pages/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets-pages/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets-pages/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets-pages/vendor/swiper/swiper-bundle.min.js"></script>
        
        <!-- Main JS File -->
        <script src="assets-pages/js/main.js"></script>
    </body>
</html>