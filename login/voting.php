<?php
session_start();
include('connect.php');


$vote=$_POST['groupvotes'];
$totalvotes = $vote+1;

$gid=$_POST['groupid'];
$uid=$_SESSION['id'];
 $conn = mysqli_connect("localhost","root","","voting system");
$updatevotes = mysqli_query($conn,"UPDATE userdata SET votes ='$totalvotes'
where id = '$gid'");


$updatestatus = mysqli_query($conn,"update userdata set status=1 where id='$uid'");
if($updatevotes and $updatestatus){
    $conn = mysqli_connect("localhost","root","","voting system");
    $query = mysqli_query($conn, "select * from `userdata` where std = ;group;");
    $groups=mysqli_fetch_all($query,MYSQLI_ASSOC);
    $_SESSION['groups']=$groups;
    $_SESSION['status']=1;

    // while($row = mysqli_fetch_array($query)){
    //         $_SESSION['groups']=$row;
    //         $_SESSION['status']=1;
            echo '<script>
            alert("Voting Successful");
            window.location="dashboard.php";  
            </script>';
    }else{
        echo '<script>
        alert("Voting Successful");
        // window.location="dashboard.php";  
        </script>';
    };

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
<!-- $conn = mysqli_connect("localhost","root","","voting system");
// mysql_select_db("voting system") or die("cannot select db");
$query=($conn);
if($query){
 mysqli_query($conn, "UPDATE userdata SET status = votes+1 WHERE std = 'group'");
    echo '<script>
    alert("successful");
    window.location="dashboard.php";  
    </script>';
} -->

<!-- else{
    echo '<script>
    alert("Try Again"); -->
    <!-- // window.location="dashboard.php";   -->
    </script>
}
</body>
<!-- <script>
    var count = 0;
    var voteCount = [];
    btn.addEventListener("click", ()=>{
        count ++;
        voteCount.push(count);
    })
</script> -->
</html>