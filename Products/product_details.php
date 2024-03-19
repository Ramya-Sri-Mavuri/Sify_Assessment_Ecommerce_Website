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
    <title>Product_Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="product_details_style.css">
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
                <a class="nav-link" href="../home_after_login.php">Home</a>
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
        <a href="cart.php"><img src="../Images/Cart.jpg" alt="cart-icon" height="40" width="50" ></a>
        </div>
        <!-- <a class="btn btn-outline-primary my-2 my-sm-0" type="button" href="../profile.php">My Profile</a> -->
        <button id="myProfileBtn" class="btn btn-outline-primary my-2 my-sm-0">My profile</button>
        
    </div>
</nav>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
<article >
<section>
    <div class="toolbar-above" style="background-color:Brown; color:white;font-size:20px;font-weight: bold;">
    <marquee behavior="scroll" direction="left" scrollamount="8"><p>Check out our latest deals and products! Limited time offers available. Save big on electronics, fashion, home essentials, and more. <span style="color:white;">Don't miss out - shop now!<span></p></marquee>
    </div>
    </section>
</article>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
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
<!-- ----------------------------------------------------------------------------------------------------->
<main>
    <?php
    require 'connection.php'; 
    $prod_id=$_GET['id'];
    $product_type=$_GET['name'];
    $user_id=$user['Cid'];
    $product_dict=array('fashion_products'=>['fproducts','img2'],'beauty_products'=>['bproducts','img4'],'electronic_products'=>['eproducts','img'],
    'home_kitchen_products'=>['hkproducts','img3'],'mobile_products'=>['mproducts','img1']);
    $table_name=$product_dict[$product_type][0];
    $product_image=$product_dict[$product_type][1];
    $query = "SELECT * FROM $table_name where id=$prod_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1)
    {
        
        $row = mysqli_fetch_assoc($result);
        $image = $row['image'];
        $cost = $row['cost'];
        $name = $row['name'];
        $review = $row['review'];
        $rating = $row['ratings'];

        echo "<div class='image_section'><img src='$product_image/$image' style='height:450px;width:500px'></div>";
        echo "<div class='details_section'>
                <h1>$name</h1>
                <h6>";
        for ($i = 0; $i < round($review); $i++) {
            echo "<span class='fa fa-star checked'></span>";
        }
        echo "&nbsp;&nbsp;$review &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                $rating Ratings  &nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;
                Search this page</h6>
        <div class='limited_time_deal_box'>Limited Time deal</div>
        <h1 style='color:light black;font-size:30px;padding-top:20px'><i class='fa fa-inr' style='font-size:24px;'></i>&nbsp;$cost</h1>
        <h7 style='color:grey'>MRP : <i class='fa fa-inr' style='font-size:15px;'></i>&nbsp;<strike>1,800</strike></h7>
        <h6 style='color:black;padding-top:10px'>Inclusive of all taxes</h6>";
        if($product_type=='fashion_products')
        {
         echo "
         <h5>Sizes Available</h5>
        <div class='size_chart'>
          <div class='size_chart_items f1'>S</div>
          <div class='size_chart_items f2'>M</div>
          <div class='size_chart_items f3'>L</div>
          <div class='size_chart_items f4'>XL</div>
          <div class='size_chart_items f5'>XXL</div>
        </div>
        ";}
        echo "
        <h5 style='padding-top:5px;'>Choose color</h5>
        <div class='colors'>
          <div class='color-item 1'>Black</div>
          <div class='color-item 2'>White</div>
          <div class='color-item 3'>Blue</div>
          <div class='color-item 4'>Orange</div>
          <div class='color-item 5'>Pink</div>
          <div class='color-item 6'>Lavender</div>
        </div>
        <div class='exchange'>
          <div class='exchange-item 1'><img src='https://m.media-amazon.com/images/G/31/A2I-Convert/mobile/IconFarm/icon-returns._CB484059092_.png'>10 days Return and Exchange</div>
          <div class='exchange-item 1'><img src='https://m.media-amazon.com/images/G/31/A2I-Convert/mobile/IconFarm/trust_icon_free_shipping_81px._CB630870460_.png'>Free Delivery</div>
        </div>
        </div>";
        echo "<div class='add_to_cart'>
        <h1 style='color:light black;font-size:30px;'><i class='fa fa-inr' style='font-size:24px;'></i>&nbsp;$cost</h1>
        <h6  style='color:rgb(29, 100, 207);'>Free delivery <span style='color:black !important'>Saturday, 23 March.</span> Details</h6>
        <h7 style='color:rgb(29, 100, 207);font-size:14px;'><i class='fas fa-map-marker-alt' style='font-size:13px;color:black'></i>&nbsp;Delivering to Bhimavaram 534206 - Update Location</h7>
        <h5 style='padding-top:15px;color:green'>In Stock</h5>
        <h7>Delivered by &nbsp;&nbsp;&nbsp;&nbsp; Amazon</h7>
        <h7>Sold by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h7 style='color:rgb(29, 100, 207);text-transform:uppercase'>Be Savage</h7></h7><br>
        <h6>Quantity :
        <select>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        </select>
        </h6>
        <form method='post'>
        <button onclick=\"alert('Product added to Cart')\" name='Add_To_Cart' style='background-color:#ffdb4d;border:none;border-radius:20px;height:40px;width:200px;margin-left:35px;margin-top:20px'>Add to Cart</button><br>
        <button class='buy-now-btn' style='background-color:orange;border:none;border-radius:20px;height:40px;width:200px;margin-left:35px;margin-top:20px'>Buy Now</button>
        </form>
        <h6 style='padding-top:15px;color:rgb(29, 100, 207);padding-bottom:10px;border-bottom:2px solid rgb(212, 208, 208);'><i class='fas fa-lock' style='font-size:18px;color:grey !important'></i>&nbsp;&nbsp;&nbsp;Secure transaction</h6>
        </div>";
        if(isset($_POST['Add_To_Cart']))
        {
            $table_name='add_to_cart_products';
            mysqli_query($conn,"INSERT INTO $table_name VALUES('$user_id','$prod_id','$product_type','$image','$name','$cost')");
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
                event.preventDefault();
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