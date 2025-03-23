<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    if (isset($_POST['update'])) {
        // Loop through each product ID and its corresponding quantity
        foreach ($_POST['quantity'] as $productId => $quantity) {
            // Get the available quantity of the product from the database
            $sql_qty = "SELECT qty FROM products WHERE id = '$productId'";
            $result_qty = mysqli_query($con, $sql_qty);

            if ($result_qty && mysqli_num_rows($result_qty) > 0) {
                $row_qty = mysqli_fetch_assoc($result_qty);
                $max_quantity = $row_qty['qty']; // Maximum quantity available for the product

                // Check if the selected quantity exceeds the available stock
                if ($quantity <= $max_quantity && $quantity > 0) {
                    // Update cart item quantity in the database
                    $sql_update = "UPDATE cart SET quantity = '$quantity' WHERE user_name = '$username' AND product_id = '$productId'";
                    if (mysqli_query($con, $sql_update)) {
                        // Move on to the next product
                        continue;
                    } else {
                        $_SESSION['cart_error'] = "Error updating cart item: " . mysqli_error($con);
                        header("Location: view_cart.php");
                        exit();
                    }
                } else {
                    $_SESSION['cart_error'] = "Invalid quantity selected for product with ID $productId.";
                    header("Location: view_cart.php");
                    exit();
                }
            } else {
                $_SESSION['cart_error'] = "Product not found or unavailable.";
                header("Location: view_cart.php");
                exit();
            }
        }

        // Redirect to view_cart.php after updating all products
        header("Location: view_cart.php");
        exit();
    } else {
        $_SESSION['cart_error'] = "Invalid request.";
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
