<?php
include ('dbconn.php');
 echo "<script>alert('Transaction Completed');'</script>";
$barcode=$_GET['Barcode'];
$name=$_GET['name'];

							
                          $result= mysqli_query($conn,"select * from reservation where barcode_id='$barcode'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
								$username=$row['name'];
								$pname=$row['pname'];
								$price=$row['price'];
								$quantity=$row['quantity'];
								$pimage=$row['pimage'];
		
							}
							
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
			
			 mysqli_query($conn,"delete from reservation where barcode_id='$barcode' and name='$name'")or die(mysql_error());
			
							
             mysqli_query($conn,"INSERT INTO sold(Barcode,name,product,datesold,quantity,price,pimage)VALUES('$barcode','$username','$pname','$cur_date','$quantity','$price','$pimage')")or die(mysql_error());
			 echo "<script>alert('Transaction Completed'); window.location='reserveproducts.php'</script>";
							
							







?>