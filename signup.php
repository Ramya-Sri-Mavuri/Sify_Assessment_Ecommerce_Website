
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
                    <input type="text" id="fullName" placeholder="Enter your name" name="fullname" required>
                </div>
                <div class="input-box">
                    <span class="details">Username</span>
                    <input type="text" id="username" placeholder="Enter your username" name="username" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" id="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" id="phoneNumber" placeholder="Enter your number" name="phn" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" id="password" placeholder="Enter your password" name="pwd" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" id="confirmPassword" placeholder="Confirm your password" required>
                    <div id="passwordError" class="error"></div>
                </div>
            </div>
            <div class="gender-details">
                <input type="radio" name="gender" value="male" id="dot-1">
                <input type="radio" name="gender" value="female" id="dot-2">
                <input type="radio" name="gender" value="NPS" id="dot-3">
                <span class="gender-title">Gender</span>
                <div class="category">
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
    $stmt=$conn->prepare("insert into customer_details(Full_Name,Username,Email,Phno,Password,Gender) values (?,?,?,?,?,?)");
    $stmt->bind_param("sssiss",$fn,$un,$email,$phn,$pwd,$gender);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    }
?>
<script>
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    // Prevent default form submission
    event.preventDefault();
    
    // Check if the form submission was successful
    if (document.querySelector('.error').innerHTML.trim() === "") {
        echo "";
        window.alert("Registered successfully");
        
        // Reset the form
        document.getElementById('registrationForm').reset();
    }
});
</script>
<script src="script.js"></script>

</body>
</html>
