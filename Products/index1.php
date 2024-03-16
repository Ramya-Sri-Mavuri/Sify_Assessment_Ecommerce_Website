<?php
require 'Connection.php';
if(isset($_POST["submit"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $cost = $_POST["cost"];
    if($_FILES["image"]["error"] === 4){
        echo "<script> alert('Image does not exist');</script>";
    }
    else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $validImageExtension = ['jpg','jpeg','png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if(!in_array($imageExtension, $validImageExtension)){ 
            echo "<script> alert('Image format is not supported.');</script>";
        }
        else if($fileSize > 1000000){
            echo "<script> alert('Image is too large.');</script>";
        }
        else{
            $newImageName = uniqid() . '.' . $imageExtension;
            move_uploaded_file($tmpName, 'img/'.$newImageName); 
            $query = "INSERT INTO eproducts VALUES('$id', '$newImageName','$name','$cost')";
            mysqli_query($conn, $query);
            echo "<script> alert('Image added successfully');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>MegaMall Image</title>
</head>
<body>
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="user"> Id:</label>
        <input type="text" name="id" id="id" required><br> 
        
        <!-- Fixed the name attribute -->
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png"><br><br> <!-- Fixed the name attribute and removed incorrect values attribute -->
        <label for="user"> name:</label>
        <input type="text" name="name" id="name" required><br> 
        <label for="user"> cost:</label>
        <input type="text" name="cost" id="cost" required><br> 
        
        <button type="submit" name="submit">Upload</button> <!-- Added submit button -->
        
    </form>
    <a href="Electronics.php" target="_blank">Data</a>
</body>
</html>
