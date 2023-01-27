<?php
include ('dbconn.php');
 echo "<script>alert('Transfer Completed');'</script>";
$resident_id=$_GET['resident_id'];


							
                          $result= mysqli_query($conn,"select * from resident where resident_id='$resident_id'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
								$resident_id=$row['resident_id'];
								$fname=$row['fname'];
								$mname=$row['mname'];
								$lname=$row['lname'];
								$bdate=$row['bdate'];
								$contact=$row['contact'];
								$email=$row['email'];
								$bplace=$row['bplace'];
								$rimage=$row['rimage'];
		
							}
							
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
			
			 mysqli_query($conn,"delete from resident where resident_id='$resident_id'")or die(mysql_error());
			
							
             mysqli_query($conn,"INSERT INTO archresident(resident_id, fname, mname, lname, bdate, contact, email, bplace, rimage, datedeleted)
			 VALUES('$resident_id', '$fname', '$mname', '$lname', '$bdate', '$contact', '$email', '$bplace', '$rimage', '$cur_date')")or die(mysql_error());
			 
			 $sql="INSERT INTO audittrail(adminname,action,task,date)VALUES('$username','Disable','Resindent $fname','$cur_date')";
			 
			 echo "<script>alert('Transfer Completed'); window.location='resident.php'</script>";
							
							







?>