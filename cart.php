<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $username = $_SESSION['username']; // Assuming you have user authentication

    // Check if the product already exists in the cart
    $check_sql = "SELECT * FROM cart WHERE user_name = '$username' AND product_id = '$productId'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Product already exists in the cart, so update its quantity instead of inserting a new row
        $update_sql = "UPDATE cart SET quantity = '$quantity' WHERE user_name = '$username' AND product_id = '$productId'";
        if (mysqli_query($con, $update_sql)) {
            $_SESSION['cart_message'] = "Product quantity updated in the cart.";
        } else {
            $_SESSION['cart_message'] = "Error updating product quantity in the cart.";
        }
    } else {
        // Product doesn't exist in the cart, so insert it
        $insert_sql = "INSERT INTO cart (user_name, product_id, quantity) VALUES ('$username', '$productId', '$quantity')";
        if (mysqli_query($con, $insert_sql)) {
            $_SESSION['cart_message'] = "Product added to cart successfully.";
        } else {
            $_SESSION['cart_message'] = "Error adding product to cart.";
        }
    }

    // Redirect to view_cart.php after adding/updating the product
    header("Location: view_cart.php");
    exit();
}

mysqli_close($con);
?>
