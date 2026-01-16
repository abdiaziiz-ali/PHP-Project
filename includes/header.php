<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Session timeout: 5 minutes
$timeout_seconds = 5 * 60;
if (isset($_SESSION['last_activity'])) {
    if (time() - $_SESSION['last_activity'] > $timeout_seconds) {
        // session expired
        session_unset();
        session_destroy();
        // clear remember me cookie
        setcookie('dets_remember', '', time() - 3600, '/');
        header('location:../index.php?session_expired=1');
        exit();
    }
}
// update last activity timestamp
if (isset($_SESSION['detsuid'])) {
    $_SESSION['last_activity'] = time();
}
?>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="dashboard.php"><span>Daily Expense Tracker</span></a>

        </div>

    </div>
    <!-- /.container-fluid -->
</nav>