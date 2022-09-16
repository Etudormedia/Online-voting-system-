<?php
session_start();
$data = $_SESSION['$data'];
if($_SESSION['status']==1){
    $status = '<b class = "success">Voted</b>';
}else{
    $status = '<b class = "failed"> You have not Voted</b>';
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
<style>
    .col-user{
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        background: rgb(19,175,240);
        
    }
    strong{
        font-size:20px;
    }
</style>
<body>
<div class="col-user">
                        <h3 class="profile">MY PROFILE</h3>
                <!-- user profile -->
                <img src="../uploads/<?php echo $data ['photo']?>" alt="user image" id="bimg"><br><br>
                <strong class="text">Fullname:<?php echo $data ['fullname'];?><br><br>
</strong>
                <strong class="text">Matric Number:</strong>
                <?php echo $data ['matric'];?><br><br>
                <strong class="text">Category:</strong>
                <?php echo $data ['std'];?><br><br>
                <strong class="text">Group Name:</strong>
                <?php echo $data['groupname']?><br><br>
                <strong class="text">Status:</strong>
                <?php echo $status;?><br><br>


                 </div>
</body>
</html>