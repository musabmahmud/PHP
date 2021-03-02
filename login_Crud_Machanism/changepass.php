<?php
  include 'inc/header.php';
  include 'lib/user.php';
  Session::checkSession();
?>
<?php
  if(isset($_GET['id'])){
  	$userid = (int)$_GET['id'];
  }

  $user = new User();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changepass'])){
    $updatePass = $user->updatePass($userid, $_POST);
  }
?>
<div class="container">
<div class="card">
  <div class="card-header">
  <div id="loginmsg">
    <?php
   if (isset($updatePass)) {
      echo $updatePass;
     } 
  ?>
  </div>
    <h2>Change Password
    <a class="btn btn-default bg-primary text-uppercase text-right float-right" href="profile.php?id=<?php echo $userid;?>">Back</a>
	</h2>
  </div>
  <div class="card-body">
  <form class="form-horizontal" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2">Old Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control"placeholder="Enter Your old Password" name="old_pass">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">New Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control"placeholder="Enter User Name" name="password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4">Confirm Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Enter User Email" name="con_pass">
      </div>
    </div>
    <?php
    $SessionId = Session::get("id");
    if($SessionId == $userid){
   	?>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default bg-primary text-uppercase text-left float-left" name="changepass">Change Password</button>
      </div>
    </div>
    <?php } ?>
	  </form>
		</div>
	 <div class="card-footer">All files Reserved @musab</div>
 </div>
</div>