<?php $title = "Document"; ?>

    <?php ob_start(); ?>
      <!-- Hero Section -->
      <section id="hero" class="hero section dark-background">
        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

          <div class="carousel-item active">
            <img src="assets/images/R.jpg" alt="">
            <div class="carousel-container">
              <h2>Welcome to Christmas Wonderland!<br></h2>
              <p>Get into the holiday spirit with our unique gift collection! Whether you're looking for the perfect present or a special surprise, we've got something just for you. Celebrate the season with us and make this Christmas unforgettable!</p>
              <a href="deposit" class="btn-get-started">Make a Deposit</a>
            </div>
          </div>
        </div>
      </section><!-- /Hero Section -->

      <!-- About Section -->
      <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>About</h2>
          <p>About Us<br></p>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
              <p>
                  We created this website to spread the magic of Christmas by allowing users to receive random holiday gifts for their loved ones. Whether you're looking for a present for a boy, girl, or a neutral option, we have you covered with a wide variety of suggested gifts for everyone!
              </p>
              <ul>
                <li><i class="bi bi-check2-circle"></i> <span>Sign up and create your account to get started.</span></li>
                <li><i class="bi bi-check2-circle"></i> <span>Deposit money to fund your gift selection process.</span></li>
                <li><i class="bi bi-check2-circle"></i> <span>Fill out a simple form with the number of boys and girls, then get personalized gift suggestions.</span></li>
              </ul>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>
                  Once you've received your gift list, you can review, approve, or change the suggestions. You can also make sure the total cost doesn't exceed your deposit amount. This ensures you get the perfect Christmas presents, all while staying within your budget. Ready to start spreading the holiday cheer?
              </p>
              <a href="deposit" class="read-more"><span>Make a Deposit</span><i class="bi bi-arrow-right"></i></a>
            </div>

          </div>

        </div>

      </section><!-- /About Section -->
    <?php $content = ob_get_clean(); ?>

<?php require('base.php') ?>