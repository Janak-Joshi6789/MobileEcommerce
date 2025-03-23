<?php
include("connection.php");

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $fphone = $_POST['fphone'];
    $email = $_POST['femail'];
    $text = $_POST['ftext'];

    $query = "INSERT INTO `form`(`fname`, `fphone`, `email`, `text`) VALUES ('$fname','$fphone','$email','$text')";
    
    $data = mysqli_query($con, $query);

    if (!$data) {
        echo "<script>alert('Error in Submission!!!');</script>";
    } else {
        echo "<script>alert('Form submitted')</script>";
        echo '<script>window.location.href="contact.php";</script>';
        exit; // Important to stop further execution after redirection
    }
}
?>
