<?php
require "connection_script.php";

$id = $_POST["id"];

$stmt = $conn->prepare(
    '
    SELECT `average_star_rating` FROM `dvd` WHERE id=:id
    '
);

$stmt->bindParam(':id', $id);

$stmt->execute();
foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    echo $row["average_star_rating"];
}
?>
