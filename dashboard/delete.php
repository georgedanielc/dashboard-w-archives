<?php
include ('dbconn.php');

$barcode=$_GET['Barcode'];

mysqli_query($conn,"Delete from products where Barcode ='$barcode'") or die(mysql_error());	
echo "<script>alert('Successfully Deleted Product!'); window.location='inventory.php'</script>";	

?>