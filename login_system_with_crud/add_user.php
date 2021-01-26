<?php 
  include "header.php";
?>
  <h2>Add USER</h2>

  <form action="" method="post" class="was-validated" enctype="multipart/form-data">
    <div class="form-group">
      <label for="user_name">Name:</label>
      <input type="text" class="form-control"placeholder="Enter username" name="user_name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label for="user_email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter username" name="user_email" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"placeholder="Enter password" name="user_pswd" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <label for="user_image">Image:</label>
      <input type="file" class="form-control"placeholder="Upload Files" name="user_image" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>

    <div class="form-group">
      <textarea class="form-control" name="user_details" placeholder="Any Queries??"></textarea>
    </div>

    <input type="submit" class="btn btn-primary" name="user_insert" Value="Submit"/>
  </form>


<?php
    if(isset($_POST['user_insert'])){
      $user_name = $_POST['user_name'];
      $user_email = $_POST['user_email'];
      $user_pswd = $_POST['user_pswd'];

      $user_image = $_FILES['user_image']['name'];
      $tmp_name = $_FILES['user_image']['tmp_name'];

      $user_details = $_POST['user_details'];

      $insert = "INSERT INTO data_table(name,email,passward,image,details) VALUES('$user_name','$user_email','$user_pswd','$user_image','$user_details')";

      $run_insert = mysqli_query($conn,$insert);

      if($run_insert === true){
        echo "<span class='alert alert-success alert-dismissible fade show'>
            inserted Successfully
            </span>";
        move_uploaded_file($tmp_name,"image/$user_image");
      }

      if($run_insert === true){
              echo "<script>
                  window.open('index.php','_self');
              </script>";
      }
    }
?>
<?php include 'footer.php'; ?>

