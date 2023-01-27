<?php
include ('dbconn.php');
include ('session.php');
$username=$_GET['username'];

			$result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$usernames=$row['fname']." ".$row['lname'];

			}
							

		

			
				
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");



			mysqli_query($conn,"delete  from archadmin where username='$username'")or die(mysql_error());
						  $sql="INSERT INTO audittrail(adminname,action,task,date)VALUES('$usernames','Permanent Delete','Admin $username','$cur_date')";
			
			
			if (mysqli_query($conn, $sql)) {
           echo "<script>alert('Permanently Deleted Admin!'); window.location='archuser.php'</script>";
            } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
			
			
						
						
						
					

?>