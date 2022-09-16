<?php
session_start();
include('connect.php');
?>
<html>
<head>
<title>
Admin Home Page
</title>
<style>
img{
    width:50px;
}
body{
    background:rgb(19,175,240);
}
.d{
    background:red;
    border:none;

}
</style>


</head>
<body>
<h2>ADMIN PAGE</h2>
<form action="deleteall.php" method="post">
                <input type="submit" name="delete" class="d" value="Delete All"/> 
                <input type="hidden" name="var" value="<?php echo $row['id']; ?>" />
                </form>     
<form id="updateform" method="post" action="adminhome.php">

<!--  -->
<?php 
              $conn = mysqli_connect("localhost","root","","voting system");
             $query = mysqli_query($conn, "select * from `userdata`");
             while($row = mysqli_fetch_array($query)){
              ?>
<table   border='5px solid black' border-collapse:"collapse" cellpadding='10' width="100%" cellspacing=""  >
    <thead>
        <tr>
            <th>Fullname</th>
            <th>Matric Number</th>
            <th>User ID</th>
            <th>Password</th>
            <th>Group</th>
            <th>Votes</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $row['fullname']?></td>
            <td><?php echo $row['matric']?></td>
            <td>000<?php echo $row['id']?></td>
            <td><?php echo $row['password']?></td>
            <td><?php echo $row['std']?></td>
            <td><?php echo $row['votes']?></td>
            <td class="photo"><img src="uploads/<?php echo $row['photo']?>"</td>
        

            <td align="center">
                <form action="delete.php" method="post">
                <input type="submit" name="delete" class="d" value="Delete User"/> 
                <input type="hidden" name="var" value="<?php echo $row['id']; ?>" />
                </form>      
            </td>      
           
        </tr>
    </tbody>
    
    
    <?php
             }
             ?>
</table>
</div>
</body>

</html>
