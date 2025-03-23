<?php
include("top.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Center align text in th */
        th {
            text-align: center;
        }

        /* Hover effect */
        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
// Establish database connection
include('connection.php');

// Fetch all order details including data from both order and order_detail tables
$sql = "SELECT o.order_id, o.username, o.total_price, o.city_state, o.street_address, o.postcode, o.payment_type,o.created_at, od.product_id, od.quantity
        FROM orders o
        INNER JOIN order_detail od ON o.order_id = od.order_id  ORDER BY 
    o.created_at DESC"  ;
$result = mysqli_query($con, $sql);

// Check if there are any order details
if (mysqli_num_rows($result) > 0) {
    // Display table
    echo "<table>";
    echo "<tr><th>Order ID</th><th>Username</th><th>Total Price</th><th>City/State</th><th>Street Address</th><th>Postcode/Zip</th><th>Payment Type</th><th>Order Date</th><th>Product ID</th><th>Quantity</th></tr>";

    // Fetch and display each order detail
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['order_id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['total_price'] . "</td>";
        echo "<td>" . $row['city_state'] . "</td>";
        echo "<td>" . $row['street_address'] . "</td>";
        echo "<td>" . $row['postcode'] . "</td>";
        echo "<td>" . $row['payment_type'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";

        echo "<td>" . $row['product_id'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "</tr>";
    }

    // Close table
    echo "</table>";
} else {
    // If there are no order details, display a message
    echo "No order details found.";
}

// Close database connection
mysqli_close($con);
?>

</body>
</html>

<?php
include("bottom.php");

?>