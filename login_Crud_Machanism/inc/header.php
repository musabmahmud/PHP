<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/session.php";
Session::init();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<script type="text/javascript">
    setTimeout(function() {
  document.getElementById("loginmsg").style.display = 'none';
  document.getElementById("loginmsg").Window.location.reload();
}, 3000);
</script>
<?php
  if (isset($_GET['action']) && $_GET['action'] == "logout") {
    Session::destroy();
  }

?>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="http://myfreshhome.ca/cms/wp-content/uploads/2015/03/logo-loka.png" width="100" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button> 
            <div class="collapse navbar-collapse mr-auto justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <?php
                  $id = Session::get("id");
                  $userlogin = Session::get("login");
                  if($userlogin == true){
                  ?>
                    <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="?action=logout">Logout</a>
                    </li>
                  <?php  } 
                    else{
                  ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">Registration</a>
                    </li>
                  <?php }?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">