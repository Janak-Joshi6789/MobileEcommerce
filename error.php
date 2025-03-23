<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            padding-top:180px;
            height:400px;
            padding-left:100px;
        }

        /* Header styles */
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php include('header.php'); ?>

    <div class="content">
        <h1>Error</h1>
        <p>Oops! Something went wrong. Please try again later.</p>
        <!-- Additional error information or instructions can be added here -->
    </div>

    <?php include('footer.php'); ?>

</body>
</html>
