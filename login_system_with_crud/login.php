<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
    .login-form-bg{
      width: 100%;
      background: #00e1ff;
      padding: 50px 0;
      margin: 50px auto;
      border-radius: 10px;
    }
  </style>
</head>
<body>
<div class="container">
<div class="margin_top">
<div class="login-form-bg">
	<div class="row ">
		<div class="col-md-6 offset-md-3 form-body">
		    <h2>Login Now</h2>
		    <form class="login-form" action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">Username</label>
            <input type="text" name="email" class="form-control" placeholder="E-mail">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
            <input type="password" name="password" class="form-control" placeholder="password">
          </div>
          <div class="form-check">
            <input type="submit" value="submit" name="login-btn" class="btn btn-success float-right">
          </div>
        </form>
        <?php
        $conn = mysqli_connect('localhost','root', '' , 'webstar');
        if(mysqli_connect_errno()){
          echo "Database Connection Failed<br>";
        }
        if(isset($_POST['login-btn'])){
          $user_email = $_POST['email'];
          $user_pass = $_POST['password'];
          

          $select = "SELECT * FROM data_table";
          $run = mysqli_query($conn,$select);
          $row_user = mysqli_fetch_array( $run);
          $db_email = $row_user['email'];
          $db_pass = $row_user['passward'];
          if($user_email == $db_email){
              echo "<script>
                  window.open('index.php','_self');
              </script>";
              $_SESSION['email'] = $db_email;
          }
          else{
            echo "E-mail or Password wrong<br>";
          }
        }
        ?>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>
