<!DOCTYPE html>
<!-- Header Scripts -->
<?php include("./_header.php") ?>
<!-- Header Scripts End -->

<!-- Header & Navigation Start -->
<?php include("./_navbar.php") ?>
<!-- Header & Navigation End -->
<body>
  <div class="d-lg-flex position-relative">
    <div class="container d-lg-flex align-items-lg-center space-top-2 space-top-md-5 space-lg-0 min-height-lg-100vh">
      <!-- Content -->
      <div class="row w-100">
        <div class="col-lg-5">
          <h1 class="display-4 font-size-md-down-5 mb-3">The Gadgets Revolution</h1>
          <p>
            Global producer and provider of
            <span class="text-primary">
              <strong class="u-text-animation u-text-animation--typing">cutting edge</strong>
            </span>electronic parts and interconnect, sensor, control and micro-chip solutions around the globe.
            <br />
            <br>
          </p>

          <div class="d-flex align-items-center flex-wrap">
            <a class="btn btn-primary btn-wide transition-3d-hover" href="./products.php">See our products</a>
          </div>
        </div>
      </div>
      <!-- End Content -->

      <!-- Background -->
      <div id="SVGMainHero" class="col-lg-9 col-xl-7 d-none d-lg-block position-absolute top-0 right-0 pr-0" style="margin-top: 00px;">
        <figure class="ie-main-hero">
          <img src="./images/_img1.jpg" alt="" style="width: 690px; height: 560px">
        </figure>
      </div>
      <!-- Background -->
    </div>
  </div>
  <!-- partial -->
  <!--- Product Section --->
  <section class="product-section">
    <div class="col-md-12 text-center feature-title">
      <h4>OUR LATEST TECHNOLOGY</h4>
    </div>
    <div class="row">
      <?php
      include("./_technologies.php")
      ?>
    </div>
  </section>
  <!-- Clients Section -->
  <section class="out-clients-section">
    <div class="col-md-12 text-center feature-title">
      <h4>OUR CLIENTS</h4>
    </div>
    <div class="container">
      <ul class="logogrid">
        <li class="logogrid__item">
          <figure>
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Coca-Cola_logo.svg" class="logogrid__img" alt="Coca Cola">
          </figure>
        </li>
        <li class="logogrid__item">
          <figure>
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" class="logogrid__img" alt="Google">
          </figure>
        </li>
        <li class="logogrid__item">
          <figure>
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/26/Spotify_logo_with_text.svg" class="logogrid__img" alt="Spotify">
          </figure>
        </li>
        <li class="logogrid__item">
          <figure>
            <img src="https://upload.wikimedia.org/wikipedia/de/f/f9/Guinness_Logo.svg" class="logogrid__img" alt="Guinness">
          </figure>
        </li>
        <li class="logogrid__item">
          <figure>
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/92/Audi-Logo_2016.svg" class="logogrid__img" alt="Audi">
          </figure>
        </li>
        <li class="logogrid__item">
          <figure>
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a6/Logo_NIKE.svg" class="logogrid__img" alt="Nike">
          </figure>
        </li>
        <li class="logogrid__item">
          <figure>
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg" class="logogrid__img" alt="Netflix">
          </figure>
        </li>
      </ul>
    </div>
  </section>
  <!-- End Clients Section -->
  <!-- Footer Start -->
  <?php include("./_footer.php") ?>
  <!-- Footer End -->
</body>
</html>