<?php
include ('dbconn.php');
include ('session.php');
$bofficial_id=$_GET['bofficial_id'];


			$result= mysqli_query($conn,"select * from bofficial where bofficial_id='$bofficial_id'") or die(mysql_error());	
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){

			}
			
			if ($row  < 0 ){
						
				           echo "<script>alert('Sorry'); window.location='products.php'</script>";
						   
						   
				
			}
			else{
			$result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['fname']." ".$row['lname'];

			}
							
			$result=mysqli_query($conn,"select * from archofficial where bofficial_id='$bofficial_id'") or die (mySQL_error());
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

			  $result= mysqli_query($conn,"select * from bofficial where bofficial_id='$bofficial_id'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
								$oname=$row['oname'];
								$bdate=$row['bdate'];
								$position=$row['position'];
								$oimage=$row['oimage'];
		
							}
			
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
			
			$d=strtotime("+1 Day");
			$due_date= date("Y-m-d H:i:s",$d);

			  
			mysqli_query($conn,"delete from bofficial where bofficial_id='$bofficial_id'")or die(mysql_error());;
			mysqli_query($conn,"INSERT INTO archofficial(oname,oimage,bdate,position,datedeleted)VALUES('$oname','$oimage','$bdate','$position','$cur_date')")or die(mysql_error());
			
			$sql="INSERT INTO audittrail(adminname,action,task,date)VALUES('$username','Delete','Official ( $oname )','$cur_date')";
			
			if (mysqli_query($conn, $sql)) {
           echo "<script>alert('Successfully deleted'); window.location='index.php'</script>";
            } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
			
			
						
						
						
					}
	
	
				
				
				
			}
				
							

							
                         
		
							







?>

<?php

			
			
			

			
			
							
                        







?>
