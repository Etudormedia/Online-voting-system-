<?php
include('connect.php');
if (isset($_POST['submit'])){
$fullname = $_POST['fullname'];
$matric = $_POST['matric'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$image = $_FILES['photo']['name'];
$std = $_POST['std'];
$groupname = $_POST['groupname'];


if($password != $password2){
    echo '<script>
        alert("password do not match");
    window.location = "../login/sign.php";
    </script>';
}
else{
    $dir = "uploads/";
    move_uploaded_file($_FILES['photo']['tmp_name'], $dir . $image);
    $insert = "insert into userdata (fullname,matric,password,photo,std,groupname,status,votes) values
    ('$fullname','$matric','$password','$image','$std','$groupname',0,0)";

        if (mysqli_query($conn,$insert)){
            echo '<script>
            alert("Registration Successful");
            window.location = "form.php";
        </script>';
    } else {
        echo  '<script>
        alert("Failed");
    </script>';
    }
   }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<link rel="stylesheet" href="form.css">
<body>
    
    <div class="container">
        <form action="sign.php" method="POST" enctype="multipart/form-data" id="form" class="form">
            <h2>Sign up </h2>
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
            <div class="form_control">
            <label for="password2"> Confirm Password</label>
            <input type="password" name="password2" id="password2" placeholder="Confirm Password">
            <pop>Error message</pop>
        </div>
            <div class="form_control">
            <label for="file" id="photo" >Upload your image </label>
            <input type="file" name="photo" >
        </div>

            <div class="form_control" id="categories">
            <label for="select">Choose your category </label>
           <select name="std" id="std" class="categories">
            <option value="">choose category</option>
            <option value="group">group</option>
            <option value="voter">Voter</option>
           </select>
        </div>
        <div class="form_control">
            <label for="groupname">Category</label>
            <input type="text" name="groupname" id="password" placeholder="Enter Group Category">
            <pop>Error message</pop>
        </div>
        <button type="submit" id="btn" name="submit">Register</button>
        <p>Already have an account? <a href="./form.php" class="reg" >Login</a></p>

        </form>
    </div>

</body>
<!-- <script src="form.js"></script> -->
<script src="https://smtpjs.com/v3/smtp.js"></script>
</html>