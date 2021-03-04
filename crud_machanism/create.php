<?php include 'inc/header.php';
	  include 'database.php';

?>

<?php
	$db = new Database();
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = mysqli_real_escape_string($db->link,$_POST['contact']);
    $query = "INSERT INTO tbl_user(name,email,contact) Values ('$name','$email','$contact')";
    $create = $db->create($query);
  }
?>
<div class="card">
  <div class="card-body">
    <form action="" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" required>
    </div>
    <div class="form-group">
      <label for="contact">Contact:</label>
      <input type="contact" class="form-control" id="contact" placeholder="Enter Your Contact" name="contact" required>
    </div>
    <button type="reset" class="btn btn-warning">Reset</button>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>  
  </div>
</div>

<?php include 'inc/footer.php';?>