<?php
include ('session.php');
include ('dbconn.php');
$reportno=$_GET['reportno'];

							
		    $result= mysqli_query($conn,"select * from incidentrpt where reportno='$reportno'") or die (mysql_error());
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
							
			$result=mysqli_query($conn,"select * from archincident where reportno='$reportno' and name='$username'") or die (mySQL_error());
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

		
		
		   $result= mysqli_query($conn,"select * from incidentrpt where reportno='$reportno'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
								$irfno=$row['irfno'];
								$typeofincident=$row['typeofincident'];
								$datereported=$row['datereported'];
								$dateofincident=$row['dateofincident'];
								$placeofincident=$row['placeofincident'];
		
							}
			
				
			$quantitytotal=$quantity-1;
			
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
			
			$d=strtotime("+1 Day");
			$due_date= date("Y-m-d H:i:s",$d);

			  
			mysqli_query($conn,"delete from incidentrpt where reportno='$reportno'")or die(mysql_error());;
			mysqli_query($conn,"INSERT INTO archincident(irfno,typeofincident,datereported,dateofincident,placeofincident,datedeleted)VALUES('$irfno','$typeofincident','$datereported','$dateofincident','$placeofincident','$cur_date')")or die(mysql_error());
			
			$sql="INSERT INTO audittrail(adminname,action,task,date)VALUES('$username','Delete','Incident Report #$irfno','$cur_date')";
			
			if (mysqli_query($conn, $sql)) {
           echo "<script>alert('Successfully deleted'); window.location='index.php'</script>";
            } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
			
			
						
						
						
					}
	
	
				
				
				
			}







			
                          
			



?>


	<!--			
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
			
			 mysqli_query($conn,"delete from incidentrpt where reportno='$reportno'")or die(mysql_error());
			 echo "<script>alert('Tsssed'); window.location='archives.php'</script>";
							
             mysqli_query($conn,"INSERT INTO archincident(irfno,typeofincident,datereported,dateofincident,placeofincident,datedeleted)VALUES('$irfno','$typeofincident','$datereported','$dateofincident','$placeofincident','$cur_date')")or die(mysql_error());
			 
			
						$user_query=mysqli_query($conn,"select fname from users where username='$id_session' and irfno from incidentrpt")or die(mysql_error());
	                    while ($row= mysqli_fetch_array ($user_query) ){
								
								$fname=$row['fname'];
								
		
							}
						
			 
			 mysqli_query($conn,"INSERT INTO audittrail(adminname,task,date)VALUES('$fname','$irfno','$cur_date')")or die(mysql_error()); 
			 
			 echo "<script>alert('Transfer Completed'); window.location='archives.php'</script>";
							
							


-->
