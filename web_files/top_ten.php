<?php
/*
        top_ten - web page with list of top ten most searched movies

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
    <!-- chart js -->


    <title>
        Top ten movies
    </title>
</head>

<body>
    <?php
    require "nav.php";
    ?>
    <header class="container-fluid text-center mt-3">
        <h1>Top ten rated movies</h1>
    </header>
    <main>

        <!-- The top 10 chart made with chart.js -->
        <div class="chart-container" style="position: relative; height: 50vh;">
            <canvas id="myChart" aria-label="top 10 chart"></canvas>
        </div>

        <!-- Top 10 Table -->
        <div class="row justify-content-center g-0">
            <div class="col-12 col-sm-12 col-md-10 col-xl-6 pe-0">
                <div id="top-ten-table">
                    <?php
                    require "top_ten_script.php";
                    ?>
                </div>
            </div>
        </div>
    </main>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="chart.bundle.js"></script>
    <script src="movie_chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
