<?php
  include 'inc/header.php';
  include 'lib/user.php';
?>
<?php
  $user = new User();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
    $usrRegi = $user->userRegistration($_POST);
  }
?>
<div class="container">
  <h2>Registration form</h2>

  <div id="loginmsg">
<?php
   if (isset($usrRegi)) {
      echo $usrRegi;
   } 
?>
</div>
<div class="card">
  <div class="card-header">
  <form class="form-horizontal" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">User Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter User Name" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="Enter Your Email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Enter Your Name" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 col-md-12">Confirm Password:</label>
      <div class="col-sm-10 col-md-10 col-md-offset-2">
        <input type="password" class="form-control" placeholder="Enter Your Name" name="conpassword">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default bg-primary text-uppercase text-right float-right" name="register">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
