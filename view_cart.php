<?php
include("header.php");
?>

<?php
include('connection.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: user_log_reg.php"); // Redirect to login page if not logged in
    exit();
}

$username = $_SESSION['username'];

// Fetch cart items for the logged-in user
$sql = "SELECT p.*, c.quantity FROM products p INNER JOIN cart c ON p.id = c.product_id WHERE c.user_name = '$username'";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <style>
        /* Add your CSS styles here */
        .cart-items {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .cart-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .cart-items th, .cart-items td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .cart-items th {
            background-color: #f2f2f2;
        }
        .product-image {
            width: 100px;
            height: 100px;
        }
        .quantity-input {
            width: 50px;
        }
        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            margin-left:50px;
            margin-right:50px;


        }
        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            background-color:#1e5e2f;
            color:white;
            font-weight:bold;
            font-size:20px;

        }
        .button-container button:hover {
            background-color: black;
        }

        /* Add this CSS code to your stylesheet */
.remove-button {
    display: inline-block;
    padding: 8px 16px;
    background-color: red;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left:40px;
}

.remove-button:hover {
    background-color: darkred;
}

/* Add this CSS code to your stylesheet */
.update-button {
    padding: 10px 20px;
    background-color: green;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.update-button:hover {
    background-color: darkgreen;
}


    </style>
</head>
<body>

<!-- Your HTML structure for displaying cart items -->
<div class="cart-items">
    <h2>Cart Items</h2>
    <form action="update_cart.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $total = $row['price'] * $row['quantity'];
                        echo "<tr>";
                        echo "<td><img class='product-image' src='admin/uploads/{$row['filename']}' alt='{$row['filename']}'></td>";
                        echo "<td>{$row['product']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td><input class='quantity-input' type='number' name='quantity[{$row['id']}]' value='{$row['quantity']}' min='1' max='{$row['qty']}'></td>";
                        echo "<td>$total</td>";
                        echo "<td>";
                        echo "<button type='submit' name='update' class='update-button'>Update</button>";
                        echo "<a href='remove_cart.php?id={$row['id']}' class='remove-button'>Remove</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No items in the cart.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </form>
</div>

<!-- Button container for continue shopping and checkout -->
<div class="button-container">
    <button onclick="location.href='phones.php'">Continue Shopping <i style='font-size:30px;'>&#8594;</i></button>
    <button onclick="location.href='checkout.php'">Checkout <i style='font-size:30px; '>&#8594;</i></button>
</div>



</body>
</html>

<?php
mysqli_close($con);
?>
