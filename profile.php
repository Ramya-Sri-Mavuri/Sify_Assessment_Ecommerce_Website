<?php
require 'products/connection.php';
require 'vendor/autoload.php'; // Load JWT library
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Check if JWT token exists
if(!isset($_COOKIE['jwt_tokens'])){
    header("Location: login.php");
    exit();
}

// Retrieve JWT token from cookie
$jwt = $_COOKIE['jwt_tokens'];

// Decode JWT token to get user details
$decoded = JWT::decode($jwt, new Key('hkhjs', 'HS256'));

// Fetch user details from database using the decoded user_id
$userId = $decoded->user_id;
$stmt = $conn->prepare("SELECT * FROM customer_details WHERE Cid = ?");
$stmt->bind_param("s", $userId);

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch user details
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    // Handle the case when user details are not found
    // You can redirect the user to an error page or perform some other action
    // For now, we'll just set the user variable to an empty array
    $user = [];
}
if (!isset($_SESSION['logged_out'])) {
    // User is not logged out, display the profile details
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="profile">
    <div class="profile-header">
    <h2>User Profile</h2>
           <i class='fa fa-user-circle-o' aria-hidden='true' style="font-size:55px"></i>
            <h2 class="username"><?php echo $user["Username"]; ?></h2>
        </div>
    <div class="profile-info">
        
        <!-- Display user details here -->
        <?php if (!empty($user)): ?>
            <p>Welcome, <?php echo $user["Username"]; ?>!</p>
            <p>Fullname: <?php echo $user["Full_Name"]; ?></p>
            <p>Email: <?php echo $user["Email"]; ?></p>
            <p>Mobile: <?php echo $user["Phno"]; ?></p>
            <!-- Add more user details as needed -->
        <?php else: ?>
            <p>Error: User details not found.</p>
        <?php endif; ?>

        <!-- Logout button -->
        <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
    </div>
</body>

</html>

<?php
} else {
    // User is logged out, redirect to login page
    header("Location: login.php");
    exit();
}
?>
