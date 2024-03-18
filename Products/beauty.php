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
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Mall Website</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="data.css">
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
                <a class="nav-link" href="../contact.php" >Contact</a>
            </li>
        </ul>
        <form action="../search.php" method="get" class="form-inline my-2 my-lg-0 mr-3">
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
        <a href="cart.php"><img src="../Images/Cart.jpg" alt="cart-icon" height="40" width="50" ></a>
        </div>
        <!-- <a class="btn btn-outline-primary my-2 my-sm-0" type="button" href="../profile.php">My Profile</a> -->
        <button id="myProfileBtn" class="btn btn-outline-primary my-2 my-sm-0">My profile</button>
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
    <a href="Electronics.php"><img src="https://m.media-amazon.com/images/G/31/img23/CEPC/BAU/ELP/navtiles/Cameras._CB574550011_.png" alt="Electronics"></a>
        <span >Electronics</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('mobiles')">
    <a href="mobiles.php"><img src="https://m.media-amazon.com/images/I/61LB+d0vheL._AC_UL480_QL65_.jpg" alt="Mobiles"></a>
        <span>Mobiles</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('clothes')">
    <a href="fashion.php"><img src="https://m.media-amazon.com/images/G/31/img19/Fashion/DesktopSubnav/Updated/BWL.jpg" alt="Clothes"></a>
        <span>Fashion</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('home-related')">
    <a href="fashion.php"><img src="https://m.media-amazon.com/images/I/51raPlJck9L._AC_SR155,154_QL70_.jpg" alt="Clothes"></a>
            <span>Kids</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('menware')">
        <a href="fashion.php"><img src="https://m.media-amazon.com/images/I/51zPqO-6MML._AC_UL480_FMwebp_QL65_.jpg" alt="Clothes"></a>
            <span>Menware</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('womenware')">
        <a href="fashion.php"><img src="https://m.media-amazon.com/images/I/81271aov+AL._SY879_.jpg" alt="Clothes"></a>
            <span>Womenware</span>
        </div>
    <div class="toolbar-item" onclick="showCategory('home')">
    <a href="home_kitchen.php"><img src="https://m.media-amazon.com/images/I/71wq391f45L._AC_UY327_FMwebp_QL65_.jpg" alt="Home"></a>
        <span>Home</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('utensils')">
    <a href="home_kitchen.php"><img src="https://m.media-amazon.com/images/I/71bwxsfTaeL._AC_UL480_FMwebp_QL65_.jpg" alt="Home"></a>
            <span>Utensils</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('sofas')">
        <a href="home_kitchen.php"><img src="https://m.media-amazon.com/images/I/71wq391f45L._AC_UY327_FMwebp_QL65_.jpg" alt="Home"></a>
            <span>Sofas</span>
        </div>
        <div class="toolbar-item" onclick="showCategory('appliances')">
        <a href="home_kitchen.php"><img src="https://m.media-amazon.com/images/I/51EkCd1UaCL._AC_UY327_FMwebp_QL65_.jpg" alt="Home"></a>
            <span>Appliances</span>
        </div>
    
    <div class="toolbar-item" onclick="showCategory('beauty-products')">
    <a href="beauty.php"><img src="https://m.media-amazon.com/images/I/51o6iPJY-cL._AC_UL480_FMwebp_QL65_.jpg" alt="Beauty Products"></a>
        <span>Beauty</span>
    </div>
</div>
    </section>
</article>
<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="script1.js"></script>

<script src="../script.js"></script>
</body>
</html>

<?php
require 'Connection.php'; 

$query = "SELECT * FROM bproducts";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    ?>
     <section id="best-selling-courses">
    <?php
    while($row = mysqli_fetch_assoc($result)) {
?>
    
    <div class="content">
            <a href='./product_details.php?id=<?php echo $row['id'];?>&name=<?php echo 'beauty_products'?>'>
            <img src="img4/<?php echo $row['image']; ?>" alt="Image">
            <h5><?php echo $row['name']; ?></h5>
            <p>₹<?php echo ' ',$row['cost']; ?></p>
            </a>
        </div>
    
<?php
    }
?>
</section>
<?php
} else {
    echo "No images found.";
}

mysqli_close($conn);
?>

