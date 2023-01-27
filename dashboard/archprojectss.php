<?php
include ('session.php');
include ('dbconn.php');
$project_id=$_GET['project_id'];

		    $result= mysqli_query($conn,"select * from projects where project_id='$project_id'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){

			}
			
			if ($row  < 0 ){
				
				
				           echo "<script>alert('Sorry Product Is out Of Stock'); window.location='products.php'</script>";
						   
						   
				
			}
			else{
				
	    $result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['fname']." ".$row['lname'];

			}
							
			$result=mysqli_query($conn,"select * from archprojects where project_id='$project_id' and author='$username'") or die (mysql_error());
					$row=mysqli_num_rows($result);
					$details=mysqli_fetch_array($result);
					if ($row > 0)
					{
						
						echo "<script>alert('Cannot delete'); window.location='products.php'</script>";
						
						
					}else{
						
						
				
			$result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['fname']." ".$row['lname'];

			}
							

		
		
		   	$result= mysqli_query($conn,"select * from projects where project_id='$project_id'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
								$pname=$row['pname'];
								$pimage=$row['pimage'];
								$info=$row['info'];
								$person=$row['person'];
								$date=$row['date'];
		
							}
			
				
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
			
			mysqli_query($conn,"delete from projects where project_id='$project_id'")or die(mysql_error());
			mysqli_query($conn,"INSERT INTO archprojects(pname,pimage,info,person,date,datedeleted)VALUES('$pname','$pimage','$info','$person','$date','$cur_date')")or die(mysql_error());
			
			$sql="INSERT INTO audittrail(adminname,action,task,date)VALUES('$username','Delete','Project $pname','$cur_date')";
			
			if (mysqli_query($conn, $sql)) {
           echo "<script>alert('Successfully deleted'); window.location='index.php'</script>";
            } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
			
		}
					}
					
                         

?>



						
					
	
							


