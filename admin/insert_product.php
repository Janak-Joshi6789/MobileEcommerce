<?php
include('connection.php');

if(isset($_POST['add_product']))
{
  // Sanitize user inputs
  $product = mysqli_real_escape_string($con, $_POST['product']);
  $price = mysqli_real_escape_string($con, $_POST['price']);
  $qty = mysqli_real_escape_string($con, $_POST['qty']);
  $category = mysqli_real_escape_string($con, $_POST['category']);
  $sim = mysqli_real_escape_string($con, $_POST['sim-type']);
  $display = mysqli_real_escape_string($con, $_POST['display-size']);
  $resolution = mysqli_real_escape_string($con, $_POST['resolution']);
  $refresh = mysqli_real_escape_string($con, $_POST['refresh-rate']);
  $os = mysqli_real_escape_string($con, $_POST['os']);
  $chipset = mysqli_real_escape_string($con, $_POST['chipset']);
  $ram = mysqli_real_escape_string($con, $_POST['ram']);
  $weight = mysqli_real_escape_string($con, $_POST['weight']);
  $dimension = mysqli_real_escape_string($con, $_POST['dimension']);
  $display_type = mysqli_real_escape_string($con, $_POST['display_type']);
  $storage = mysqli_real_escape_string($con, $_POST['storage']);
  $micro = mysqli_real_escape_string($con, $_POST['micro_sd_card']);
  $back = mysqli_real_escape_string($con, $_POST['back_camera']);
  $front = mysqli_real_escape_string($con, $_POST['front_camera']);
  $security = mysqli_real_escape_string($con, $_POST['security_sensor']);
  $battery = mysqli_real_escape_string($con, $_POST['battery']);
  $status = mysqli_real_escape_string($con, $_POST['status']); 

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $filename = basename($_FILES["fileToUpload"]["name"]);
  $filepath = $target_file;

  // Check if product name is empty
  if($product == "" || empty($product))
  {
    header('location:add_products.php?message=You need to fill in the product name!');
    exit; // stop script execution
  }
  else{
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    // Perform the SQL query
    $query = "INSERT INTO products (`product`, `price`, `qty`, `category`, `sim-type`, `display-size`, `resolution`, `refresh-rate`, `os`, `chipset`, `ram`, `weight`, `dimension`, `display_type`, `storage`, `micro_sd_card`, `back_camera`, `front_camera`, `security_sensor`, `battery`, `status`, `filename`, `filepath`) 
              VALUES ('$product', '$price', '$qty', '$category', '$sim', '$display', '$resolution', '$refresh', '$os', '$chipset', '$ram', '$weight', '$dimension', '$display', '$storage', '$micro', '$back', '$front', '$security', '$battery', '$status', '$filename','$filepath')";
    $result = mysqli_query($con, $query);

    if(!$result)
    {
      die("Query failed: " . mysqli_error($con));
    }
    else
    {
      header('location:add_products.php?insert_msg=Your data has been successfully inserted');
      exit; // stop script execution
    }
  }
}
else
{
  // Redirect if the form was not submitted
  header('location:add_products.php');
  exit; // stop script execution
}
?>
