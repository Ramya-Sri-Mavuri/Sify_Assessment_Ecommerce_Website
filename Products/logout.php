

<?php
// Start the session
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");

// Unset all of the session variables
$_SESSION = array();

if (!isset($_COOKIE['jwt_tokens'])) {
    header("Location: ../index.php");
    exit();
}

// Destroy the session
session_destroy();

// Set a session variable to indicate that the user has logged out
$_SESSION['logged_out'] = true;

// Unset the JWT token
unset($_COOKIE['jwt_tokens']);

// Set the cookie expiration time to a past value to remove the cookie
setcookie('jwt_tokens', '', time() - 3600, '/');

// Redirect to login page
header("Location: ../index.php");
exit();
?>
<script>
// Check if user is logged out, if yes, prevent navigating back to this page
window.onload = function() {
    if (<?php echo isset($_SESSION['logged_out']) ? 'true' : 'false'; ?>) {
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    }
};
</script>
