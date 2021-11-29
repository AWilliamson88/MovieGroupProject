<?php
/*
        admin_member_list_script - table rows listing the members for the administrator
        
        RAD - 
        Team Name: ICA Designs
        Team Members:
            Ivan Ng
            Caspian Maclean
            Andrew Williamson
        Date: 11/11/2021
        Sprint: Two
*/

require "connection_script.php";
if (!isset($_SESSION['username'])) {
    echo "Not allowed";
    die;
}


// Get data for all members in the table
$stmt = $conn->prepare(
    '
SELECT
    id, first_name, last_name, email, newsletter_requested, newsflash_requested
FROM
    `member`
;
    '
);

$stmt->execute();

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    // Set strings of member data to be used in the table html
    $id = $row["id"];
    $first_name = htmlspecialchars($row["first_name"]);
    $last_name = htmlspecialchars($row["last_name"]);
    $email = htmlspecialchars($row["email"]);
    $url_email = urlencode($row["email"]);
    $newsletter_requested_code = $row["newsletter_requested"];
    if ($newsletter_requested_code == 0) {
        $newsletter_requested_display = "no";
    } else {
        $newsletter_requested_display = "yes";
    }
    $newsflash_requested_code = $row["newsflash_requested"];
    if ($newsflash_requested_code == 0) {
        $newsflash_requested_display = "no";
    } else {
        $newsflash_requested_display = "yes";
    }

    // Table data html, including one cell that hass an unsubscribe link
    echo "
        <tr>
            <td>$first_name $last_name</td>
            <td>$email</td>
            <td>$newsletter_requested_display</td>
            <td>$newsflash_requested_display</td>
    ";
    if (isset($_SESSION['admin']) && ($_SESSION['admin'] == 1)) {
        echo "
            <td><a href='admin.php?id=$id&submit=unsubscribe&email=$url_email'>Unsubscribe member</a></td>
        ";
    }
    echo "
        </tr>
    ";
}
$conn = null;
?>
 
