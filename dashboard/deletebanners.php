<?php
include ('dbconn.php');

$b_id=$_GET['b_id'];

mysqli_query($conn,"Delete from banner where b_id ='$b_id'") or die(mysql_error());	
echo "<script>alert('Successfully Deleted Banner!'); window.location='inventory.php'</script>";	

?>