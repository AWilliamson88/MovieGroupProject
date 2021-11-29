<?php
/*
        top_ten_script - table entries with list of top ten most searched movies

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

/* 
 * Table headings
 * 
 *              <tr>
 *                  <th>Rank</th>
 *                  <th>Title</th>
 *                  <th>Rating</th>
 *                  <th>Year</th>
 *                  <th>Searches</th>
 *              </tr>
 *
 * This script generates the corresponding table data rows
 * for the top 10 searched movies.
 * 
*/

require "connection_script.php";

$stmt = $conn->prepare(
    '
SELECT
    id, title, rating, number_of_star_ratings, average_star_rating
FROM
    `dvd`
WHERE
    1
ORDER BY average_star_rating DESC,
number_of_star_ratings DESC
LIMIT 10;
    '
);

$stmt->execute();
$place = array("1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th");
$i = 0;

echo "<table class='table'>";

echo "
        <tr>
            <th>Rank</th>
            <th>Title</th>
            <th>Rating</th>
            <th class='large-only'>Votes</th>
            <th>Star Rating</th>
        </tr>";

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $id = $row["id"];
    $title = htmlspecialchars($row["title"]);
    $rating = $row["rating"];
    $number_of_ratings = $row["number_of_star_ratings"];
    $search_count = $row["average_star_rating"];

    echo "
        <tr>
            <td>" . $place[$i] . "</td>
            <td><a href='movie_details.php?id=$id'>$title</a></td>
            <td>$rating</td>
            <td class='large-only'>$number_of_ratings</td>
            <td>$search_count</td>
        </tr>
    ";
    $i++;
}

echo "</table>";

$conn = null;
