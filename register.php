
<?php
require 'products/connection.php';
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Signup Mega Mall</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="top">
    <div><img src="Images/Mega-Mall-logo.webp" alt="megamall" height="50" width="150"></div>
    <div class="title"><b>Registration </b></div>
    </div>
    <div class="content">
        <form action="" id="registrationForm" onsubmit="return validateForm()" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full Name</span>
                    <input type="text" id="fullName" placeholder="Enter your name" name="fullname" required value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']; ?>">
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" id="username" placeholder="Enter your username" name="username" required value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                    <div id="usernameError" class="error"></div>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" id="email" placeholder="Enter your email" name="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                    <div id="emailError" class="error"></div>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" id="phoneNumber" placeholder="Enter your number" name="phn" required value="<?php if(isset($_POST['phn'])) echo $_POST['phn']; ?>">
                    <div id="phoneError" class="error"></div>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" id="password" placeholder="Enter your password" name="pwd" required >
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" id="confirmPassword" placeholder="Confirm your password" required>
                    <div id="passwordError" class="error"></div>
                </div>
            </div>
            <div class="gender-details" >
                <input type="radio" name="gender" value="male" id="dot-1" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'male') echo 'checked'; ?>>
                <input type="radio" name="gender" value="female" id="dot-2" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'female') echo 'checked'; ?>>
                <input type="radio" name="gender" value="NPS" id="dot-3" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'NPS') echo 'checked'; ?>>
                <span class="gender-title">Gender</span>
                <div class="category" >
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Male</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Female</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Prefer not to say</span>
                    </label>
                </div>
            </div>
            <div class="button">
                <input type="submit" name="submit" value="Register" >
            </div>
            <center><p class="register" style="color:black;">Already have an account? <a href="login.php">login here.</a></p></center>
        </form>
    </div>
</div>

<?php
    if(isset($_POST["submit"])){ 
    $fn=$_POST['fullname'];
    $un=$_POST['username'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $phn=$_POST['phn'];
    $gender=$_POST['gender'];

    $checkUsernameQuery = "SELECT * FROM customer_details WHERE Username = ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
    $checkUsernameStmt->bind_param("s", $un);
    $checkUsernameStmt->execute();
    $checkUsernameResult = $checkUsernameStmt->get_result();

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM customer_details WHERE Email = ?";
    $checkEmailStmt = $conn->prepare($checkEmailQuery);
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailResult = $checkEmailStmt->get_result();

    // Check if the phone number already exists
    $checkPhoneQuery = "SELECT * FROM customer_details WHERE Phno = ?";
    $checkPhoneStmt = $conn->prepare($checkPhoneQuery);
    $checkPhoneStmt->bind_param("i", $phn);
    $checkPhoneStmt->execute();
    $checkPhoneResult = $checkPhoneStmt->get_result();

    if ($checkUsernameResult->num_rows > 0) {
        echo '<script>document.getElementById("usernameError").innerText = "Username already taken";</script>';
    } elseif ($checkEmailResult->num_rows > 0) {
        echo '<script>document.getElementById("emailError").innerText = "This Email already registered";</script>';
    } elseif ($checkPhoneResult->num_rows > 0) {
        echo '<script>document.getElementById("phoneError").innerText = "This number already registered";</script>';
    } else {

    $stmt=$conn->prepare("INSERT INTO customer_details(Full_Name,Username,Email,Phno,Password,Gender) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("sssiss",$fn,$un,$email,$phn,$pwd,$gender);
    if ($stmt->execute()) {?><script>
        window.alert('Registred successfully');
        window.location.href = 'login.php';</script><?php
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    }
    $checkUsernameStmt->close();
    $checkEmailStmt->close();
    $conn->close();
    }
?>

<script src="script.js"></script>

</body>
</html>
