<?php
session_start(); 
session_destroy();
echo '<script>
alert("SUCCESFULLY LOGGED OUT")
window.location = "form.php";
</script>';
?>