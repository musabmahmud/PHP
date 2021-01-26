<?php
  session_start();

  //db connection
  $conn = mysqli_connect('localhost','root', '' , 'webstar');
  if(mysqli_connect_errno()){
    echo "<span class='alert alert-success alert-dismissible fade show'>
            Failed! Connection.
            </span>";
    exit();
  }
  if(!isset($_SESSION['email'])){
    echo "<script>window.open('login.php','_self');
      </script>";
  }
?>
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

  	h2{
  		text-align: center;
      color: purple;
      margin-bottom: 30px;
  	}
    .margin_top{
      margin: 50px auto;
    }
    table,tr,td,th{
      border: 1px solid gray;
    }
    th{
      text-transform: uppercase;
    }
    span{
      margin: 50px;
    }
  </style>
</head>
<body>
<div class="container">

<br>
<a class="btn btn-danger float-right" href="logout.php">Logout</a>
<br>

<div class="margin_top">
