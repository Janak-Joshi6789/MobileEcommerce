<?php 
include("connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Trade Hub</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">


    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .callus {
            background-image: url('image/bg.jpg');
            /* Adjust background properties as needed */
            background-size: cover;
            background-position: center;
            object-fit:cover;
            height:500px;
            width:100%;
            /* Add any other background properties */
        }
    </style>

</head>
<body >
<?php
include("header.php");
?>

    <section class="callus" > 
       
    <div class="headcall" >
    <p>We Will Be Happy To Assist</p>
    <h1>CONTACT US TO <br>FIND OUT MORE</h1>
</div>

        
        <div class="call">
            <div>
                <h2>Address</h2><br>
                <p>Bhaktapur,Nepal
                </p>
            </div>
            <div>
                <h2>Phone-Number</h2><br>
                <p><span>&#9742</span>01-49166676</p>
            </div>
            <div>
                <h2>E-mail</h2><br>
                <p><span>&#9993</span>info@mobilehub.org.np<br>
                </p>
            </div>
            <div>
                <h2>Opening Hours</h2><br>
                <p>24/7 </p>
            </div>
    </section>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.4982358011935!2d85.43662507370674!3d27.670991827097225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb05531bf45063%3A0xeec9e70e9a3ea1cc!2sKhwopa%20College%20of%20Engineering!5e0!3m2!1sen!2snp!4v1709030042234!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    
    <section class="contactUs" >
        <h1 class="text-center">Write Us And We'll Get Back To You</h1>
        <form class="form" style="background-color:#ababab;" action="contact1.php" name="myForm"  method="post">
            <div id="name" >
                <input class="form-input" type="text" name="fname" placeholder="Enter your name" required>
            </div>
            <div id="phone">
                <input class="form-input" type="text" name="fphone"  pattern="\d+"
                placeholder="Enter your phone number" required>
            </div>
            <div id="email">
                <input class="form-input" type="email" name="femail"  placeholder="Enter your email"
                    required>
            </div>
            <div id="text">
                <textarea class="form-input" name="ftext"  cols="30" rows="5"
                    placeholder="Elaborate your concern" required></textarea>
            </div>
            <input type="submit" name="submit" class="button-dark">
                

        </form>
    </section>
  
<?php
include("footer.php");

?>


    <div>

