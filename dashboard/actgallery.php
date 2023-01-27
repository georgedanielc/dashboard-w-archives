<?php
include ('session.php');
include ('dbconn.php');
$galno=$_GET['galno'];

		    $result= mysqli_query($conn,"select * from archgallery where galno='$galno'") or die (mysql_error());
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
							
			$result=mysqli_query($conn,"select * from gallery where galno='$galno' and author='$username'") or die (mysql_error());
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
							

		
		
		   $result= mysqli_query($conn,"select * from archgallery where galno='$galno'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
								$info=$row['info'];
								$person=$row['person'];
								$likes=$row['likes'];
								$image=$row['image'];
								$date=$row['date'];
								$author=$row['author'];
		
							}
			
				
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
			
			mysqli_query($conn,"delete from archgallery where galno='$galno'")or die(mysql_error());
			mysqli_query($conn,"INSERT INTO gallery(info,person,likes,image,date,author)VALUES('$info','$person','$likes','$image','$date','$author')")or die(mysql_error());
			
			$sql="INSERT INTO audittrail(adminname,action,task,date)VALUES('$username','Restored','Project $pname','$cur_date')";
			
			if (mysqli_query($conn, $sql)) {
           echo "<script>alert('Successfully Restored'); window.location='index.php'</script>";
            } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }					
				}
					}
					    ?>

                  
	
							


