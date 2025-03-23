<?php
include("header.php");
include("userfunction.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>



    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
        }

        .products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-left: 30px;
            margin-top: 30px;
        }

        .product {
            width: 22%;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            margin-right: 30px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Add transition effect for transform and box-shadow */
        }

        .product:hover {
            transform: translateY(-3px); /* Move the product up by 3px on hover */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* Add a slight elevation effect with stronger shadow on hover */
        }

        .product img {
            max-width: 100%;
            height: 250px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .product-details {
            margin-top: 15px;
        }

        .sort-section {
            margin: 20px 0;
        }

        .sort-section {
    top: 20px;
    right: 20px;
    z-index: 999; /* Ensure it's above other content */
    background-color: #ffffff; /* Background color */
    border: 1px solid #ccc; /* Border */
    border-radius: 5px; /* Rounded corners */
    padding: 10px; /* Padding */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Shadow */
}

.sort-section label {
    font-weight: bold; /* Bold label */
    margin-right: 5px; /* Add space between label and select */
}

.sort-section select {
    padding: 5px; /* Padding for select */
    border-radius: 3px; /* Rounded corners */
    border: 1px solid #ccc; /* Border */
    outline: none; /* Remove outline */
    transition: border-color 0.3s ease; /* Smooth transition for border color */
}

.sort-section select:hover,
.sort-section select:focus {
    border-color: #333; /* Change border color on hover/focus */
}



    </style>


</head>
<body>
    
    <h1>Search Results</h1>

    <div class="products-container" id="products-container">
    <?php
    // Check if the search query is set
    if(isset($_GET['query'])) {
        // Get the search query
        $query = $_GET['query'];

        // Connect to your database (Replace with your database details)
        $db_host = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'mobile';

        $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

        // Check if the connection was successful
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to search for products

        
        $sql = "SELECT * FROM products WHERE product LIKE '%$query%'";

        // Execute the query
        $result = mysqli_query($conn, $sql);
 
        // Check if there are any results
        if(mysqli_num_rows($result) > 0) {
            // Display the results
            while($row = mysqli_fetch_assoc($result)) {
                // echo "<p>{$row['product']}</p>";
                echo "<div class='product' data-added-at='{$row['Added_at']}' data-price='{$row['price']}'>";

                echo "<a href='single_product.php?id={$row['id']}'>";
                echo "<img src='admin/uploads/{$row['filename']}' alt='{$row['filename']}'>";
                echo "</a>";

                echo "<div class='product-details'>";
                echo "<h3>{$row['product']}</h3>";
                echo "<p>Price: रु{$row['price']}</p>";
                echo "<p>Category: {$row['category']}</p>";
                echo "</div>";
                echo "</div>";

                
            }

            
        } else {
            echo "No results found";
        }

        // Close the connection
        mysqli_close($conn);
    } else {
        // If the search query is not set, display a message
        echo "Please enter a search query";
    }
    ?>

</div>


</body>
</html>

<?php include("footer.php"); ?>
