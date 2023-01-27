<?php
include ('dbconn.php');
 echo "<script>alert('Transfer Completed');'</script>";
$username=$_GET['username'];


							
                          $result= mysqli_query($conn,"select * from archusers where username='$username'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
								$username=$row['username'];
								$password=$row['password'];
								$contact=$row['contact'];
								$email=$row['email'];
								$uimage=$row['uimage'];
								$position=$row['position'];
							}
							
			
			
			 mysqli_query($conn,"delete from archusers  where username='$username'")or die(mysql_error());
			 echo "<script>alert('Transfer Completed'); window.location='archuser.php'</script>";
							
              mysqli_query($conn,"INSERT INTO users(username,password,contact,email,uimage,position)
			 VALUES('$username','$password','$contact','$email','$uimage','$position')")or die(mysql_error());
			 echo "<script>alert('Transfer Completed'); window.location='archuser.php'</script>";
							
							







?>