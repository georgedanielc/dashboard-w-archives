<html>
<?php include('../dbconn.php'); ?>
<?php include('../session.php'); ?>	

<head>
		<title>Rifa Mortors</title>
		
		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}
		
@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		</style>
		
<script>

function printPage() {
    window.print();
}

</script>
		
</head>


<body>
	<div class = "container">
		<div id = "header">
		<br/>
				<center><img src = "image/logo.png" style = " margin-top:px; float:center; margin-:10px; width:300px; height:150px;" ></center>
				
			<button type="submit" id="print" onclick="printPage()">Print</button>	
			
			<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Sold Product List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>
						<table class="table table-striped">
						  <thead>
								<tr>
								<tr>
									<th>Barcode</th>
									<th>Name</th>
									<th>Product Name</th>
									<th>Date Sold</th>
									<th>Quantity</th>
									<th>Price</th>
							
								</tr>
								</tr>
						  </thead>   
						  <tbody>
						  
<?php

		    $result= mysqli_query($conn,"select * from sold") or die (mysql_error());
			$row=mysqli_num_rows($result);
			while ($row= mysqli_fetch_array ($result) ){
				


?>
							<tr>
							
								<td style="text-align:center;"><?php echo $row['Barcode']; ?></td> 
								<td style="text-align:center;"><?php echo $row['name']; ?></td> 
								<td style="text-align:center;"><?php echo $row['product']; ?></td> 
								<td style="text-align:center;"><?php echo $row['datesold']; ?></td> 
								<td style="text-align:center;"><?php echo $row['quantity']; ?></td> 
								<td style="text-align:center;"><?php echo $row['price']; ?></td> 
			
								
							</tr>
			<?php } ?>
				
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
							$result= mysqli_query($conn,"select * from user where user_id='$id_session'") or die (mysql_error());
							$row=mysqli_num_rows($result);
							while ($row= mysqli_fetch_array ($result) ){
									
							?>
                               <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br /><br /> ".$row['fname']." ".$row['lname']." ".'</span>';?></h2>
	                        <?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>