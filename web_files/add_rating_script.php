<?php
/*
        add_rating_script - adds a star rating for a dvd.

        Caspian Maclean
        Date: 15/11/2021
        Sprint: Three

        Usage: add_rating_script.php?id=4&stars=5
*/

if (! array_key_exists('stars', $_GET) || !array_key_exists('id', $_GET)) {
    echo "<!-- Missing parameter -->";
} else {
    include "connection_script.php";
    $id = $_GET['id'];
    $stars_to_add = $_GET['stars'];


    // For MySQL, the field that depends on the old value of
    // other fields must be listed first: average_star_rating
    // Other SQL databases provide the old value of fields for all the expressions,
    // which is the clearest interpretation of the SQL standard, 
    // See https://dev.mysql.com/doc/refman/8.0/en/ansi-diff-update.html
    $stmt = $conn->prepare(
        '
    UPDATE `dvd`
    SET
        average_star_rating = (total_stars + :stars_to_add) / (number_of_star_ratings + 1),
        number_of_star_ratings = number_of_star_ratings + 1,
        total_stars = total_stars + :stars_to_add
    WHERE
        id=:id
    ;
        '
    );

    //        average_star_rating = (number_of_star_ratings + 1) / (total_stars + :stars_to_add)


    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':stars_to_add', $stars_to_add);
    
    $stmt->execute();

    $conn = null;
}
?>
