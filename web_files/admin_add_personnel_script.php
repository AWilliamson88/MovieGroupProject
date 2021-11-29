<?php
/*
        admin_add_personnel_script
        
        Caspian Maclean
        Date: 15/11/2021
        Sprint: Three


*/

// Make sure an e-mail address was passed in.
// Do not check for validity, as we'll want to be able to remove/unsubscribe any
// addresses that are in the database, valid or not. The program will still warn
// if the address was not in the database.
if (! array_key_exists('username', $_GET) 
    || ! array_key_exists('password', $_GET)
) {
    echo "<br/>missing parameter<br/>";
} else {
    include "connection_script.php";

    if (!isset($_SESSION['admin']) || ($_SESSION['admin'] != 1)) {
        echo "Not allowed";
        die;
    }

    $html_username = htmlspecialchars($_GET['username']);

    // Need a non-html copy of the inputs, for the SQL query
    $raw_username = $_GET['username'];
    $raw_password = $_GET['password'];

    if (array_key_exists('create_admin', $_GET) && $_GET['create_admin'] == "yes") {
        $create_admin_code = 1;
        $create_admin_message = "with admin access";
    } else {
        $create_admin_code = 0;
        $create_admin_message = "without admin access";
    }


    if ($raw_username == "") {
        $username_error = 1;
        $username_error_message = "no username entered";
    } else {
        $username_error = 0;
    }
    if (strlen($raw_password) >= 16) {
        $password_error = 0;
        // long passphrase doesn't need special characters.
    } else if (strlen($raw_password) < 8) {
        $password_error = 1;
        $password_error_message = "password too short - needs at least 8 characters";
    } else if (!preg_match("/[0-9]/", $raw_password)
        || !preg_match("/[a-z]/", $raw_password)
        || !preg_match("/[A-Z]/", $raw_password)
    ) {
            $password_error = 1;
            $password_error_message = "password needs uppercase, " . 
                "lowercase and numbers, or to be 16 character long";
    } else {
        $password_error = 0;
        // medium length password fulfilling compexity requirements.
    }
        
        
    $stmt = $conn->prepare(
        '
    INSERT INTO personnel
        (username, password, is_admin)
    VALUES
        (:username, :password, :is_admin)
    ;
        '
    );
    
    $stmt->bindParam(':username', $raw_username);
    $stmt->bindParam(':password', $raw_password);
    $stmt->bindParam(':is_admin', $create_admin_code);
    

    if ($username_error) {
        echo "<br/>" . $username_error_message;
    }
    if ($password_error) {
        echo "<br/>" . $password_error_message;
    }
    if (!$username_error && !$password_error) {
        $stmt->execute();

        // If no rows were changed, show a warning message.
        if ($stmt->rowCount() == 0) {
            echo "<br/>Unsuccessful - account not added for $html_username<br/>";
        } else {
            echo "<br/>Added $html_username ($create_admin_message)<br/>";
        }    
    }
    $conn = null;
}


?>
 
