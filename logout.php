<?php
session_start();
session_unset();
session_destroy();
// clear remember me cookie on logout
setcookie('dets_remember', '', time() - 3600, '/');
header('location:index.php');

?>