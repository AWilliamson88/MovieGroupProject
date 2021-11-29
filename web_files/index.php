<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Regular CSS -->
  <link rel="stylesheet" href="style.css">
  <title>Home</title>
  <?php require "nav.php" ?>
</head>

<body>
  <!-- <div class="px-4 text-center hero-image">
  <div class="">
    <h1 class="display-5 fw-bold text-white mt-50">Welcome to Acme Entertainment!</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4 text-light">The place to find our self proclaimed "biggest movie database"</p>
    </div>
  </div>
</div> -->

  <section id="register">
    <div class="hero-banner bg-light py-5">
      <div class="container">
        <div class="row row align-items-center">
          <div class="col-lg-5 offset-lg-1 order-lg-1">
            <img src="./resources/undraw_online_video_re_fou2.svg" class="img-fluid" alt="Movies">
          </div>
          <div class="col-lg-6">
            <h1 class="mt-3">Acme Entertainment</h1>
            <p class="lead text-secondary my-5">Welcome to our self proclaimed "biggest movie database" website. Don't forget to register to our newsletter</p>
            <a href="register.php" class="btn btn-outline-secondary btn-lg border">Register</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section id="search">
    <div class="hero-banner bg-white py-5">
      <div class="container">
        <div class="row row align-items-center">
          <div class="col-lg-5 offset-lg-0 order-lg-0">
            <img src="./resources/undraw_searching_p-5-ux.svg" class="img-fluid" alt="Search">
          </div>
          <div class="col-lg-6">
            <h1 class="mt-3">Search through our database</h1>
            <p class="lead text-secondary my-5">Check out our wide range of movies available!</p>
            <a href="search.php" class="btn btn-outline-secondary btn-lg border">Search</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<?php require "footer.php"?>
</html>
