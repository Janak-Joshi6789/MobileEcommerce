<?php
session_start();
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    $wishlistId = $_POST['wishlist_id'];
    $username = $_SESSION['username'];

    // Delete the item from the wishlist
    $sql = "DELETE FROM wishlist WHERE id = '$wishlistId' AND user_name = '$username'";
    if (mysqli_query($con, $sql)) {
        $_SESSION['wishlist_message'] = "Item removed from wishlist successfully.";
    } else {
        $_SESSION['wishlist_error'] = "Error removing item from wishlist: " . mysqli_error($con);
    }
} else {
    $_SESSION['wishlist_error'] = "Unauthorized access.";
}

mysqli_close($con);

// Redirect back to the view_wishlist.php page
header("Location: view_wishlist.php");
exit();
?>
