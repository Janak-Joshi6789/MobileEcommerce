<?php
include('connection.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Error fetching category: " . mysqli_error($con));
    }
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Update Category</h1>
    <form action="update_data.php" method="post">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="category">Category Name:</label>
            <input type="text" class="form-control" id="category" name="category" value="<?php echo $row['category']; ?>">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="1" <?php echo $row['status'] == 1 ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo $row['status'] == 0 ? 'selected' : ''; ?>>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
    </form>
</div>
</body>
</html>
