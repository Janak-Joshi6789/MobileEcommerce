<?php
include('connection.php');

// Check if product ID is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Retrieve product details from the database
    $sql = "SELECT * FROM Products WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No product found with this ID.";
        exit(); // Stop further execution
    }
} else {
    echo "Product ID is missing.";
    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <style>body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 20px;
}

h2 {
    color: #333;
}

form {
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"], input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}


img {
    margin-bottom: 10px;
}
</style>
</head>
<body>
    <h2>Update Product</h2>
    <form action="update_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <label for="product">Product Name:</label><br>
        <input type="text" id="product" name="product" value="<?php echo $row['product']; ?>"><br>
         

        
        <label for="category">Category:</label><br>
        <select id="category" name="category">
    <?php
    // Fetch categories from database
    $sql_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($con, $sql_categories);
    if(mysqli_num_rows($result_categories) > 0) {
        while($category_row = mysqli_fetch_assoc($result_categories)) {
            // Check if this category is selected
            $selected = ($row['category'] == $category_row['category']) ? 'selected' : '';
            echo "<option value='".$category_row['category']."' $selected>".$category_row['category']."</option>";
        }
    }
    ?>
</select><br>

        
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>"><br>
        
        <label for="qty">Quantity:</label><br>
        <input type="text" id="qty" name="qty" value="<?php echo $row['qty']; ?>"><br>
        
        <label for="sim-type">Sim Type:</label><br>
        <input type="text" id="sim-type" name="sim-type" value="<?php echo $row['sim-type']; ?>"><br>
        
        <label for="display-size">Display Size:</label><br>
        <input type="text" id="display-size" name="display-size" value="<?php echo $row['display-size']; ?>"><br>
        
        <label for="resolution">Resolution:</label><br>
        <input type="text" id="resolution" name="resolution" value="<?php echo $row['resolution']; ?>"><br>
        
        <label for="refresh-rate">Refresh Rate:</label><br>
        <input type="text" id="refresh-rate" name="refresh-rate" value="<?php echo $row['refresh-rate']; ?>"><br>
        
        <label for="os">OS:</label><br>
        <input type="text" id="os" name="os" value="<?php echo $row['os']; ?>"><br>
        
        <label for="chipset">Chipset:</label><br>
        <input type="text" id="chipset" name="chipset" value="<?php echo $row['chipset']; ?>"><br>
        
        <label for="ram">RAM:</label><br>
        <input type="text" id="ram" name="ram" value="<?php echo $row['ram']; ?>"><br>

        <label for="weight">Weight:</label><br>
        <input type="text" id="weight" name="weight" value="<?php echo $row['weight']; ?>"><br>    
        <label for="dimension">Dimension:</label><br>
        <input type="text" id="dimension" name="dimension" value="<?php echo $row['dimension']; ?>"><br>
        <label for="display_type">Display type:</label><br>
        <input type="text" id="display_type" name="display_type" value="<?php echo $row['display_type']; ?>"><br>
        <label for="storage">Storage:</label><br>
        <input type="text" id="storage" name="storage" value="<?php echo $row['storage']; ?>"><br>
        <label for="micro_sd_card">Micro Sd-Card:</label><br>
        <input type="text" id="micro_sd_card" name="micro_sd_card" value="<?php echo $row['micro_sd_card']; ?>"><br>
        <label for="back_camera">Back Camera:</label><br>
        <input type="text" id="back_camera" name="back_camera" value="<?php echo $row['back_camera']; ?>"><br>
        <label for="front_camera">front Camera:</label><br>
        <input type="text" id="front_camera" name="front_camera" value="<?php echo $row['front_camera']; ?>"><br>
        <label for="security_sensor">Security Sensor:</label><br>
        <input type="text" id="security_sensor" name="security_sensor" value="<?php echo $row['security_sensor']; ?>"><br>
        <label for="battery">Battery:</label><br>
        <input type="text" id="battery" name="battery" value="<?php echo $row['battery']; ?>"><br>
        <label for="status">Status:</label><br>
<select id="status" name="status">
    <option value="1" <?php echo $row['status'] == 1 ? 'selected' : ''; ?>>Active</option>
    <option value="0" <?php echo $row['status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
</select><br>


        <label for="image">Current Image:</label><br>
        <img src="<?php echo $row['filepath']; ?>" alt="<?php echo $row['filename']; ?>" height="100"><br>
        
        <label for="new_image">New Image:</label><br>
        <input type="file" id="new_image" name="fileToUpload"><br>
        
        <input type="submit" name="update_product" value="Update Product">
    </form>
</body>
</html>
