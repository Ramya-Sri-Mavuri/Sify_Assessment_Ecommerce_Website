

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
            <img src="Images/Cart.jpg" alt="cart-icon" height="40" width="50" >
        </div>
        <a class="btn btn-outline-primary my-2 my-sm-0" type="button" href="profile.php">My Profile</a>
        
    </div>
</nav>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<article class="toolbar">
    <section>
    <div class="toolbar">
    <div class="toolbar-item" onclick="showCategory('electronics')">
        <img src="electronics_icon.png" alt="Electronics">
        <span>Electronics</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('mobiles')">
        <img src="mobiles_icon.png" alt="Mobiles">
        <span>Mobiles</span>
    </div>
    <div class="toolbar-item" onclick="showCategory('clothes')">
        <img src="clothes_icon.png" alt="Clothes">
        <span>Fashion</span>
    </div>
    <div class="toolbar-submenu" id="clothes-submenu">
        <div class="submenu-item" onclick="showCategory('home-related')">
            <span>Home Related</span>
        </div>
        <div class="submenu-item" onclick="showCategory('menware')">
            <span>Menware</span>
        </div>
        <div class="submenu-item" onclick="showCategory('womenware')">
            <span>Womenware</span>
        </div>
    </div>
    <div class="toolbar-item" onclick="showCategory('home')">
        <img src="home_icon.png" alt="Home">
        <span>Home</span>
    </div>
    <div class="toolbar-submenu" id="home-submenu">
        <div class="submenu-item" onclick="showCategory('utensils')">
            <span>Utensils</span>
        </div>
        <div class="submenu-item" onclick="showCategory('sofas')">
            <span>Sofas</span>
        </div>
        <div class="submenu-item" onclick="showCategory('appliances')">
            <span>Appliances</span>
        </div>
    </div>
    <div class="toolbar-item" onclick="showCategory('beauty-products')">
        <img src="beauty_icon.png" alt="Beauty Products">
        <span>Beauty Products</span>
    </div>
</div>
    </section>
</article>
<!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<article>
    <section>
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
      <img class="d-block w-100" src="Images/slide1.webp" alt="First slide" >
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Images/slide2.webp" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Images/h1.jpeg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Forth slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Fifth slide">
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
