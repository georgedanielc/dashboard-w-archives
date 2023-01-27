<?php
include ('dbconn.php');

$bofficial_id=$_GET['bofficial_id'];


mysqli_query($conn,"Delete from bofficial where bofficial_id ='$bofficial_id'") or die(mysql_error());	
echo "<script>alert('Successfully Deleted Official!'); window.location='bofficial.php'</script>";	

?>