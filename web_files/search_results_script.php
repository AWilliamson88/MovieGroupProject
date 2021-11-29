<?php
/*
        search_results_script - generate search results table entries

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

// example $sql_condition:
// '1' . ' AND title LIKE :title' . ' AND rating="R"'
// could be equivalent to '1 AND title LIKE "%love%" AND rating="R"'
// start with '1' and add conditions onto it.

$sql_condition = '1';

if (array_key_exists('title', $_POST) && array_key_exists('genre', $_POST)
    && array_key_exists('rating', $_POST) && array_key_exists('movie_year', $_POST)
) {
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $rating = $_POST["rating"];
    $movie_year = $_POST["movie_year"];

    $title_present = (strlen($title) > 0);
    $genre_present = (strlen($genre) > 0);
    $rating_present = (strlen($rating) > 0);
    $movie_year_present = (strlen($movie_year) > 0);
} else {
    echo "Invalid request: missing parameter\n";
    die;
}

if (!$title_present && !$genre_present && !$rating_present && !$movie_year_present) {
    echo "No search parameters given <br/><br/>";
    die;
}

if ($title_present) {
    $sql_condition = $sql_condition . ' AND title LIKE :title';
}
if ($genre_present) {
    $sql_condition = $sql_condition . ' AND genre=:genre';
}
if ($rating_present) {
    $sql_condition = $sql_condition . ' AND rating=:rating';
}
if ($movie_year_present) {
    $sql_condition = $sql_condition . ' AND movie_year=:movie_year';
}

$stmt = $conn->prepare(
    '
    SELECT
        id, title, rating, movie_year, status, studio, versions, recommended_retail_price, aspect, genre, average_star_rating
    FROM
        `dvd`
    WHERE
    ' . $sql_condition . '
    ORDER BY title, movie_year
    LIMIT 120;
    '
);

if ($title_present) {
    $stmt->bindParam(':title', $title);
}
if ($genre_present) {
    $stmt->bindParam(':genre', $genre);
}
if ($rating_present) {
    $stmt->bindParam(':rating', $rating);
}
if ($movie_year_present) {
    $stmt->bindParam(':movie_year', $movie_year);
}

$stmt->execute();

$count = 0;

echo "<div class='accordion' id='accordionMovie'>";

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $id = $row["id"];
    $title = htmlspecialchars($row["title"]);
    $rating = $row["rating"];
    $movie_year = $row["movie_year"];
    $status = $row["status"];
    $studio = $row["studio"];
    $version = $row["versions"];
    $price = $row["recommended_retail_price"];
    $ratio = $row["aspect"];
    $genre = $row["genre"];

    if ($row["average_star_rating"] == '') {
        $star = 0.0;
    } else {
        $star = $row["average_star_rating"];
    }

    

    // echo "
    //     <tr>
    //         <td><a href='movie_details.php?id=$id'>$title</a></td>
    //         <td>$rating</td>
    //         <td class='large-only'>$movie_year</td>
    //         <td>$status</td>
    //     </tr>
    // ";


    echo "
        <div class='accordion-item'>
            <h2 class='accordion-header' id='heading$count'>
                <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$count' aria-expanded='false' aria-controls='collapse$count'>
                    $title
                </button>
            </h2>
            <div id='collapse$count' class='accordion-collapse collapse' aria-labelledby='heading$count' data-bs-parent='#accordionMovie'>
            <div class='accordion-body'>
                <strong>$title</strong>
                <div class='row'>
                    <div class='col-sm'>
                    	<p>Studio: $studio</p>
                        <p>Genre: $genre</p>
                        <p>Year: $movie_year</p>
                        <p>Rated: $rating</p>
                    </div>
                    <div class='col-sm'>
                        <p>Price: $price</p>
                        <p>Version: $version</p>
                        <p>Aspect Ratio: $ratio</p>
                        <p class='star$id'>Average Star Rating: $star</p>
                    </div>
                </div>
                <div class='row'>
                <div id='ratingDiv$id'>
                <form></form>
                <form class='ratingForm$id' action='#' method='post' id='starRating' readOnly=false>
                    <fieldset class='rating'>
                    <input type='text' name='id' value='$id'>
                    <input type='radio' id='star5$id' name='stars' value='5' class='radio$id'/><label class ='full radioLabel$id' for='star5$id' title='5 stars'></label>
                    <input type='radio' id='star4$id' name='stars' value='4' class='radio$id'/><label class ='full radioLabel$id' for='star4$id' title='4 stars'></label>
                    <input type='radio' id='star3$id' name='stars' value='3' class='radio$id'/><label class ='full radioLabel$id' for='star3$id' title='3 stars'></label>
                    <input type='radio' id='star2$id' name='stars' value='2' class='radio$id'/><label class ='full radioLabel$id' for='star2$id' title='2 stars'></label>
                    <input type='radio' id='star1$id' name='stars' value='1' class='radio$id'/><label class ='full radioLabel$id' for='star1$id' title='1 star'></label>
                    </fieldset>
                </form>
                </div>
                <div>
                    <h4 id='afterRating$id'></h4>
                </div>
                </div>
            </div>
            </div>
        </div>";



    $count++;
}

echo "
    </div>
    ";

if ($count == 0) {
    echo "No matching movies found<br/><br/>";
}
$conn = null;
