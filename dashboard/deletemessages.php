<?php
include ('dbconn.php');
include ('session.php');
$msg_id=$_GET['msg_id'];


mysqli_query($conn,"Delete from archmessages where msg_id ='$msg_id'") or die(mysql_error());	
echo "<script>alert('Successfully Deleted Message!'); window.location='archives.php'</script>";	

?>