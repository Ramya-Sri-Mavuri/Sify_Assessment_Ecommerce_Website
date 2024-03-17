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
                <a class="nav-link" href="#" <?php echo $jwtTokenExists ? '' : 'disabled'; ?>>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php" <?php echo $jwtTokenExists ? '' : 'disabled'; ?>>Contact</a>
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
        <a class="btn btn-outline-primary my-2 my-sm-0" type="button" href="signup.php">Sign Up</a>
        <a class="btn btn-outline-primary my-2 my-sm-0" type="button" href="login.php">Login</a>
    </div>
</nav>