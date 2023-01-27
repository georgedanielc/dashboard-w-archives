<?php
include ('dbconn.php');
 echo "<script>alert('Reservation Deleted');'</script>";
$barcode=$_GET['Barcode'];
$name=$_GET['name'];

                            $result= mysqli_query($conn,"select * from reservation where Barcode='$barcode'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								$quantity=$row['quantity'];
							}
							$totalquantity=$quantity+ 1;
							
						    mysqli_query($conn,"update reservation set quantity='$totalquantity' where Barcode='$barcode'")or die(mysql_error());
							
						    mysqli_query($conn,"delete from sold where barcode_id='$barcode' and name ='$name'")or die(mysql_error());
							
							echo "<script>alert('Item Deleted'); window.location='sold.php'</script>";
							






?>