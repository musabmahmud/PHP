<?php
  include 'inc/header.php';
  include 'lib/user.php';
  Session::checkSession();
  $user = new User();
  $userdata = $user->getUserData();
?>
<div class="container">
<div id="loginmsg">
<?php
  $loginmsg = Session::get("loginmsg");
  if(isset($loginmsg)){
    echo $loginmsg;
    Session::set("loginmsg", NULL);
  }
  else{
    echo "failed to set";
  }
?>
</div>
<div class="card">
  <div class="card-header">
    <h2>Welcome
      <span class="float-right">
        <?php
          $username = Session::get("username");
          if(isset($username)){
            echo $username;
          }
        ?>
      </span>
    </h2>
  </div>

  <div class="card-body">
    <div class="table-responsive-sm">
    <table class="table table-dark table-striped table-bordered table-hover table-lg text-center">
      <thead>
        <tr class="text-uppercase text-danger">
          <th>ID</th>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
<?php 
    $i = 0;
  if($userdata){
    foreach ($userdata as $datavalue) {
      $i++;
?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $datavalue['name'];?></td>
          <td><?php echo $datavalue['username'];?></td>
          <td><?php echo $datavalue['email'];?></td>
          <td><a class="btn btn-primary" href="profile.php?id=<?php echo $datavalue['id']?>">View</a></td>
        </tr>
<?php
    }
  }
  else{
?>
    <h2>No Data Found</h2>
<?php  } ?>
      </tbody>
    </table>
    </div>
  </div>
  <div class="card-footer">All files Reserved @musab</div>
</div>
</div>