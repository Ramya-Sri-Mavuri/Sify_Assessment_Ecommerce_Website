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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="Images/Mega-Mall-logo.webp">
        <img src="Images/Mega-Mall-logo.webp" alt="Brand Logo" height="50" width="230">
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
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
        <form action="search.php" method="get" class="form-inline my-2 my-lg-0 mr-3">
        <select name="items" id="items">
            <option value="none" selected>All Products</option>
            <option value="Electronics">Electronics</option>
            <option value="Mobiles">Mobiles</option>
            <option value="Fashion">Fashion</option>
            <option value="Home and Kitchen">Home and Kitchen</option>
            <option value="Beauty">Beauty</option>
</select>
        <div class="search-bar">
            <input class="form-control mr-sm-2" type="search" placeholder="Choose from all products" aria-label="Search" id="searchInput" name="query">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            <button class="btn btn-outline-secondary my-0 my-sm-0 ml-2" type="button" id="voiceSearchBtn"><i class="fas fa-microphone"></i></button>
        </div>
        </form>
        <div class="cart-icon">
            <img src="Images/Cart.jpg" alt="cart-icon" height="40" width="50" >
        </div>
        <a class="btn btn-outline-primary my-2 my-sm-0" type="button" href="profile.php">My Profile</a>
        
    </div>
</nav>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

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
    <a href="products/Electronics.php"><img src="https://m.media-amazon.com/images/G/31/img23/CEPC/BAU/ELP/navtiles/Cameras._CB574550011_.png" alt="Electronics"></a>
        <span >Electronics</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('mobiles')">
    <a href="products/mobiles.php"><img src="https://m.media-amazon.com/images/I/61LB+d0vheL._AC_UL480_QL65_.jpg" alt="Mobiles"></a>
        <span>Mobiles</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('clothes')">
    <a href="products/fashion.php"><img src="https://m.media-amazon.com/images/G/31/img19/Fashion/DesktopSubnav/Updated/BWL.jpg" alt="Clothes"></a>
        <span>Fashion</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('home-related')">
    <a href="products/fashion.php"><img src="https://m.media-amazon.com/images/I/51raPlJck9L._AC_SR155,154_QL70_.jpg" alt="Clothes"></a>
            <span>Kids</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('menware')">
        <a href="products/fashion.php"><img src="https://m.media-amazon.com/images/I/51zPqO-6MML._AC_UL480_FMwebp_QL65_.jpg" alt="Clothes"></a>
            <span>Menware</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('womenware')">
        <a href="products/fashion.php"><img src="https://m.media-amazon.com/images/I/51bMGRDl+eL._AC_UL480_FMwebp_QL65_.jpg" alt="Clothes"></a>
            <span>Womenware</span>
        </div>
    <div class="toolbar-item" onclick="showCategory('home')">
    <a href="products/home_kitchen.php"><img src="https://m.media-amazon.com/images/I/71wq391f45L._AC_UY327_FMwebp_QL65_.jpg" alt="Home"></a>
        <span>Home</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('utensils')">
    <a href="products/home_kitchen.php"><img src="https://m.media-amazon.com/images/I/71bwxsfTaeL._AC_UL480_FMwebp_QL65_.jpg" alt="Home"></a>
            <span>Utensils</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('sofas')">
        <a href="products/home_kitchen.php"><img src="https://m.media-amazon.com/images/I/71wq391f45L._AC_UY327_FMwebp_QL65_.jpg" alt="Home"></a>
            <span>Sofas</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('appliances')">
        <a href="products/home_kitchen.php"><img src="https://m.media-amazon.com/images/I/51EkCd1UaCL._AC_UY327_FMwebp_QL65_.jpg" alt="Home"></a>
            <span>Appliances</span>
        </div>
    
    <div class="toolbar-item" onclick="showCategory('beauty-products')">
    <a href="products/beauty.php"><img src="https://m.media-amazon.com/images/I/51o6iPJY-cL._AC_UL480_FMwebp_QL65_.jpg" alt="Beauty Products"></a>
        <span>Beauty</span>
    </div>
</div>
    </section>
</article>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<article>
    <section class="slides">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="products/mobiles.php"><img class="d-block w-100" src="Images/Laptop_offer.jpg" alt="First slide" height="500" ></a>
    </div>
    <div class="carousel-item">
    <a href="products/home_kitchen.php"><img class="d-block w-100" src="Images/h1 .jpg" alt="Third slide"></a>
    </div>
    <div class="carousel-item">
    <a href="products/Electronics.php"><img class="d-block w-100" src="Images/slide2.jpg" alt="Second slide" height="500"></a>
    </div>
    <div class="carousel-item">
    <a href="products/beauty.php"><img class="d-block w-100" src="Images/slide4.jpg" alt="Third slide" height="500"></a>
    </div>
    <div class="carousel-item">
    <a href="products/fashion.php"><img class="d-block w-100" src="Images/slide5.jpg" alt="Forth slide" height="500"></a>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </section>
</article>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="script.js"></script>

</body>
</html>
