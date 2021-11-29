<?php
/*
        movie_details_script - display details for an individual movie

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

if (array_key_exists('id', $_GET)) {
    $id = $_GET["id"];
} else {
    echo "Invalid request: id parameter required\n";
    die;
}

$stmt = $conn->prepare(
    '
SELECT
    title, studio, status, sound,
    versions, recommended_retail_price,
    rating, movie_year,
    genre, aspect, search_count
FROM
    `dvd`
WHERE
    id=:id
;
    '
);

$stmt->bindParam(':id', $id);
$stmt->execute();
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $title = htmlspecialchars($row["title"]);
    $studio = $row["studio"];
    $status = $row["status"];
    $sound = $row["sound"];
    $versions = $row["versions"];
    $recommended_retail_price = $row["recommended_retail_price"];
    $rating = $row["rating"];
    $movie_year = $row["movie_year"];
    $genre = $row["genre"];
    $aspect = $row["aspect"];
    $search_count = $row["search_count"];
    
    echo "<h2 class='text-center'>Title: $title</h2>";
    echo '<div class="details-list container ">';
    echo "
                <div class='row'>
                    <div class='col offset-sm-1 offset-md-2 offset-lg-3'>
                        <label>Studio:  </label>$studio
                    </div>
                    <div class='col'>
                        <label>Status:  </label>$status
                    </div>
                </div>
                <div class='row'>
                    <div class='col offset-sm-1 offset-md-2 offset-lg-3'>
                        <label>Sound:  </label>$sound
                    </div>
                    <div class='col'>
                        <label>Versions:  </label>$versions
                    </div>
                </div>
                <div class='row'>
                    <div class='col offset-sm-1 offset-md-2 offset-lg-3'>
                        <label>RRP:  </label>$recommended_retail_price
                    </div>
                    <div class='col'>
                        <label>Rating:  </label>$rating
                    </div>
                </div>
                <div class='row'>
                    <div class='col offset-sm-1 offset-md-2 offset-lg-3'>
                        <label>Year:  </label>$movie_year
                    </div>
                    <div class='col'>
                        <label>Genre: </label>$genre
                    </div>
                </div>
                <div class='row'>
                    <div class='col offset-sm-1 offset-md-2 offset-lg-3'>
                        <label>Aspect:  </label>$aspect
                    </div>
                    <div class='col'>
                        <label>Searches:  </label>$search_count
                    </div>
                </div>
    ";
}
$conn = null;

?>
            
