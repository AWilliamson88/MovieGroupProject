<?php
/*
        search_script - contents of the search form, 
        generated from the database.
        Menu for genre and rating need to come from the database.

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

require "connection_script.php";



?>

        <!-- Title Field -->
            <div class="row mb-3">
                <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label" for="title">Title</label>
                <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                    <input type="text" class="form-control" autofocus name="title" id="title">
                </div>
            </div>
            <!-- Genre Selector -->
                <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label" for="genre">Genre</label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <select name="genre" class="form-select" id="genre">
                            <option value="">(Any)</option>
                            <?php
                            $stmt = $conn->prepare(
                                '
                                SELECT DISTINCT
                                genre
                                FROM
                                `dvd`
                                WHERE
                                1
                                ORDER BY genre;
                                '
                            );
                            $stmt->execute();
                            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                                $genre = $row["genre"];
                                echo "<option>$genre</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            <!-- Rating Selector -->
                <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label" for="rating">Rating</label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <select name="rating" class="form-select" id="rating">
                            <option value="">(Any)</option>
                            <?php
                            $stmt = $conn->prepare(
                                '
                                SELECT DISTINCT
                                    rating
                                FROM
                                    `dvd`
                                WHERE
                                    1
                                ORDER BY rating;
                                '
                            );
                            $stmt->execute();
                            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                                $rating = $row["rating"];
                                echo "<option>$rating</option>";
                            }

                            $conn = null;

                            ?>
                        </select>
                    </div>
                </div>
            <!-- Year Field -->
                <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label" for="movie_year">Year</label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <input type="number" class="form-control" min="1800" max="2099"
                            name="movie_year" id="movie_year">
                    </div>
                </div>
            <!-- Year Field -->
                <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label"></label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <input class="btn btn-outline-secondary btn-lg border"  class="form-control" name="submit" type="submit" value="Search"> 
                    </div>
                </div>
            <!-- If the search form was submitted include the results table. -->
                <?php 
                if (isset($_POST['submit'])) {
                    include 'search_results.php';
                }
                ?>

                
