<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "You must be logged in to submit a review.";
    exit;
}

include('connection.php');

// Retrieve form data
$username = $_SESSION['username']; // Fetch username from session
$product_id = $_POST['product_id'];
$review = $_POST['review'];
$description = $_POST['description'];

// SQL query to insert data into database table
$sql = "INSERT INTO product_reviews (username, product_id, review, description) VALUES ('$username', '$product_id', '$review', '$description')";

if ($con->query($sql) === TRUE) {
    echo "<script>alert('Review submitted successfully');</script>";
    echo "<script>window.location = 'single_product.php?id=$product_id';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$con->close();
?>
