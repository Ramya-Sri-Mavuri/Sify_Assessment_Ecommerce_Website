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
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Contact Us Form  | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="contact.css">
   </head>
<body>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Sify Technologies</div>
          <div class="text-two">Chennai,531103</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+91 9898935647</div>
          <div class="text-two">+91 9634345678</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">sifytech@gmail.com</div>
          <div class="text-two">info.sify@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <img src="Images/Mega-Mall-logo.webp" alt="megamall">
        <div class="topic-text">Send us a message</div><br>
        <p>If you have any quries related to my Website Mega Mall, you can send me message from here. Thank you.</p><br>
      <form action="#">
        <div class="input-box">
          <input type="text" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email">
        </div>
        <div class="input-box message-box">
          <input type="text" placeholder="Enter your message">
        </div>
        <div class="button">
          <input id="message" type="submit" name="submit" value="Send Now" >
        </div>
      </form>
    </div>
    </div>
  </div>
  <script>
    document.getElementById('message').addEventListener('click', function(event) {
    window.alert('Message sent');
    document.getElementById('message').reset();
    
});
  </script>
</body>
</html>