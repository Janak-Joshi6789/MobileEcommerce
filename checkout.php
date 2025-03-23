<?php
include('header.php');
include('connection.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch cart items for the logged-in user
$username = $_SESSION['username'];
$sql = "SELECT p.*, c.quantity FROM products p INNER JOIN cart c ON p.id = c.product_id WHERE c.user_name = '$username'";
$result = mysqli_query($con, $sql);

// Check if cart is empty
$cart_empty = mysqli_num_rows($result) == 0;

// Calculate total amount
$total_amount = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $total_amount += $row['price'] * $row['quantity'];
}

// Reset the pointer to the beginning of the result set
mysqli_data_seek($result, 0);

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .product-image {
            max-width: 100px;
            height: auto;
        }
        .total-amount {
            margin-top: 20px;
            font-size: 20px;
            text-align: right;
            padding-right: 50px;
        }
        .checkout-form {
            margin-top: 20px;
        }
        .checkout-form h2 {
            margin-bottom: 10px;
        }
      
        .address-info, .payment-info {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding-left:50px;

    
}

.address-info label, .payment-info label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}
.address-info input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    padding-left:20px;

}

.payment-info label {
    margin-top: 10px;
}

.payment-info {
    display: flex;
    flex-direction: column;
    
}

.payment-info label {
    margin-bottom: 10px;
}

.payment-info input[type="radio"] {
    margin-right: 10px;
}

.checkout-button {
    display: block;
    margin: 20px;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.checkout-button:hover {
    background-color: #45a049;
}

    </style>

</head>
</head>
<body>

<h2>Checkout</h2>

<?php if ($cart_empty): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <table>
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td>
                    <?php if (isset($row['filename']) && isset($row['filepath'])): ?>
                        <img class="product-image" src="<?php echo 'admin/uploads/' . $row['filename']; ?>" alt="<?php echo isset($row['product']) ? $row['product'] : ''; ?>">
                    <?php else: ?>
                        <span>Image not available</span>
                    <?php endif; ?>
                </td>
                <td><?php echo isset($row['product']) ? $row['product'] : ''; ?></td>
                <td>Rs.<?php echo isset($row['price']) ? $row['price'] : ''; ?></td>
                <td><?php echo isset($row['quantity']) ? $row['quantity'] : ''; ?></td>
                <td>Rs.<?php echo (isset($row['price']) && isset($row['quantity'])) ? ($row['price'] * $row['quantity']) : ''; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Total amount section -->
    <div class="total-amount">
        <strong>Total Amount: Rs.<?php echo number_format($total_amount, 2); ?></strong>
    </div>

    <!-- Checkout form -->
    <div class="checkout-form">
        <form action="checkout_process.php" method="post">
            <div class="address-info">
                <h2>Address Information</h2>
                <label for="city_state">City/State:</label>
                <input type="text" id="city_state" name="city_state" required>
                <br>
                <label for="street_address">Street Address:</label>
                <input type="text" id="street_address" name="street_address" required>
                <br>
                <label for="postcode">Postcode/Zip:</label>
                <input type="text" id="postcode" name="postcode" required>
                <br><br>
            </div>

            <div class="payment-info">
                <h2>Payment Information</h2>
                <label>
                    <input type="radio" name="payment_type" value="cash_on_delivery" checked>
                    Cash on Delivery
                </label>
                <br>
                <label>
                    <input type="radio" name="payment_type" value="khalti">
                    Khalti
                </label>
                <br><br>
            </div>

            <!-- Checkout button -->
            <button type="submit" class="checkout-button">Proceed to Confirm Order</button>
            
        </form>

    </div>
<?php endif; ?>

</body>
</html>
<?php
include("footer.php");

?>