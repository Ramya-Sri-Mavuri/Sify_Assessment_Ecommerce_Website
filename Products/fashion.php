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
        <link rel="stylesheet" href="data.css">
    </head>
</html>

<?php
require 'Connection.php'; 

$query = "SELECT * FROM fproducts";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    ?>
     <h1>Fashion</h1>
     <section id="best-selling-courses">
    <?php
    while($row = mysqli_fetch_assoc($result)) {
?>
    
        <div class="content">
            <img src="img2/<?php echo $row['image']; ?>" alt="Image">
            <a href="#"><?php echo $row['name']; ?></a>
            <p>₹<?php echo ' ',$row['cost']; ?></p>
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

