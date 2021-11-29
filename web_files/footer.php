<?php
$curpage = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['username'])) {
    $admin_on = "hidden";
    $admin_off = "";
} else {
    $admin_on = "";
    $admin_off = "hidden";
}

if ($curpage == 'admin.php' && !isset($_SESSION['username'])) {
    header('Location: index.php');
}
?>


<footer class="footer m-0">
    <div class="" <?php echo $admin_off?>>
        <p class="text-center text-primary py-1 bg-light">Designed by <a class="text-decoration-none" href="#" data-toggle="modal" data-target="#loginModal">ICA Design</a></p>
    </div>
    <div class="" <?php echo $admin_on?>>
        <p class="text-center text-primary py-1 bg-light">Designed by ICA Design</p>
    </div>
</footer>

<div class="modal fade loginModal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Acme Personnel Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" data-toggle="modal" action="" id="loginForm" method="post" novalidate>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="uname" required>

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="pword" required>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary btn-lg border my-5">Login</button>
                </form>
                <small id="incorrect"></small>
            </div>
        </div>
    </div>
</div>

<script src="jquery-3.6.0.js"></script>
<script src="login-validate.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
