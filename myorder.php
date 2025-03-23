<?php
include('header.php');

// Establish database connection
include('connection.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "Please log in to view your orders.";
    exit();
}

// Fetch order details for the logged-in user
$username = $_SESSION['username'];
$sql = "SELECT o.order_id, o.total_price, o.city_state, o.street_address, o.postcode, o.payment_type, od.product_id, od.quantity
        FROM orders o
        INNER JOIN order_detail od ON o.order_id = od.order_id
        WHERE o.username = ? ORDER BY  o.created_at DESC";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if there are any order details
if (mysqli_num_rows($result) > 0) {
    // Start displaying orders
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Your Orders</title>";
    echo "<style>";
    echo "table { width: 100%; border-collapse: collapse; margin-top: 20px; }";
    echo "th, td { border: 3px solid #dddddd; padding: 8px; text-align: left; }";
    echo "th { background-color: #f2f2f2; }";
    echo "th, td { text-align: center; }";
    echo "tr:hover { background-color: #f2f2f2; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<h1>Your Orders</h1>";
    echo "<table>";
    echo "<tr><th>Order ID</th><th>Total Price</th><th>City/State</th><th>Street Address</th><th>Postcode/Zip</th><th>Payment Type</th><th>Product ID</th><th>Quantity</th></tr>";

    // Fetch and display each order detail
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['order_id'] . "</td>";
        echo "<td>" . $row['total_price'] . "</td>";
        echo "<td>" . $row['city_state'] . "</td>";
        echo "<td>" . $row['street_address'] . "</td>";
        echo "<td>" . $row['postcode'] . "</td>";
        echo "<td>" . $row['payment_type'] . "</td>";
        echo "<td>" . $row['product_id'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "</tr>";
    }

    // Close table and body
    echo "</table>";
    echo "</body>";
    echo "</html>";
} else {
    // If there are no order details, display a message
    echo "You have no orders yet.";
}

// Close statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>

