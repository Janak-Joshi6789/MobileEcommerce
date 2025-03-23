<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $productId = $_POST['product_id'];
    $username = $_SESSION['username']; // Assuming you have user authentication

    // Check if the product already exists in the wishlist for the user
    $check_sql = "SELECT * FROM wishlist WHERE user_name = '$username' AND product_id = '$productId'";
    $check_result = mysqli_query($con, $check_sql);
    if (mysqli_num_rows($check_result) == 0) {
        // If the product does not exist, insert it into the wishlist
        $sql = "INSERT INTO wishlist (user_name, product_id) VALUES ('$username', '$productId')";
        if (mysqli_query($con, $sql)) {
            $_SESSION['wishlist_message'] = "Product added to wishlist successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        $_SESSION['wishlist_message'] = "Product is already in the wishlist.";
    }
}

mysqli_close($con);
?>

<script>
    <?php if (isset($_SESSION['wishlist_message'])): ?>
        // Show alert box with success or error message
        // alert("<?php echo $_SESSION['wishlist_message']; ?>");
        // Redirect to another page after showing the alert
        window.location.href = 'view_wishlist.php';
    <?php endif; ?>
</script>
