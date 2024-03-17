<?php

// Start the session
session_start();
require 'products/Connection.php'; 

// Function to check if the search query matches any product name in a specific category
function searchCategoryPage($searchQuery, $category, $conn) {
    if($category=="Home and Kitchen"){
        $tableName = "hk". "products";
    }else{
    $tableName = strtolower(substr($category, 0, 1)) . "products"; }// Construct the table name based on the category
    $query = "SELECT * FROM " . $tableName . " WHERE name LIKE '%" . $searchQuery . "%'";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) > 0;
}

// Function to calculate similarity between two strings
function calculateSimilarity($str1, $str2) {
    return levenshtein(strtolower($str1), strtolower($str2));
}



// Check if the query parameter is set
if (isset($_GET['query'])) {
    // Get the search query from the URL
    $searchQuery = $_GET['query'];

    $_SESSION['search_query'] = $searchQuery;

    // Define categories to search
    $categories = array("Electronics", "Mobiles", "Fashion", "Home and Kitchen", "Beauty");

    // Define thresholds for similarity
    $thresholds = array("Electronics" => 5, "Mobiles" => 5, "Fashion" => 5, "Home and Kitchen" => 5, "Beauty" => 5);

    // Loop through categories to check for similarity or product matching
    foreach ($categories as $category) {
        // Check similarity with category name
        $similarity = calculateSimilarity($searchQuery, $category);
        
        // If similarity is below the threshold, redirect to the category page
        if ($similarity < $thresholds[$category]) {
            if($category=="Home and Kitchen"){
            $category="home_kitchen";}
            header("Location: Products/" . strtolower(str_replace(' ', '_', $category)) . ".php");
            exit(); // Stop further execution of the script
        }

        // Check if the search query matches any product name in the category
        else if (searchCategoryPage($searchQuery, $category, $conn)) {
            if($category=="Home and Kitchen"){
            $category="home_kitchen";}
            header("Location: Products/" . strtolower(str_replace(' ', '_', $category)) . ".php");
            exit(); // Stop further execution of the script
        }
    }

    // If no match is found, redirect the user to the search results page with the query as a parameter
    header("Location:products/error.php");
    exit(); // Stop further execution of the script
} else {
    // If the query parameter is not set, redirect the user back to the index page
    header("Location: index.php");
    exit(); // Stop further execution of the script
}

mysqli_close($conn);
?>
