<?php
  require 'connection.php';
  require '../vendor/autoload.php'; // Load JWT library
  use \Firebase\JWT\JWT;
  use Firebase\JWT\Key;
  
  // Check if JWT token exists
  if(!isset($_COOKIE['jwt_tokens'])){
      header("Location: ../login.php");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #dc3545;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 20px;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="lego-error.webp" alt="Error Image">
        <h1>Oops! Something went wrong.</h1>
        <p>We couldn't find the page you were looking for.</p>
        <p>Please go back to the <a href="../home_after_login.php">homepage</a> and try again.</p>
    </div>
</body>
</html>
