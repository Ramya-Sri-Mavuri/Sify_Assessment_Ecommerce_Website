<?php
// Include the connection script
require '../products/connection.php';

// Check if the ID parameter is provided in the URL
if(isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $customerId = $_GET['id'];

    // Query to fetch customer details by ID
    $query = "SELECT * FROM Customer_details WHERE Cid = $customerId";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Check if any rows are returned
        if(mysqli_num_rows($result) > 0) {
            // Fetch the customer details
            $customer = mysqli_fetch_assoc($result);

            // Prepare response data
            $data = [
                'status' => 200,
                'message' => 'Customer details fetched successfully',
                'data' => $customer
            ];
            // Send JSON response
            header("HTTP/1.0 200 OK");
            echo json_encode($data);
        } else {
            // No customer found with the provided ID
            $data = [
                'status' => 404,
                'message' => 'Customer not found'
            ];
            // Send JSON response
            header("HTTP/1.0 404 Not Found");
            echo json_encode($data);
        }
    } else {
        // Error while executing the query
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];
        // Send JSON response
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
} else {
    // ID parameter is missing in the URL
    $data = [
        'status' => 422,
        'message' => 'Customer ID is required'
    ];
    // Send JSON response
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
}
?>
