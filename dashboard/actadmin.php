<?php
include ('dbconn.php');
 echo "<script>alert('Transfer Completed');'</script>";
$username=$_GET['username'];


							
                          $result= mysqli_query($conn,"select * from archadmin where username='$username'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
								$username=$row['username'];
								$fname=$row['fname'];
								$mname=$row['mname'];
								$lname=$row['lname'];
								$password=$row['password'];
								$contact=$row['contact'];
								$email=$row['email'];
								$address=$row['address'];
								$uimage=$row['uimage'];
								$position=$row['position'];
							}
							
			
			
			 mysqli_query($conn,"delete from archadmin where username='$username'")or die(mysql_error());
			 echo "<script>alert('Transfer Completed'); window.location='archadmin.php'</script>";
							
              mysqli_query($conn,"INSERT INTO users(username,fname,mname,lname,password,contact,email,address,uimage,position)
			 VALUES('$username','$fname','$mname','$lname','$password','$contact','$email','$address','$uimage','$position')")or die(mysql_error());
			 echo "<script>alert('Transfer Completed'); window.location='archadmin.php'</script>";
							
							







?>