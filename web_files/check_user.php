<?php
require "connection_script.php";

$username = $_POST["uname"];
$password = $_POST["pword"];

$stmt = $conn->prepare("SELECT * FROM `personnel` WHERE `username` LIKE '$username' AND `password` LIKE '$password'");
$stmt->execute();

$count = 0;

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $uname = $row["username"];
    $admin = $row["is_admin"];

    $count++;
}

if ($count > 0) {
    $_SESSION["username"] = $uname;
    $_SESSION["admin"] = $admin;
    echo 1;
} else {
    echo "Incorrect username or password";
}
?>
