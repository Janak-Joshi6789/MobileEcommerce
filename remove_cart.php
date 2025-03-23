<?php
session_start();
include('connection.php');

if (isset($_GET['id']) && isset($_SESSION['username'])) {
    $productId = $_GET['id'];
    $username = $_SESSION['username'];

    // Remove cart item from the database
    $sql_remove = "DELETE FROM cart WHERE user_name = '$username' AND product_id = '$productId'";
    if (mysqli_query($con, $sql_remove)) {
        // Redirect to view_cart.php after successful removal
        header("Location: view_cart.php");
        exit();
    } else {
        $_SESSION['cart_error'] = "Error removing cart item: " . mysqli_error($con);
        header("Location: view_cart.php");
        exit();
    }
} else {
    $_SESSION['cart_error'] = "Unauthorized access.";
    header("Location: view_cart.php");
    exit();
}

mysqli_close($con);
?>
