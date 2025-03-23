<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Comparison</title>
    <style>
       table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

.product-image {
    max-width: 100px;
    max-height: 100px;
}

    </style>
</head>
<body>
    <h1 style="text-align:center; padding-top:50px;padding-bottom:40px;">Product Comparison</h1>

   
    <form action="compare.php" method="post"  style="padding-left:100px;padding-right:400px; display:flex; justify-content: space-between; padding-bottom:30px; ">
        <h2 >Select Products to Compare:</h2>
        <?php
        // Fetch products from the database and display dropdowns
        include('connection.php');
        $sql = "SELECT id, product FROM Products";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0) {
            echo "<select  name='product1'><option value=''  >Select Product 1</option>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['product']}</option>";
            }
            echo "</select>";

            mysqli_data_seek($result, 0); // Reset result pointer to fetch the products again
            echo "<select name='product2'><option value=''>Select Product 2</option>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['product']}</option>";
            }
            echo "</select>";
        } else {
            echo "No products found.";
        }
        mysqli_close($con);
        ?>
        <br><br>
        <input style="background-color:#555; color:white; border: none;border-radius:5px" type="submit" value="Compare">
    </form>

    <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product1Id = $_POST['product1'] ?? '';
        $product2Id = $_POST['product2'] ?? '';

        // Validate product selection
        if ($product1Id && $product2Id && $product1Id != $product2Id) {
            // Fetch product details from the database
            include('connection.php');
            $sql = "SELECT `product`, `category`, `price`, `sim-type`,  `display-size`,`resolution`, `refresh-rate`, `os`, `chipset`, `ram`, `weight`, `dimension`, `display_type`, `storage`, `micro_sd_card`, `back_camera`, `front_camera`, `security_sensor`, `battery` FROM Products WHERE id IN ($product1Id, $product2Id)";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) == 2) {
                echo "<h2>Comparison Results:</h2>";
                echo "<table border='1' >";
                echo "<tr><th>Attribute</th><th>Product 1</th><th>Product 2</th></tr>";
                $row1 = mysqli_fetch_assoc($result);
                $row2 = mysqli_fetch_assoc($result);
                foreach ($row1 as $key => $value) {
                    if ($key != 'id') {
                        echo "<tr>";
                        echo "<td>{$key}</td>";
                        echo "<td>{$value}</td>";
                        echo "<td>{$row2[$key]}</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
            } else {
                echo "Error: Two products not found.";
            }
            mysqli_close($con);
        } else {
            echo "Please select two different products for comparison.";
        }
    }
    ?>
</body>
</html>
