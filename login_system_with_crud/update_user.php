<?php 
  include "header.php";
?>
  <h2>Edit USER</h2>
  <?php 
    if(isset($_GET['update'])){
    $update_id = $_GET['update'];
    $select = "SELECT * FROM data_table WHERE id='$update_id'";
    $execute = mysqli_query($conn,$select);
    $row_user = mysqli_fetch_array($execute);
    $user_name = $row_user['name'];
    $user_email = $row_user['email'];
    $user_pass = $row_user['passward'];
    $user_image = $row_user['image'];
    $user_details = $row_user['details'];
  }

?>
  <form action="" method="post" class="was-validated" enctype="multipart/form-data">

    <div class="form-group">
      <label for="user_name">Name:</label>
      <input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>" required>
      <div class="valid-feedback">Valid.</div> 
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label for="user_email">Email:</label>
      <input type="email" class="form-control" value="<?php echo $user_email;?>"name="user_email" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" value="<?php echo $user_pass;?>" name="user_pswd" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label for="user_image">Image:</label>
      <input type="file" class="form-control" value="<?php echo $user_image;?>"name="user_image">
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <textarea class="form-control" name="user_details"><?php echo $user_details;?></textarea>
    </div>

    <input type="submit" class="btn btn-primary" name="user_update" Value="UPDATE"/>
  </form>

<?php
    if(isset($_POST['user_update'])){
        $nuser_name = $_POST['user_name'];
        $nuser_email = $_POST['user_email'];
        $nuser_pswd = $_POST['user_pswd'];
        $nuser_image = $_FILES['user_image']['name'];
        $ntmp_name = $_FILES['user_image']['tmp_name'];
        $nuser_details = $_POST['user_details'];

        if(empty($nuser_image)){
          $nuser_image = $user_image;
        }

        $update = "UPDATE data_table SET name='$nuser_name', email='$nuser_email',passward='$nuser_pswd', image='$nuser_image', details = '$nuser_details' WHERE id='$update_id'";

        $run_update = mysqli_query($conn,$update);

        if($run_update === true){
          echo "<span class='alert alert-success alert-dismissible fade show'>
            Update Successfully.
            </span>";
          move_uploaded_file($ntmp_name,"image/$nuser_image");
        }
        else{
          echo "<span class='alert alert-success alert-dismissible fade show'>
            Failed! To Update.
            </span>";
        }
      }  

?>
<br>
<a class="btn btn-primary" href="index.php">Back to View Data</a>

<?php include 'footer.php'; ?>