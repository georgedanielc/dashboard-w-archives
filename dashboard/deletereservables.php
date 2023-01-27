<?php
include ('dbconn.php');

$item_id=$_GET['item_id'];

mysqli_query($conn,"Delete from items where item_id ='$item_id'") or die(mysql_error());	
echo "<script>alert('Successfully Deleted Item!'); window.location='reservables.php'</script>";	

?>