<?php
/*
        nav - the navigation pane shared by all the web pages

        RAD - 
        Team Name: ICA Designs
        Team Members:
            Ivan Ng
            Caspian Maclean
            Andrew Williamson
        Date: 05/11/2021
        Sprint: One
        Task: Make all the pages responsive.
*/

?>

<?php
require "connection_script.php";
if (!isset($_SESSION['username'])) {
    // shouldn't reach here due to header("Location: index.php");
    //echo "<br/>not logged in<br/>";
    $admin_register = "";
    $admin_page = "hidden";
} else {
    $admin_register = "hidden";
    $admin_page = "";
}
?>

<nav class="navbar navbar-expand-sm bg-white navbar-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./resources/logo_transparent.svg" width="290" height="62.5" class="d-inline-block align-top img-fluid" alt="acme logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="top_ten.php">Top 10</a>
                </li>
                <li class="nav-item" <?php echo $admin_register?>>
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item" <?php echo $admin_page?>>
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
                <li class="nav-item" <?php echo $admin_page?>>
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</nav>
