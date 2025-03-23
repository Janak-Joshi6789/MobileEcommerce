<?php
session_start(); // Start the session if it hasn't been started already

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data (you can add more validation as needed)
    $errors = [];
    if (empty($_POST['city_state'])) {
        $errors[] = "City/State is required";
    }
    if (empty($_POST['street_address'])) {
        $errors[] = "Street Address is required";
    }
    if (empty($_POST['postcode'])) {
        $errors[] = "Postcode/Zip is required";
    }

    // Check if there are any errors
    if (!empty($errors)) {
        // Redirect back to the checkout page with errors
        // You can also display errors on the checkout page
        header("Location: checkout.php?errors=" . urlencode(implode(",", $errors)));
        exit();
    }

    // Process form data
    $city_state = $_POST['city_state'];
    $street_address = $_POST['street_address'];
    $postcode = $_POST['postcode'];
    $payment_type = $_POST['payment_type'];

    // Initialize total_amount
    $total_amount = 0;

    // Establish database connection
    include('connection.php');

    // Calculate total amount and fetch product IDs from cart
    $sql = "SELECT p.price, c.product_id, c.quantity FROM products p INNER JOIN cart c ON p.id = c.product_id WHERE c.user_name = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        $total_amount += $row['price'] * $row['quantity'];
    }

    // Insert into orders table
    $sql_insert_order = "INSERT INTO orders (username, total_price, city_state, street_address, postcode, payment_type) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_insert_order = mysqli_prepare($con, $sql_insert_order);
    mysqli_stmt_bind_param($stmt_insert_order, "sdssss", $_SESSION['username'], $total_amount, $city_state, $street_address, $postcode, $payment_type);
    mysqli_stmt_execute($stmt_insert_order);

    // Get the auto-incremented order ID
    $order_id = mysqli_insert_id($con);

    // Close statement for inserting into orders table
    mysqli_stmt_close($stmt_insert_order);

    // Insert into order_detail table
    mysqli_data_seek($result, 0); // Reset result pointer

    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $sql_insert_detail = "INSERT INTO order_detail (order_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt_insert_detail = mysqli_prepare($con, $sql_insert_detail);
        mysqli_stmt_bind_param($stmt_insert_detail, "iii", $order_id, $product_id, $quantity);
        mysqli_stmt_execute($stmt_insert_detail);
        mysqli_stmt_close($stmt_insert_detail);
    }

    // Clear all products from the cart of the logged-in user
    $sql_clear_cart = "DELETE FROM cart WHERE user_name = ?";
    $stmt_clear_cart = mysqli_prepare($con, $sql_clear_cart);
    mysqli_stmt_bind_param($stmt_clear_cart, "s", $_SESSION['username']);
    mysqli_stmt_execute($stmt_clear_cart);
    mysqli_stmt_close($stmt_clear_cart);

    // Close database connection
    mysqli_close($con);

    // If payment type is Khalti, redirect to khalti.php
    if ($payment_type == 'khalti') {
        header("Location: khalti.php");
        exit();
    } else {
        // Redirect to thank you page or any other appropriate page
        header("Location: thank_you.php");
        exit();
    }
} else {
    // Form not submitted
    // Handle the error or redirect to an error page
    header("Location: error.php");
    exit();
}
?>
