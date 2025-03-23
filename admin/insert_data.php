<?php
include('connection.php');

if(isset($_POST['add_product'])) {
    $product = $_POST['product'];
    $status = isset($_POST['status']) ? $_POST['status'] : 0; // Default to 0 if not provided
    if($product == "" || empty($product)) {
        header('location:add_categories.php?message=You need to fill in the product name!');
        exit; // Exit to prevent further execution
    } else {
        $query = "INSERT INTO `categories`(`category`, `status`) VALUES ('$product', '$status')";
        $result = mysqli_query($con, $query);
        if(!$result) {
            die("Query failed: " . mysqli_error($con));
        } else {
            header('location:add_categories.php?insert_msg=Your data had been successfully inserted');
            exit; // Exit after redirection
        }
    }
}
?>
