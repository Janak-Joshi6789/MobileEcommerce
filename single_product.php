<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>


.categories {
        padding: 10px; /* Adjust spacing as needed */
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding-right: 60px;
        background-color: #444;
        color: white;
    }

    .list {
        padding-top: 10px;
    }

    .category {
        padding-left: 60px;
    }
        /* CSS for single product view */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }



        .product-container {
            max-width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            flex: 0 0 40%;
        }

        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .product-details {
            flex: 0 0 50%;
            padding: 40px;
            padding-top:60px;
            padding-left:80px;

        }

        .product-name {
            font-size: 40px;
            margin-bottom: 40px;
            font-weight: bold;
        }

        .product-price {
            font-size: 20px;
            margin-bottom: 40px;
            color:grey;
            font-weight: bold;

        }

        .Ava{
            font-size: 20px;
            display:flex;
            color:black;
            font-weight: bold;
        margin-top: 10px;
        margin-bottom: 40px;


        }

        .availability{
            font-size: 20px;
        color: grey; 
        font-weight: bold;


        }

        .quantity-selector {
            margin-bottom: 50px;
        }

        .quantity-selector label {
            font-weight: bold;
            color: Black;
            
        }
        .quantity-selector input[type="number"] {
    font-size: 14px;
    padding: 5px;
    width:30px;
    border: 1px solid red; 
    border-radius: 5px;

}


        .add-to-cart,
        .add-to-compare {
            display: inline-block;
            padding: 10px 40px;
            background-color:red;
            color: #fff;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 40px;
        }

        .add-to-cart:hover,
        .add-to-compare:hover {
            background-color: #0056b3;
        }

        .cart-wishlist{display:flex}



        .product-specifications {
            background-color: #fff;
           padding-bottom: 40px;
    padding: 20px;
    padding-left: 100px;

    border-radius: 10px;
}
        

       .spec{
         font-size:30px;
         font-weight:Bold;
         padding-bottom:20px;

       }
        .specification-item {
            margin-bottom: 10px;

        }

        .specification-label {
         font-size:14px;

            font-weight: bold;
            color: #ff5722; /* Reddish color for column names */
        }

        .specification-value {
    margin-left: 10px;
    font-size:14px;
    font-weight: bold;


}
    </style>
</head>
<body>

<?php
include("header.php");
include("userfunction.php");
?>

   
<div class="categories">
    <div class="category">
        <h1><a href="phones.php"  style="text-decoration: none; color: inherit;"> All Categories</a></h1>
    </div>

    <?php
    // Fetch all categories
    $categories = getAll('categories');   
    if (mysqli_num_rows($categories) > 0) {
        foreach ($categories as $item) {
    ?>
    <a href="products.php?category=<?= $item['category']; ?>" style="text-decoration: none; color: inherit;">
        <div class="list" style="padding-top: 10px;">
            <h3><?= $item['category']; ?></h3>
        </div>
    </a>
    <?php
        }
    } 
    ?>
</div>
    <?php 

    // Fetch product details from the database
    include('connection.php');
    $productId = $_GET['id']; // Assuming product ID is passed via GET parameter

    $sql = "SELECT *, qty FROM Products WHERE id = $productId";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Display product image, name, and price
        echo '<div class="product-container">';
        echo '<div class="product-image">';
        echo "<img src='admin/uploads/{$row['filename']}' alt='{$row['filename']}'>";
        echo '</div>';
        echo '<div class="product-details">';
        echo "<div class='product-name'>{$row['product']}</div>";
        echo "<div class='product-price'>रु {$row['price']}</div>";
        
        $availability = ($row['qty'] > 0) ? 'In Stock' : 'Out of Stock';
        echo "<div class='Ava'> Availability: <div class='availability'> $availability</div></div>";
        
        ?>
        <div class= cart-wishlist>

        <form action="cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <input type="hidden" name="quantity" value="1"> <!-- You can dynamically set quantity -->
        <button type="submit" class="add-to-cart">Add to Cart</button>
    </form>
    
    <form action="wishlist.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <button type="submit" class="add-to-cart">Add to Wishlist</button>
    </form>

    </div>
    <?php
  
        echo '</div>'; // Close product-details div
        echo '</div>'; // Close product-container div

       // Display product specifications
echo '<div class="product-specifications">';
echo '<div class="spec">Specifications:</div>';
$specificationsMapping = [
    'weight'=> 'Weight' ,
   'dimension'=> 'Dimension' ,
   'sim-type'=> 'Sim Type' ,
     'display-size'=>'Display size',
     'resolution'=>'Resolution',
     'refresh-rate'=>'Refresh Rate',
     'display-type'=>'Display Type',
    'os' =>'OS',
    'chipset' =>'Chipset',
    'ram' =>'RAM',
     'storage'=>'Internal Storage',
    'micro_sd_card'=> 'Micro SD Card',
     'back_camera'=>'Back Camera',
     'front_camera'=>'Front Camera',
     'security_sensor'=>'Security Sensor',
    'battery' =>'Battery'
];
foreach ($specificationsMapping as $column => $name) {
    if (isset($row[$column])) {
        echo "<div class='specification-item'>";
        echo "<span class='specification-label'>$name:</span>";
        echo "<span class='specification-value'>{$row[$column]}</span>";
        echo "</div>";
    }
}
echo '</div>';

        

    } else {
        echo "Product not found.";
    }

    // Close database connection
    mysqli_close($con);
    ?>
       
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
</head>
<body>
<h2>Submit Review</h2>

    <?php
include('connection.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "You must be logged in to submit a review." ;
    
}

// Fetch product ID from URL parameter
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
} else {
    echo "Product ID not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Review</title>
    <style>
       

        h2 {
            margin-top: 0;
            color:black;

        }

        .review-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;

        }

        label {
            display: block;
            margin-bottom: 5px;
            color:white;
        }

        textarea {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: calc(93% - 22px); /* Adjust width to match textarea */
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .review {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 20px;
}

.review p {
    margin: 0;
    padding: 5px 0;
}


.review p strong {
    font-weight: bold;
}

.review .rating {
    font-style: italic;
}

.review .submission-date {
    color: #888;
}

    </style>
</head>
<body>
    <div class="review-form">
        <form action="submit_review.php" method="post">
            <!-- Hidden input field to pass product ID to the form submission -->
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

            <label for="review">Review:</label>

            <select id="review" name="review" required>
                <option value="">Select Rating</option>
                <option value="worst">Worst</option>
                <option value="bad">Bad</option>
                <option value="average">Average</option>
                <option value="good">Good</option>
                <option value="awesome">Awesome</option>
            </select>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea>

            <input type="submit" value="Submit Review">
        </form>
    </div>


    <div class="reviews">
        <h2>Reviews</h2>
        <?php
        // Fetch reviews for this product from the database
        $sql = "SELECT username, review, description, submission_date FROM product_reviews WHERE product_id = $product_id ORDER BY submission_date DESC";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            // Output reviews
            while ($row = $result->fetch_assoc()) {
                echo "<div class='review'>";
                echo "<p><strong>Username:</strong> " . $row["username"] . "</p>";
                echo "<p><strong>Review:</strong> " . $row["review"] . "</p>";
                if (!empty($row["description"])) {
                    echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
                }
                echo "<p><strong>Submission Date:</strong> " . $row["submission_date"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No reviews found for this product.</p>";
        }
        ?>
    </div>
</body>
</html>
<?php
mysqli_close($con);
?>

</body>
</html>

<?php include("footer.php"); ?>
