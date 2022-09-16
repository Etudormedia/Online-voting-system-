<?php
session_start();
include('connect.php');
if (isset($_POST['submit'])){

$fullname = $_POST['fullname'];
$matric = $_POST['matric'];
$password = $_POST['password'];
$groupname = $_POST['groupname'];
$std= $_POST['std'];

$sql = "select * from userdata where fullname='$fullname' and
matric='$matric' and password='$password' and std='$std' and groupname='$groupname'";

  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0){
        $sql = "SELECT fullname,matric,photo,votes,groupname,id from userdata where
        std = 'groups'";
        $resultgroup = mysqli_query($conn,$sql);
        if(mysqli_num_rows($resultgroup)>0){
            $groups = mysqli_fetch_all($resultgroup,MYSQLI_ASSOC);
            $_SESSION['groups'] =$groups;
        }
       
        

        $data = mysqli_fetch_array($result);
        $_SESSION['id']= $data['id'];
        $_SESSION['status']= $data['status'];
        $_SESSION['$data']= $data;

        echo '<script>
        window.location = "dashboard.php";
        </script>';
  }else{
    echo '<script>
    alert("invalid detailes")
    window.location = "form.php";
    </script>';
  };
  if($data == ""){
    echo '<script>
    alert("invalid detailes")
    window.location = "form.php";
    </script>';
  }
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
</head>
<link rel="stylesheet" href="form.css">
<body>
    
    <div class="container">
        <form action="form.php" method="POST" id="form" class="form">
            <h2>Login </h2>
            <div class="form_control" >
            <label for="username">Fullname</label>
            <input type="text" name="fullname" id="username"  placeholder="Enter your full name">
            <pop>Error message</pop>
        </div>
            <div class="form_control">
            <label for="email">Matric Number</label>
            <input type="text" name="matric" id="email" placeholder="Enter matric number">
            <pop>Error message</pop>
        </div>
            <div class="form_control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password">
            <pop>Error message</pop>
        </div>
        <div class="form_control" id="categories">
            <label for="select">Choose your category </label>
           <select name="std" id="std" class="categories">
            <option value="">choose category</option>
            <option value="group">President candidate</option>
            <option value="voter">Voter</option>
           </select>
        </div>
        <div class="form_control">
            <label for="groupname">Category</label>
            <input type="text" name="groupname" id="password" placeholder="Enter Group Category">
            <pop>Error message</pop>
        </div>
        <button type="submit" name="submit" id="btn">Login</button>
        <p>Dont have an account? <a href="./sign.php" class="reg" >Register here</a></p>

        </form>
    </div>

</body>
<!-- <script src="form.js"></script> -->
<script src="https://smtpjs.com/v3/smtp.js"></script>
</html>