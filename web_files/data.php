<?php
/** 
 * Andrew Williamson / P113357 
 *  Date: 18/09/2021
 *  Web Programming, Project
 *  Requirements
 *    Develop the application. The application must: 
 *  o Have a search form, searchable by the title, genre, rating and year.
 *    For example, Search movies by genre (Comedy or SciFi) with Rating (PG)
 *    in 1995 or search movies by title with genre, or search by title only.
 *  o Display the full details of each movie found. If no movie is found, 
 *    the application will display a user-friendly message.
 *  o Have an option to display a chart image of top 10 most 
 *    frequently searched movies.
 * 
 * @category WebProgramming
 * @package  Project
 * @author   Andrew Williamson <P113357@TAFE.wa.edu.au>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     connect.php
 */

header('Content-Type: application/json');

// echo "connection script including";
// The connection to the database.
require 'connection_script.php';

// echo "connection script included";

// prepare the statement.
$stmt = $conn->prepare(
    // "SELECT `title`, `search_count` 
    // FROM `dvd` 
    // ORDER BY `search_count` 
    // DESC 
    // LIMIT 10;"
    "SELECT `title`, `average_star_rating` 
    FROM `dvd` 
    ORDER BY 
    `average_star_rating` DESC,
    `number_of_star_ratings` DESC
    LIMIT 10;"
);
// execute the prepared statement.
$stmt->execute();

// Create an array.
$data = array();

// Check if there were any problems with running the sql statement.
if (!$stmt) {
    echo mysql_error();
    die;
}

// Add all the results to the data array.
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Close the connection.
$conn = null;

// echo $data;
// echo the data out in a json format.
// echo json_encode($data);
echo json_encode(array_values($data));
