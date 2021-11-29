<?php

/*
 * connection_script_server - connects to the database
 * 
 *      Name: Caspian Maclean
 *      ID: 30039802
 *      Date: 8/9/2021
 *      Task: Project
 */

/* web server connection */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conn;
try {
    $username = 'adminer';
    $password = 'P@ssw0rd';
    $conn = new PDO(
        'mysql:host=localhost;dbname=ica_movies_db',
        $username,
        $password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
    );
} catch (PDOException $e) {
    // echo 'Connection failed 1: ' . $e->getMessage();
    try {
        $username = 'root';
        $password = '';
        $conn = new PDO(
            'mysql:host=localhost;port=8306;dbname=ica_movies_db',
            $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
        );
    } catch (PDOException $e2) {
        echo 'Connection failed 2: ' . $e2->getMessage();
        try {
            $username = 'root';
            $password = '';
            $conn = new PDO(
                'mysql:host=localhost;dbname=ica_movies_db',
                $username,
                $password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );
        } catch (PDOException $e3) {
            echo 'Connection failed 3: ' . $e3->getMessage();
        }
    }
}

/* home connection */
// $username = 'root';
// $password = 'usbw';
// $conn = new PDO(
//    'mysql:host=localhost;dbname=tafe_movie_project', $username, $password
// );

