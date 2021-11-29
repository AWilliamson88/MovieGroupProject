<?php
/*
        admin - allow deleting members by the administrator
        
        RAD - 
        Team Name: ICA Designs
        Team Members:
            Ivan Ng
            Caspian Maclean
            Andrew Williamson
        Date: 08/11/2021
        Sprint: Two
*/

require "connection_script.php";
$conn = null;

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Regular CSS -->
        <link rel="stylesheet" href="style.css">
        
        <title>
            Admin page
        </title>
    </head>


    <body>
        <?php
        require "nav.php";
        ?>
        <header class="container-fluid text-center mt-3">
            <h1>Admin page</h1>
        </header>
        <div class = "text-center">
        <?php
        if (!isset($_SESSION['username'])) {
            // shouldn't reach here due to header("Location: index.php");
            echo "<br/>not logged in<br/>";
            $non_admin_hidden = "hidden";
        }
        else {
            echo "logged in as: " . $_SESSION['username'];
            if (!isset($_SESSION['admin']) || ($_SESSION['admin'] != 1)) {
                echo " (personnel)<br/>";
                $non_admin_hidden = "hidden";
            } else {
                echo " (admin)<br/>";
                $non_admin_hidden = "";
            }
        }
        ?>
        </div>
        
        <main>
            <?php
            // Hide some sections when not logged in as admin
            echo "
            <div $non_admin_hidden>
            "; ?>
                <div class="container-fluid text-center mt-3">
                    <h2>Create personnel account</h2>
                </div>            <!-- The Create personnel account form -->
                <form class="m-0 row" method="get" action="admin.php">
                    <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label">Username</label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <input type="text" class="form-control" autofocus name="username" id="username">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label">Password</label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <input type="text" class="form-control" autofocus name="password" id="password">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 col-sm-2 col-md-2 col-xl-3"></div>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                    <span>Password needs to be at least 8 characters, including uppercase, lowercase, and numbers, or be a passphrase at least 16 characters long.
                    </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label">
                    </label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <input type="checkbox" class="form-check-input" id="create_admin" name="create_admin" value="yes">
                        <label class="col-form-label" for="create_admin">
                            Give this new account admin privileges
                        </label>
                    </div>

                </div>
                <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label"></label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <button class="button"  class="form-control" name="submit" type="submit" value="add_personnel"> 
                            Add personnel member
                        </button>
                        <?php
                        if (isset($_GET['submit']) && $_GET['submit'] == "add_personnel" ) {
                            include "admin_add_personnel_script.php";
                        }
                        ?>
                    </div>
                </div>
                <div class="container-fluid text-center mt-3">
                    <h2>Unsubscribe member</h2>
                </div>
                <!-- The Unsubscribe User Form -->
                <form class="m-0 row" method="get" action="admin.php">
                    <div class="row mb-3">
                        <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label">E-mail</label>
                        <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                            <input type="text" class="form-control" autofocus name="email" id="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label"></label>
                        <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                            <button class="button"  class="form-control" name="submit" type="submit" value="unsubscribe"> 
                            Unsubscribe member
                            </button>
                            <?php
                            if (isset($_GET['submit']) && $_GET['submit'] == "unsubscribe" ) {
                                include "admin_member_unsubscribe_script.php";
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container-fluid text-center mt-3" id="member_list">
                <h2>Member list</h2>
            </div>
            <form class="m-0 row" method="get" action="admin.php#member_list">
                <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label"></label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <button class="button"  class="form-control" name="show" type="submit" value="show">
                          Show members
                        </button>
                    </div>
                </div>
            </form>
            <!-- If the show members form was submitted include the members table. -->
            <?php 
            if (isset($_GET['show'])) {
                echo "
                    <div class='row justify-content-center g-0'>
                        <div class='col-12 col-sm-12 col-md-10 col-xl-6'>
                            <table class='table'>
                                <tr>
                                    <th>Full name</th>
                                    <th>E-mail address</th>
                                    <th>Subscribed to newsletter</th>
                                    <th>Subscribed to newsflashes</th>
                                    <th $non_admin_hidden>Unsubscribe</th>
                                </tr>
                    ";
                include 'admin_member_list_script.php';
                echo '
                            </table> 
                        </div>
                    </div>  
                    ';
            }
            ?>
            <div class="container-fluid text-center mt-3">
                <h2>Log out</h2>
            </div>
            <!-- Admin log out button -->
            <form class="m-0 row" method="get" action="logout.php">
                <div class="row mb-3">
                    <label class="col-2 col-sm-2 col-md-2 col-xl-3 col-form-label"></label>
                    <div class="col-10 col-sm-10 col-md-9 col-xl-6">
                        <button class="button"  class="form-control" name="submit" type="submit" value="submit">
                          Logout
                        </button>
                    </div>
                </div>
            </form>

            </form>
        </main>
    </body>
</html>
