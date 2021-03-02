<?php
  include 'inc/header.php';
  include 'lib/user.php';
  Session::checkSession();
?>
<?php
  $userid = Session::get("id");
  if(isset($_GET['id'])){
  	$userid = (int)$_GET['id'];
  }

  $user = new User();
  $userdata = $user->getUserbyId($userid);
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
    $updateUsr = $user->updateUsr($userid, $_POST);
  }
?>
<div class="container">
<div class="card">
  <div class="card-header">
  <div id="loginmsg">
  	<?php
   if (isset($updateUsr)) {
      echo $updateUsr;
	   } 
	?>
  </div>
    <h2>Update Profile
    <a class="btn btn-default bg-primary text-uppercase text-right float-right" href="index.php">Back</a>
	</h2>
  </div>
  <div class="card-body">
  <form class="form-horizontal" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" value="<?php echo $userdata->name;?>" placeholder="Enter Your Name" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">User Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" value="<?php echo $userdata->username;?>" placeholder="Enter User Name" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" value="<?php echo $userdata->email;?>" placeholder="Enter User Email" name="email">
      </div>
    </div>
    <?php
    $SessionId = Session::get("id");
    if($SessionId == $userid){
   	?>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default bg-primary text-uppercase text-left float-left" name="update">Update</button>
        <a class="btn btn-default bg-warning text-uppercase text-right float-right" href="changepass.php?id=<?php echo $userid;?>">Change Password</a>
      </div>
    </div>
    <?php }?>
	  </form>
		</div>
	 <div class="card-footer">All files Reserved @musab</div>
 </div>
</div>