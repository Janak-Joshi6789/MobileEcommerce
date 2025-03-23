<?php 
         require('connection.php');
         session_start(); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Trade Hub</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        .nav-link {
            display: inline-block;
            /* Add your default styles here */
        }

        .nav-link.current {
            /* Add styles for the current link here */
            font-weight: bold;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); 
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) === 'index.php') echo 'current'; ?>">Home</a>
        <a href="phones.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) === 'phones.php') echo 'current'; ?>">Phones</a>
        <a href="compare.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) === 'compare.php') echo 'current'; ?>">Compare</a>
        <a href="contact.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) === 'contact.php') echo 'current'; ?>">Contact</a>

        <form action="search_results.php" method="GET" style="display: inline-block;">
            <input type="text" name="query" placeholder="Search for products...">
            <button type="submit">Search</button>
        </form>

        <a href='view_cart.php' class="nav-link <?php if(basename($_SERVER['PHP_SELF']) === 'view_cart.php') echo 'current'; ?>"><i style='font-size:24px' class='fa'>&#xf07a;</i></a>
        <a href='view_wishlist.php' class="nav-link <?php if(basename($_SERVER['PHP_SELF']) === 'view_wishlist.php') echo 'current'; ?>"><i style="font-size:24px" class="fa">&#xf08a;</i></a>
        <a href="myorder.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) === 'myorder.php') echo 'current'; ?>">My Orders</a>

        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            echo "<div style='float: right';>
               <p style='text-align:center; color:white;display: inline-block;'> $_SESSION[username]</p>
                <a href='logout.php' style='display: inline-block;' ><i class='fa-solid fa-right-from-bracket'></i> Logout</a>
                </div>
            ";
        } else {
            echo "<a href='user_log_reg.php'>Login</a>";
        }
        ?>
    </nav>
</body>
</html>