<?php
/*
        search - web page with form for user to enter a search
        
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
            Search movies
        </title>
    </head>
    <body>
        <?php
        require "nav.php";
        ?>
        <header class="container-fluid text-center mt-3">
            <h1>Search movies</h1>
        </header>
        <main>
            <!-- The Search Form and Table -->
            <form class="m-0 row" method="post" action="#results">
                <?php
                require "search_script.php";
                ?>
            </form>
        </main>
        <script src="jquery-3.6.0.js"></script>
        <script src="https://kit.fontawesome.com/a9337559c2.js" crossorigin="anonymous"></script>
        <script src="rating-validate.js" async></script>
        
    </body>
</html>
