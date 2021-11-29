<?php
require "connection_script.php";

$fname = $lname = $email = $newsletter = $newsflash = "";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];

if (isset($_POST["newsletter"]) && $_POST["newsletter"] == "newsletterYes") {
    $newsletter = 1;
} else {
    $newsletter = 0;
}

if (isset($_POST["newsflash"]) && $_POST["newsflash"] == "newsflashYes") {
    $newsflash = 1;
} else {
    $newsflash = 0;
}

$stmt = $conn->prepare("INSERT INTO member (first_name, last_name, email, newsletter_requested, newsflash_requested) VALUES (:fname, :lname, :email, :newsletter, :newsflash)");
$stmt->bindParam(':fname', $fname);
$stmt->bindParam(':lname', $lname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':newsletter', $newsletter);
$stmt->bindParam(':newsflash', $newsflash);


$stmt->execute();

$conn = null;

alert($fname.$lname.$email.$_POST["newsletter"].$_POST["newsflash"]);

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
