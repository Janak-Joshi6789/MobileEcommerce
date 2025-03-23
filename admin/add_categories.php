


<?php
include("top.php");
?>
<?php  include('connection.php');
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>








      <div class="container">

      <div class="box1">
      <h1>All Categories</h1>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Categories</button>
      </div>


      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Category-id</th>
            <th scope="col">Category</th>
            <th scope="col">Status</th>

            <th scope="col">Added at</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql="SELECT * FROM categories";

          $result=mysqli_query($con,$sql);

          if(!$result)
          {
            die("connection error");          
          }
          else
          {
            while($row=mysqli_fetch_assoc($result)){
              ?>

               <tr>
               <td><?php echo $row['id']?></td>
               <td><?php echo $row['category']?></td>
               <td><?php echo $row['status']?></td>

               <td><?php echo $row['created_at']?></td>
               <td><a href="update_page_1.php?id=<?php echo $row['id']?>" class="btn btn-success">Update</a></td>
               <td><a href="delete_page.php?id=<?php echo $row['id']?>" class="btn btn-danger" >Delete</a></td>
               </tr>
               




              <?php
            }
          }

         ?>
       
        </tbody>
      </table>

      <?php
      if (isset($_GET['message'])){
        echo "<h4>".$_GET['message']."</h4>";
      }
      ?>
      
      </div>

      <?php
      if (isset($_GET['insert_msg'])){
        echo "<h4>".$_GET['insert_msg']."</h4>";
      }
      ?>
      
      </div>




 
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>


</html>






<form action="insert_data.php" method="post" enctype="multipart/form-data">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Enter your product details here.</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">
        <label for="product name">Category Name</label>
        <input type="text" name="product" class="form-control">
        </div>

    
        <div class="form-group">
  <label for="status">Status</label>
  <select name="status" class="form-control">
    <option value="1">Active</option>
    <option value="0">Inactive</option>
  </select>
</div>




        
        
        
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_product" value="Add">
      </div>
    </div>
  </div>
</div>

<!-- modal end -->

</form>

<?php
include("bottom.php");

?>