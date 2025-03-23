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

// Fetch wishlist items for the logged-in user
$sql = "SELECT p.*, w.id AS wishlist_id FROM products p INNER JOIN wishlist w ON p.id = w.product_id WHERE w.user_name = '$username'";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Wishlist</title>
    <style>
        /* Add your CSS styles here */
        .wishlist-items {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .wishlist-items table {
            width: 100%;
            border-collapse: collapse;
        }
        .wishlist-items th, .wishlist-items td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .wishlist-items th {
            background-color: #f2f2f2;
        }
        .product-image {
            width: 100px;
            height: 100px;
        }
       
.button-container {
    display:flex;
    gap: 10px;
    height:103px;

}

.button-container button {
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 8px;

    transition: background-color 0.3s ease;
}

/* Style for Add to Cart button */
.button-container button[type='submit'] {
    background-color: #3498db; /* Blusih color */
    color: white;
}

/* Style for Remove button */
.button-container button.button-remove {
    background-color: #e74c3c; /* Red color */
    color: white;
}

.button-container button:hover {
    background-color: black;
}

    </style>
</head>
<body>

<!-- Your HTML structure for displaying wishlist items -->
<div class="wishlist-items">
    <h2>Wishlist Items</h2>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img class='product-image' src='admin/uploads/{$row['filename']}' alt='{$row['filename']}'></td>";
                    echo "<td>{$row['product']}</td>";
                    echo "<td>{$row['price']}</td>";
                    echo "<td class='button-container'>";
                    echo "<form action='cart.php' method='post'>";
                    echo "<input type='hidden' name='product_id' value='{$row['id']}'>";
                    echo "<button type='submit'>Add to Cart</button>";
                    echo "</form>";
                    echo "<form action='remove_wishlist.php' method='post'>";
                    echo "<input type='hidden' name='wishlist_id' value='{$row['wishlist_id']}'>";
                    echo "<button type='submit' class='button-remove'>Remove</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No items in the wishlist.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>


<?php
mysqli_close($con);
?>
