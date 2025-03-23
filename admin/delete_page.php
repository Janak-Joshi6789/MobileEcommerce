<?php
include('connection.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM categories WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if($result) {
        header("Location: add_categories.php?message=Category deleted successfully");
        exit();
    } else {
        echo "Error deleting category: " . mysqli_error($con);
    }
}
?>
