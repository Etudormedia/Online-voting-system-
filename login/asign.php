<?php
include('connect.php');
if (isset($_POST['submit'])){
$admin = $_POST['username'];
$password = $_POST['password'];


   
    $insert = "insert into admin (username,password) values
    ('$admin','$password')";

        if (mysqli_query($conn,$insert)){
            echo '<script>
            alert("Registration Successful");
        </script>';
    } else {
        echo  '<script>
        alert("Failed");
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
    <title>Document</title>
</head>
<body>
<div class="container">
        <form action="form.php" method="POST" id="form" class="form">
           
            <div class="form_control" >
            <label for="username">Username</label>
            <input type="text" name="username" id="username"  placeholder="Enter your full name">
        </div>
            <div class="form_control">
            <label for="email">Password</label>
            <input type="password" name="password" id="email" placeholder="Enter matric number">
        </div>
        <button type="submit" name="submit" id="btn">Sign</button>


        <!-- vercel  -->
</body>
</html>
