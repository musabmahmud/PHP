<?php 
  include "header.php";
  
  //login connection
  if(!isset($_SESSION['email'])){
    echo "<script>window.open('login.php','_self');
      </script>";
  }
?>
<?php
  if(isset($_GET['del'])){
  $del_id = $_GET['del'];
  $delete = "DELETE FROM data_table WHERE id='$del_id'";
  $run_delete = mysqli_query($conn,$delete);
    if($run_delete === true){
      echo "<span class='alert alert-success alert-dismissible fade show'>
            Success! This data has been Deleted.
            </span>";
    }
    else{
      echo "<span class='alert alert-success alert-dismissible fade show'>
            Failed! To Deleted.
            </span>";
    }
  }
?>
<br>
<a class="btn btn-primary" href="add_user.php">Insert User</a>
<br>
  <h2>Viewed Data</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Passward</th>
        <th>Image</th>
        <th>Details</th>
        <th>Delete</th>
        <th>EDIT</th>
      </tr>
    </thead>
    <tbody>
<?php
  $select = "SELECT * FROM data_table";
  $run = mysqli_query($conn,$select);
  $i=0;
  while($row_user = mysqli_fetch_array( $run,MYSQLI_ASSOC)){
    $i++;
    $user_id = $row_user['id'];
    $user_name = $row_user['name'];
    $user_email = $row_user['email'];
    $user_pass = $row_user['passward'];
    $user_image = $row_user['image'];
    $user_details = $row_user['details'];
?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $user_name;?></td>
        <td><?php echo $user_email;?></td>
        <td><?php echo $user_pass;?></td>
        <td><img src="image/<?php echo $user_image;?>" width="100" height="100"></td>
        <td><?php echo $user_details;?></td>
        <td><a class="btn btn-danger" href="index.php?del=<?php echo $user_id;?>">Delete</a></td>
        <td><a class="btn btn-success" href="update_user.php?update=<?php echo $user_id;?>">Edit</a></td>
      </tr>
      <?php }?>
    </tbody>
  </table>


<?php include 'footer.php'; ?>