<?php
include('connection.php');

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $status = isset($_POST['status']) ? $_POST['status'] : 0; // Default to 0 if not provided
    $sql = "UPDATE categories SET category='$category', status='$status' WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if($result) {
        header("Location: add_categories.php?message=Category updated successfully");
        exit();
    } else {
        echo "Error updating category: " . mysqli_error($con);
    }
}
?>
