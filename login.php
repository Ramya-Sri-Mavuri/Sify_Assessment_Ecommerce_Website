
<?php

session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");

// Check if the user is already logged in
if (isset($_COOKIE['jwt_tokens'])) {
    // User is already logged in, redirect to home page
    header("Location: home_after_login.php");
    exit();
}

// Check if the session variable for logout is set
if (isset($_SESSION['logged_out'])) {
    // User has logged out, clear the session variable
    unset($_SESSION['logged_out']);
    header("Location: index.php");
}

require 'products/connection.php';
require 'vendor/autoload.php'; // Load JWT library
use \Firebase\JWT\JWT;

function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["pswrd"]);

    $stmt = $conn->prepare("SELECT * FROM customer_details WHERE Username = ? OR Email = ? or Phno=?");
    $stmt->bind_param("ssi", $username, $username,$username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Compare the user-provided password with the hashed password from the database
        if ($password==$row["Password"]) {
            // Password is correct, generate JWT token
            $payload = array(
                "user_id" => $row["Cid"],
                "username" => $row["Username"]
                // Add more user data as needed
            );
            $jwt = JWT::encode($payload, "hkhjs",'HS256');
            $updateStmt = $conn->prepare("UPDATE customer_details SET jwt_tokens = ? WHERE Cid = ?");
            $updateStmt->bind_param("si", $jwt, $row["Cid"]);
            $updateStmt->execute();

            // Send JWT token in response
            echo "<script>window.localStorage.setItem('jwt_tokens', '$jwt');</script>";
            echo "<script>window.alert('Login successful');</script>";


            // After generating JWT token
            setcookie('jwt_tokens', $jwt, time() + (86400 * 30), "/"); // 86400 = 1 day

            // Redirect to home_after_login.php if there's no stored search query
            header("Location: home_after_login.php");
            exit(); // Stop further execution of the script
            

        } else {
            // Incorrect password
            echo "<script>window.alert('Invalid username or password');</script>";
        }
    } else {
        // User not found
        echo "<script>window.alert('User not found');</script>";
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page in HTML</title>
    <link rel="stylesheet" href="login.css">
    <script>
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
        });
    </script>
    <script language="javascript" type="text/javascript">
    window.history.forward();
  </script>
    
</head>
<body>
    <form action="" onsubmit="return sanitize_input()" method="post">
        <!-- Headings for the form -->
        <div class="headingsContainer">
        <div class="top">
        <div><img src="Images/Mega-Mall-logo.webp" alt="megamall" height="50" width="150"></div>
        <div class="title"><b>Sign in</b></div>
    </div>
        </div>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
            <!-- Username -->
            <label for="username">Your username</label>
            <input type="text" placeholder="Enter Username/Email" name="username" required>

            <br><br>

            <!-- Password -->
            <label for="pswrd">Your password</label>
            <input type="password" placeholder="Enter Password" name="pswrd" required>

            <!-- sub container for the checkbox and forgot password link -->
            <div class="subcontainer">
                <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <p class="forgotpsd"> <a href="#">Forgot Password?</a></p>
            </div>


            <!-- Submit button -->
            <button type="submit">Login</button>

            <!-- Sign up link -->
            <p class="register" style="color:black;">Not a member?  <a href="register.php">Register here!</a></p>

        </div>

    </form>
</body>
</html>
