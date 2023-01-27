<?php
include ('session.php');
include ('dbconn.php');
$irfno=$_GET['irfno'];


							
                          $result= mysqli_query($conn,"select * from archincident where irfno='$irfno'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
								$irfno=$row['irfno'];
								$typeofincident=$row['typeofincident'];
								$datereported=$row['datereported'];
								$dateofincident=$row['dateofincident'];
								$placeofincident=$row['placeofincident'];
							}
							
			
			
			 mysqli_query($conn,"delete from archincident  where irfno='$irfno'")or die(mysql_error());
			 echo "<script>alert('Transfer Completed'); window.location='incident.php'</script>";
							
             mysqli_query($conn,"INSERT INTO incidentrpt(irfno,typeofincident,datereported,dateofincident,placeofincident)VALUES('$irfno','$typeofincident','$datereported','$dateofincident','$placeofincident')")or die(mysql_error());
			 echo "<script>alert('Transfer Completed'); window.location='incident.php'</script>";
							
							







?>