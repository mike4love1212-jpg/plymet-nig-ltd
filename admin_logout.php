<?php
session_start();

// Destroy the session
session_destroy();

// Clear all session variables
$_SESSION = array();

// Redirect to admin login page
header("Location: admin_login.php");
exit();
?>
