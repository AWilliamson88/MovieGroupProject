<?php
/*
        movie_details - a web page with details for an individual movie

        RAD - 
        Team Name: ICA Designs
        Team Members:
            Ivan Ng
            Caspian Maclean
            Andrew Williamson
        Date: 05/11/2021
        Sprint: One
        Task: Make all the pages responsive.
*/
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Regular CSS -->
        <link rel="stylesheet" href="style.css">
        
        <title>
            Movie details
        </title>
    </head>
    <body>
        <?php
        require "nav.php";
        ?>
        <header class="container-fluid text-center mt-3 mb-3">
            <h1>Movie details</h1>
        </header>
        <main>
            <!-- <div class="details-list "> -->
            <!-- <div class="container"> -->
                <?php
                require "movie_details_script.php";
                ?>
            </div>
        </main>
        <!-- Optional JavaScript : Just in case we need it -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
