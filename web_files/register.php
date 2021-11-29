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

    <section id="search">
        <div class="hero-banner bg-light py-5">
            <div class="container">
                <div class="row row align-items-center">
                    <div class="col-lg-5 offset-lg-1 order-lg-1">
                        <img src="./resources/undraw_lost_online_re_upmy.svg" class="img-fluid large-only" alt="Movies">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="mt-3">Register to our program</h1>
                        <p class="lead text-secondary my-5">Get the latest update from us!</p>
                        <form class="needs-validation" data-toggle="modal" action="" id="registerForm" method="post" novalidate>
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="Enter first name" name="fname" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Enter last name" name="lname" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="newsletterCheck" name="newsletter" value="newsletterYes">
                                <label class="form-check-label" for="newsletterCheck">Register for our newsletter</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="newsflashCheck" name="newsflash" value="newsflashYes">
                                <label class="form-check-label" for="newsflashCheck">Register for our news flash</label>
                            </div>
                            <button type="submit" class="btn btn-outline-secondary btn-lg border my-5">Register</button>

                            <div class="form-unregister my-0">
                                <small><a href="mailto:admin@acmeentertainment.com?subject=Unregister Request">To unregister click here to contact an admin</a></small>
                            </div>
                        </form>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Thank you for registering!</h5>
                                    </div>
                                    <div class="modal-body">
                                        You can always unregister by sending us an email! But for now enjoy your membership!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="location.href='index.php'">Back to home</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <script src="form-validate.js" async></script>
    <script src="jquery-3.6.0.js"></script>
</body>
<?php require "footer.php" ?>

</html>
