<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the JWT token cookie
setcookie('jwt_tokens', '', time() - 3600, '/');

// Redirect to login page
header("Location: login.php");
exit();
?>
