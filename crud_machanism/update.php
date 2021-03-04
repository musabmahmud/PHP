<?php include 'inc/header.php';
	  include 'database.php';

?>

<?php
  $id = $_GET['id'];
	$db = new Database();
  $query = "SELECT * FROM tbl_user WHERE id = $id";
  $retrieve = $db->select($query)->fetch_assoc();
?>
<?php
    if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = mysqli_real_escape_string($db->link,$_POST['contact']);
    $query = "INSERT INTO tbl_user(name,email,contact) Values ('$name','$email','$contact')";
    $update = $db->update($query);
    }
?>
<?php
    if(isset($_POST['delete'])){
    $query = "DELETE FROM tbl_user WHERE id = $id";
    $delete = $db->delete($query);
    }
?>
<div class="card">
  <div class="card-body">
    <form action="update.php?id=<?php echo $id;?>" method="POST">
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control"placeholder="Enter Your Name" value="<?php echo $retrieve['name'];?>" name="name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Your Email"name="email" value="<?php echo $retrieve['email'];?>"  required>
    </div>
    <div class="form-group">
      <label for="contact">Contact:</label>
      <input type="contact" class="form-control" id="contact" placeholder="Enter Your Contact" value="<?php echo $retrieve['contact'];?>"  name="contact" required>
    </div>
    <button type="reset" class="btn btn-warning">Reset</button>
    <button type="submit" class="btn btn-primary" name="update">Submit</button>
    <button type="submit" class="btn btn-danger" name="delete" onclick="myFunction()">Delete</button>
  </form>  
  </div>
</div>

<?php include 'inc/footer.php';?>