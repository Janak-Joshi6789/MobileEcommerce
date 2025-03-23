<?php
include('connection.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if($result) {
        header("Location: add_products.php?message=Product deleted successfully");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($con);
    }
}
?>
