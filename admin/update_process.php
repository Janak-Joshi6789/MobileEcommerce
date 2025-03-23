<?php
include('connection.php');

if(isset($_POST['update_product'])) {
    // Retrieve data from the form
    $id = mysqli_real_escape_string($con, $_POST['id']); // Sanitize the input to prevent SQL injection
    $product = mysqli_real_escape_string($con, $_POST['product']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $sim_type = mysqli_real_escape_string($con, $_POST['sim-type']);
    $display_size = mysqli_real_escape_string($con, $_POST['display-size']);
    $resolution = mysqli_real_escape_string($con, $_POST['resolution']); 
    $refresh_rate = mysqli_real_escape_string($con, $_POST['refresh-rate']);
    $os = mysqli_real_escape_string($con, $_POST['os']);
    $chipset = mysqli_real_escape_string($con, $_POST['chipset']);
    $ram = mysqli_real_escape_string($con, $_POST['ram']);
    $status = mysqli_real_escape_string($con, $_POST['status']); 
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $dimension = mysqli_real_escape_string($con, $_POST['dimension']);
    $display_type = mysqli_real_escape_string($con, $_POST['display_type']);
    $storage = mysqli_real_escape_string($con, $_POST['storage']);
    $micro_sd_card = mysqli_real_escape_string($con, $_POST['micro_sd_card']);
    $back_camera = mysqli_real_escape_string($con, $_POST['back_camera']);
    $front_camera = mysqli_real_escape_string($con, $_POST['front_camera']);
    $security_sensor = mysqli_real_escape_string($con, $_POST['security_sensor']);
    $battery = mysqli_real_escape_string($con, $_POST['battery']);

    // Check if a new image file was uploaded
    if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $filename = basename($_FILES["fileToUpload"]["name"]);
        $filepath = $target_file;

        // Upload the new image file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Delete the old image file, if it exists
            // You may want to perform additional checks before deleting the old file
            // For example, you can check if the old file exists and if it's different from the new file
            $old_filename = ''; // Add code to retrieve the old filename from the database
            if(!empty($old_filename) && file_exists($old_filename)) {
                unlink($old_filename);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // No new image file was uploaded, keep the existing image
        $filename = ''; // Add code to retrieve the existing filename from the database
        $filepath = ''; // Add code to retrieve the existing filepath from the database
    }

    // SQL query to update the product
    $sql = "UPDATE Products SET 
            product = '$product',
            category = '$category',
            price = '$price',
            qty = '$qty',
            `sim-type` = '$sim_type',
            `display-size` = '$display_size',
            resolution = '$resolution',
            `refresh-rate` = '$refresh_rate',
            os = '$os',
            chipset = '$chipset',
            ram = '$ram',

            weight = '$weight',
            dimension = '$dimension',
            `display_type` = '$display_type',
            storage = '$storage',
            `micro_sd_card` = '$micro_sd_card',
            `back_camera` = '$back_camera',
            `front_camera` = '$front_camera',
            `security_sensor` = '$security_sensor',
            battery = '$battery',
            status = '$status'";

    // Conditionally add filename and filepath to the update query if a new image was uploaded
    if(isset($filename) && !empty($filename) && isset($filepath) && !empty($filepath)) {
        $sql .= ", filename = '$filename', filepath = '$filepath'";
    }

    $sql .= " WHERE id = '$id'";

    // Execute the query
    $result = mysqli_query($con, $sql);

    if($result) {
        header("Location: add_products.php?message=Product updated successfully");
        exit();
    } else {
        echo "Error updating product: " . mysqli_error($con);
    }
} else {
    echo "Form submission error: update_product not set.";
}
?>
