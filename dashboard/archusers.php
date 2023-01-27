<?php
ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
include ('dbconn.php');
include ('session.php');
if (isset($_GET['username']))
				$username=$_GET['username'];
				
								
			$result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$usernames=$row['fname']." ".$row['lname'];

			}
							
                          $result= mysqli_query($conn,"select * from users where username='$username'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
	
								$username=$row['username'];
								$password=$row['password'];
								$contact=$row['contact'];
								$email=$row['email'];
								$uimage=$row['uimage'];
								$position=$row['position'];
		
							}
							
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
										
	
					$sql="delete from users where username='$username'";		
             mysqli_query($conn,"INSERT INTO archusers(username, password, contact, email, uimage, position, datedeleted)
			 VALUES('$username','$password', '$contact', '$email', '$uimage', '$position', '$cur_date')")or die(mysql_error());
			 
							
							
if (mysqli_query($conn, $sql)) {
           echo "<script>alert('Successfully deleted'); window.location='index.php'</script>";
            } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
			
			

			




?>

