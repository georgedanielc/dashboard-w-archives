<?php
include ('session.php');
include ('dbconn.php');

    $Item_id=$_GET['item_id'];
	
		    $result= mysqli_query($conn,"select * from items where item_id='$Item_id'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$quantity=$row['quantity'];

			}
			
			if ($quantity < 0 ){
				
				
				           echo "<script>alert('Sorry Product Is out Of Stock'); window.location='services.php'</script>";
						   
						   
				
			}
			else{
				
	    $result= mysqli_query($conn,"select * from user where user_id='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['fname']." ".$row['lname'];

			}
	
	
	
	$result=mysqli_query($conn,"select * from reservation_request where item_id='$Item_id' and username='$username'") or die (mySQL_error());
					$row=mysqli_num_rows($result);
					$details=mysqli_fetch_array($result);
					if ($row > 0)
					{
						
						echo "<script>alert('Reservation Already Exist'); window.location='services.php'</script>";
						
						
					}else{
						
						

	        $result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['fname']." ".$row['lname'];
				
			}

		
		
		    $result= mysqli_query($conn,"select * from items where item_id='$Item_id'") or die (mysql_error());
			
			

			
			while ($row= mysqli_fetch_array ($result) ){
				$name=$row['rname'];
				$price=$row['price'];
				$bname=$row['bname'];
				$pimage=$row['pimage'];
				$quantity=$row['quantity'];
			}
			
				
			$quantitytotal=$quantity-1;
			
			$timezone = "Asia/Manila";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$cur_date = date("Y-m-d H:i:s");
			
			$d=strtotime("+1 Day");
			$due_date= date("Y-m-d H:i:s",$d);

			  
			mysqli_query($conn,"update products set quantity='$quantitytotal' where Barcode='$barcode'")or die(mysql_error());;

			
			$sql="INSERT INTO reservation(barcode_id,name,pname,price,quantity,datereserved,datedue,total,bname,pimage)
			VALUES('$barcode','$username','$productname','$price','1','$cur_date','$due_date','$price','$bname','$pimage')";
			
			if (mysqli_query($conn, $sql)) {
           echo "<script>alert('Product Added to Shopping Cart'); window.location='shoppingcart.php'</script>";
            } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
			
			
						
						
						
					}
	
	
				
				
				
			}
	
	
	
	
	
				
		
		
			
			
			
			
			
	      
		     	
		
		   



?>