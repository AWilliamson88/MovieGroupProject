<?php
/*
        admin_member_unsubscribe_script - removes subscriptions by email for the administrator
        
        RAD - 
        Team Name: ICA Designs
        Team Members:
            Ivan Ng
            Caspian Maclean
            Andrew Williamson
        Date: 11/11/2021
        Sprint: Two
*/

// Make sure an e-mail address was passed in.
// Do not check for validity, as we'll want to be able to remove/unsubscribe any
// addresses that are in the database, valid or not. The program will still warn
// if the address was not in the database.
if (! array_key_exists('email', $_GET)) {
    echo "<br/>missing e-mail address<br/>";
} else {
    include "connection_script.php";

    if (!isset($_SESSION['admin']) || ($_SESSION['admin'] != 1)) {
        echo "Not allowed";
        die;
    }

    echo "<br/> Unsubscribing ";                            
    $email = htmlspecialchars($_GET['email']);
    echo "email address: $email<br/>";

    // Need a non-html copy of the e-mail address, for the SQL query
    $raw_email = $_GET['email'];

    $stmt = $conn->prepare(
        '
    UPDATE `member`
    SET
        newsletter_requested = 0, newsflash_requested = 0        
    WHERE
        email=:email
    ;
        '
    );
    
    $stmt->bindParam(':email', $raw_email);
    
    $stmt->execute();

    // If no rows were changed, either the e-mail address wasn't in the database
    // or they were already unsubscribed, so show a warning message.
    if ($stmt->rowCount() == 0) {
        echo "<br/>Unsuccessful: Not found subscribed in member database<br/>";
    } else {
        echo "<br/>Member unsubscribed<br/>";
    }
    $conn = null;
}


?>
 
