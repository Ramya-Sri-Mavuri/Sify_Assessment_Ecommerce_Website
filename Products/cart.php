<?php
  require 'connection.php';

  require '../vendor/autoload.php'; // Load JWT library
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="add_to_cart_styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../Images/Mega-Mall-logo.webp">
        <img src="../Images/Mega-Mall-logo.webp" alt="Brand Logo" height="50" width="230">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../contact.php">Contact</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 mr-3">
        <select name="items" id="items">
            <option value="none" selected>All Products</option>
            <option value="Electronics">Electronics</option>
            <option value="Mobiles">Mobiles</option>
            <option value="Fashion">Fashion</option>
            <option value="Home and Kitchen">Home and Kitchen</option>
            <option value="Beauty">Beauty</option>
</select>
        <div class="search-bar">
            <input class="form-control mr-sm-2" type="search" placeholder="Choose from all products" aria-label="Search" id="searchInput">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            <button class="btn btn-outline-secondary my-0 my-sm-0 ml-2" type="button" id="voiceSearchBtn"><i class="fas fa-microphone"></i></button>
        </div>
        </form>
        <div class="cart-icon">
            <img src="../Images/Cart.jpg" alt="cart-icon" height="40" width="50" >
        </div>
        <!-- <a class="btn btn-outline-primary my-2 my-sm-0" type="button" href="../profile.php">My Profile</a> -->
        <button id="myProfileBtn" class="btn btn-outline-primary my-2 my-sm-0">My profile</button>
        
    </div>
</nav>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<article >
<section>
    <div class="toolbar-above" style="background-color:Brown; color:white;font-size:20px;font-weight: bold;">
    <marquee behavior="scroll" direction="left" scrollamount="8"><p>Check out our latest deals and products! Limited time offers available. Save big on electronics, fashion, home essentials, and more. <span style="color:white;">Don't miss out - shop now!<span></p></marquee>
    </div>
    </section>
</article>

<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<article class="toolbar">
    <section>
    <div class="toolbar">
    <div class="toolbar-item" onclick="showCategory('electronics')">
    <a href="Electronics.php"><img src="https://m.media-amazon.com/images/G/31/img23/CEPC/BAU/ELP/navtiles/Cameras._CB574550011_.png" alt="Electronics"></a>
        <span >Electronics</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('mobiles')">
    <a href="mobiles.php"><img src="https://m.media-amazon.com/images/I/61LB+d0vheL.AC_UL480_QL65.jpg" alt="Mobiles"></a>
        <span>Mobiles</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('clothes')">
    <a href="fashion.php"><img src="https://m.media-amazon.com/images/G/31/img19/Fashion/DesktopSubnav/Updated/BWL.jpg" alt="Clothes"></a>
        <span>Fashion</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('home-related')">
    <a href="fashion.php"><img src="https://m.media-amazon.com/images/I/51raPlJck9L.AC_SR155,154_QL70.jpg" alt="Clothes"></a>
            <span>Kids</span>
            </div>
        <div class="toolbar-item" onclick="showCategory('menware')">
        <a href="fashion.php"><img src="https://m.media-amazon.com/images/I/51zPqO-6MML.AC_UL480_FMwebp_QL65.jpg" alt="Clothes"></a>
            <span>Menware</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('womenware')">
        <a href="fashion.php"><img src="https://m.media-amazon.com/images/I/81271aov+AL.SY879.jpg" alt="Clothes"></a>
            <span>Womenware</span>
        </div>
    <div class="toolbar-item" onclick="showCategory('home')">
    <a href="home_kitchen.php"><img src="https://m.media-amazon.com/images/I/71wq391f45L.AC_UY327_FMwebp_QL65.jpg" alt="Home"></a>
        <span>Home</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('utensils')">
    <a href="home_kitchen.php"><img src="https://m.media-amazon.com/images/I/71bwxsfTaeL.AC_UL480_FMwebp_QL65.jpg" alt="Home"></a>
            <span>Utensils</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('sofas')">
        <a href="home_kitchen.php"><img src="https://m.media-amazon.com/images/I/71wq391f45L.AC_UY327_FMwebp_QL65.jpg" alt="Home"></a>
            <span>Sofas</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('appliances')">
        <a href="home_kitchen.php"><img src="https://m.media-amazon.com/images/I/51EkCd1UaCL.AC_UY327_FMwebp_QL65.jpg" alt="Home"></a>
            <span>Appliances</span>
            </div>
    
    <div class="toolbar-item" onclick="showCategory('beauty-products')">
    <a href="beauty.php"><img src="https://m.media-amazon.com/images/I/51o6iPJY-cL.AC_UL480_FMwebp_QL65.jpg" alt="Beauty Products"></a>
        <span>Beauty</span>
    </div>
</div>
    </section>
</article>
    <main>
        <div class='cart'>
            <h3>Shopping Cart</h3>
            <?php
             require 'connection.php'; 
             $user_id=$user['Cid'];
             $query = "SELECT * FROM add_to_cart_products WHERE Cid=$user_id";
             $result = mysqli_query($conn, $query);
             if(mysqli_num_rows($result)>0)
             {
                while($row=mysqli_fetch_assoc($result))
                {
                    $image = $row['image'];
                    $cost = $row['cost'];
                    $name = $row['name'];
                    $prod_id=$row['Id'];
                    $product_type=$row['product_type'];
                    $product_dict=array('fashion_products'=>['fproducts','img2'],'beauty_products'=>['bproducts','img4'],'electronic_products'=>['eproducts','img'],
                    'home_kitchen_products'=>['hkproducts','img3'],'mobile_products'=>['mproducts','img1']);
                    $product_image=$product_dict[$product_type][1];
                    echo "
                    <div class='cart-items'>
                    <img src='$product_image/$image'>
                    <div class='details'>
                    <h6>$name</h6>
                    <h7 style='font-size:15px;color:green'>In stock</h7><br>
                    <h7 style='font-size:15px;'>Eligible for Free Shipping</h7><br>
                    <img src='https://m.media-amazon.com/images/G/31/marketing/fba/fba-badge_18px._CB485936079_.png'><br>";
                    if($product_type=='fashion_products')
                    {
                    echo "
                    <h7 style='font-weight:bold;margin-top:0px;'>Size : </h7><h7>S</h7><br>
                    <h7 style='font-weight:bold;margin-top:0px;'>Color : </h7><h7>Black</h7>";}
                    echo "</div>
                    <div class='cost'>
                    <div class='limited-time-deal'>
                    <h5 style='background-color:#ff0066;height:30px;border-radius:5px;padding:3px;width:100px;text-align:center'>30% off</h5>
                    <h9 style='margin-left:10px;color:#ff0066;font-weight:bold;'>Limited time deal</h9>
                    </div>
                   <i class='fa fa-inr' style='font-size:25px;float:right'>$cost</i><br><br>
                   <h6 style='float:right'>Quantity :
                   <select style='border:none'>
                   <option>1</option>
                   <option>2</option>
                   <option>3</option>
                   <option>4</option>
                   <option>5</option>
                   </select>
                   </h6><br><br>
                   <button class='buy-now-btn' style='float:right;background-color:orange;border:none;border-radius:20px;height:40px;width:200px;'>Buy Now</button>
                    </div>
                    </div> ";
                }
             }
            ?>
        </div>
</main>
<div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <video src="https://cdnl.iconscout.com/lottie/premium/preview-watermark/tick-mark-5646462-4718796.mp4" autoplay="autoplay" muted="muted" loop="loop" playsinline="" type="video/mp4" height="200px"></video>
            <center><p>Your Order Booked Successfully!</p></center>
        </div>
    </div>  
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btns = document.querySelectorAll('.buy-now-btn');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btns.forEach(function(btn) {
            btn.onclick = function() {
                modal.style.display = "block";
            }
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script1.js"></script>

</body>
</html>