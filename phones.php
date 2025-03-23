<?php
include("header.php");
include("userfunction.php");
?>
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

    
    
</style>
<div class="categories">
    <div class="category">
        <h1><a href="phones.php"  style="text-decoration: none; color: inherit;"> All Categories</a></h1>
    </div>

    <?php
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <div class="sort-section">
        <label for="sort">Sort by:</label>
        <select id="sort" onchange="sortProducts(this.value)">
            <option value="default">Default</option>
            <option value="new">New Products</option>
            <option value="old">Old Products</option>
            <option value="price_high">Price High to Low</option>
            <option value="price_low">Price Low to High</option>
        </select>
    </div>

    <div class="products-container" id="products-container">
        <?php
        include('connection.php');

        // Fetch products with status 1 from the database
        $sql = "SELECT * FROM Products WHERE status = '1'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                // Output product details
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
            echo "No active products found.";
        }

        // Close database connection
        mysqli_close($con);
        ?>
    </div>

    <script>
        function sortProducts(sortType) {
            let container = document.getElementById('products-container');
            let products = container.getElementsByClassName('product');
            let sortedProducts = Array.from(products);

            switch (sortType) {
                case 'new':
                    sortedProducts.sort((a, b) => {
                        return new Date(b.dataset.addedAt) - new Date(a.dataset.addedAt);
                    });
                    break;
                case 'old':
                    sortedProducts.sort((a, b) => {
                        return new Date(a.dataset.addedAt) - new Date(b.dataset.addedAt);
                    });
                    break;
                case 'price_high':
                    sortedProducts.sort((a, b) => {
                        return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                    });
                    break;
                case 'price_low':
                    sortedProducts.sort((a, b) => {
                        return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                    });
                    break;
                default:
                    // Default sorting, do nothing
                    break;
            }

            // Re-append sorted products to container
            container.innerHTML = '';
            sortedProducts.forEach(product => {
                container.appendChild(product);
            });
        }
    </script>
</body>
</html>
<?php include("footer.php"); ?>
