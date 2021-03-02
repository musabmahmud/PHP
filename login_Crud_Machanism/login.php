<?php
  include 'inc/header.php';
  include 'lib/user.php';
  Session::checkLogin();
?>

<?php
  $user = new User();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loging'])){
    $usrlogin = $user->userLogin($_POST);
  }
?>
<div class="container">
  <h2>Horizontal form</h2>
  <div id="loginmsg">
  <?php
     if (isset($usrlogin)) {
        echo $usrlogin;
     } 
  ?>
  </div>
  <form class="form-horizontal" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="Enter Your Email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default bg-primary text-uppercase text-right float-right" name="loging">Submit</button>
      </div>
    </div>
  </form>
</div>
