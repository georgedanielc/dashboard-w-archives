<?php
  
  		$timezone = "Asia/Manila";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$cur_date = date("Y-m-d H:i:s");

  	    $result= mysqli_query($conn,"select * from reservation") or die (mysql_error());
		while ($row = mysqli_fetch_array ($result) ){
			$datedue=$row['datedue'];
			$barcode=$row['barcode_id'];
			
			if($datedue<$cur_date){
				            $result= mysqli_query($conn,"select * from products where Barcode='$barcode'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								$quantity=$row['quantity'];
							}
							$totalquantity=$quantity+ 1;
							
						    mysqli_query($conn,"update products set quantity='$totalquantity' where Barcode='$barcode'")or die(mysql_error());
							
						    mysqli_query($conn,"delete from reservation where barcode_id='$barcode'")or die(mysql_error());
							
							echo "<script>window.location='reserveproducts.php'</script>";
				
				
				
			}

		}
		

  
?>