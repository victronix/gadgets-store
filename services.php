<!DOCTYPE html>
<!-- Header Scripts -->
<?php include("./_header.php") ?>
<!-- Header Scripts End -->

<!-- Header & Navigation Start -->
<?php include("./_navbar.php") ?>
<!-- Header & Navigation End -->

<body>
  <section>
    <!-- Start Services Page -->

    <div class="services-page">
      <div class="container">
        <div class="info">
          <h1>Useful resources</h1>
          <p>Take a look at our helpful resources to get a better understanding of what we do here.</p>
        </div>
        <div class="image">
          <figure>
            <img src="./images/service.png">
          </figure>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- End Services Page -->
  </section>
  <section class="c-section">
    <ul class="c-services" style="list-style-type: none">
      <?php include("./_resources.php")?>
    </ul>
  </section>
</body>
<?php include("./_footer.php") ?>

</html>