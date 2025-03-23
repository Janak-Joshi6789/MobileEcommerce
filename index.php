<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Trade Hub</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">


    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>.products-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-left: 30px;
            margin-top: 30px;
        }

        .product {
            width: 22%;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            margin-right: 30px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Add transition effect for transform and box-shadow */
        }

        .product:hover {
            transform: translateY(-3px); /* Move the product up by 3px on hover */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* Add a slight elevation effect with stronger shadow on hover */
        }

        .product img {
            max-width: 100%;
            height: 250px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .product-details {
            margin-top: 15px;
        }</style>

</head>
<body>

    <header>
        <h1>Mobile Trade Hub</h1>
        <p>Welcome to the best place for all your cell phone needs!</p>
    </header>

    <?php
include("header.php");
?>


    <div id="slider-container">
    <div id="slider">
    <div class="slide">
           <img src="image/Banner0.png" alt="Image 1">
            
        </div>
        <div class="slide">
           <img src="image/Banner1.png" alt="Image 2">
            
        </div>
        <div class="slide">
           <img src="image/Banner2.png" alt="Image 3">
            
        </div>
        <div class="slide">
           <img src="image/Banner3.png" alt="Image 4">
            
        </div>
        <!-- Add more slides as needed -->
    </div>
    <div id="prev">&lt;</div>
    <div id="next">&gt;</div>
</div>

<script>
    const slider = document.getElementById('slider');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const slideWidth = document.querySelector('.slide').clientWidth;
    let currentIndex = 0;

    function showSlide(index) {
        if (index < 0) {
            currentIndex = slider.children.length - 1;
        } else if (index >= slider.children.length) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }

        const translateValue = -currentIndex * slideWidth;
        slider.style.transform = `translateX(${translateValue}px)`;
    }

    function showNextSlide() {
        showSlide(currentIndex + 1);
    }

    function showPrevSlide() {
        showSlide(currentIndex - 1);
    }

    // Automatic sliding every 5 seconds
    setInterval(showNextSlide, 5000);

    // Event listeners for arrow buttons
    prevButton.addEventListener('click', showPrevSlide);
    nextButton.addEventListener('click', showNextSlide);
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65ddb5d58d261e1b5f65cf69/1hnl0sjlj';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


    <section style="padding-bottom:100px;">
        
        <h2 style="text-align:center; padding-top:100px">Featured Products</h2>
        <hr >
        <div class="products-container" id="products-container">
        <?php
        include('connection.php');

        // Fetch products with status 1 from the database
        $sql = "SELECT * FROM Products WHERE status = '1'ORDER BY Added_at DESC LIMIT 4";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                // Output product details
                echo "<div class='product' data-added-at='{$row['Added_at']}' data-price='{$row['price']}'>";

                echo "<a href='single_product.php?id={$row['id']}'>";
                echo "<img src='admin/uploads/{$row['filename']}' alt='{$row['filename']}'>";
                echo "</a>";

                echo "<div class='product-details'>";
                echo "<h3>{$row['product']}</h3>";
                echo "<p>Price: रु{$row['price']}</p>";
                echo "<p>Category: {$row['category']}</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No active products found.";
        }

        // Close database connection
        mysqli_close($con);
        ?>
    </div>
        
    </section>



    

    <?php
include("footer.php");

?>
</body>
</html>