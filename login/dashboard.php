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
    <title>Dashboard</title>
</head>
<!-- <link rel="stylesheet" href="dashboard.css"> -->
<style>
    #logo{
        width: 100px;
    }
    .container{
        display:flex;
        gap:45rem;
      
    }
    .btn{
        width:6rem;
        height:2rem;
        border-radius: 2rem;
        border-color: white;
        background-color: rgb(19,175,240);
        color:white;
        margin-top:2rem;

    }
    .btn1{
        width:6rem;
        height:2rem;
        border-radius: 2rem;
        border-color: white;
        background-color:red;
        color:white;
        margin-top:2rem;
        text-align:center;
        padding-top:.5rem
    }
    .btn:hover{
        opacity: .5;
        cursor: pointer;
    }
    h3{
        font-style:italic;
        color: rgb(19,175,240);
       text-align:center;
    }
    h4{
        padding-left:7rem;
    }
    .col3{
        display:flex;
        flex-direction:row;
        justify-content:center;
        align-items:center;
        /* background: rgb(19,175,240);; */
        gap:8rem;
        margin-top:5rem;
    }
    #bimg{
        width:300px;
        height:20rem;
        border-radius:50%
    }
    .strong{
        display:flex;
        flex-direction:column;
        gap:1rem;
    }
    .hr{
    width: 100%;
    height: 3px;
    background-color: grey  ;
    margin-top: 5rem;
}
#logo{
    padding-left:4rem;
}
</style>
<body>
   
        <div class="container">
        <div class="logo">
        <img src="nacus.png" alt="" id="logo">
        <!-- <h4>NACOSS VOTING SYSTEM</h4>  -->
    </div>
    <div class="buttons">
            <a href="../"><button class="btn">Back</button></a>
            <a href="logout.php"><button class="btn">Log out</button></a>
            <a href="../profile.php"><button class="btn">My Profile</button></a>
        </div>
        </div>
        <div class="main-con">
        <div class="fathercon">
        <div class="row">
            <div class="col">
                <!-- groups -->
                
                <h3>WELCOME <?php echo $data ['fullname'];?></h3>

                      
             
                <h4 class="candidate">PRESIDENTIAL CANDIDATES:</h4>
              <?php 
              $conn = mysqli_connect("localhost","root","","voting system");
             $query = mysqli_query($conn, "select * from `userdata`");
             while($row = mysqli_fetch_array($query)){
              ?>
                
                        <div class="row2">
                        <div class="col2">
                        <div class="col3">
                        <img src="uploads/<?php echo $row['photo'];?>" alt="user image" id="bimg"><br><br>
                        <div class="strong">
                        <strong class="text">User ID:000<?php echo $row['id']?></strong>
                            <strong class="text">Full Name:</strong>
                            <?php echo $row['fullname']?>
                            <strong class="text">Matric:</strong>
                            <?php echo $row['matric']?>
                             <strong class="text">Category:</strong>
                             <?php echo $row['groupname']?>
                            <strong class="text">Votes:</strong>
                            <?php echo $row['votes']?>
                            <form action="voting.php" method="POST">
                            <input type="hidden" name="groupvotes" value= "<?php echo $row['votes']?>">
                            <input type="hidden" name="groupid" value= "<?php echo $row['id']?>">
                            <?php 
                            if($_SESSION['status']==1 ){
                                ?>
                                <div class="btn1" id="btn1">you cant vote again</div>
                                <?php
                            }else{
                                ?>
                                 <button class="btn" type="submit" id="btn">vote</button>
                                 <?php
                                 
                            }
                            ?>
                                                

                        </div>
                        </div>
             </div>
             </div>
             <div class="hr"></div>



                        </form>
                <?php   
             }
             ?>

                 </div>
                </div>
                </div>
            </div>
            </div>    
        </div>
        </div>

</body>
</html>