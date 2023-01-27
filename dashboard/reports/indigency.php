<html>
<?php include('../dbconn.php'); ?>
<?php include('../session.php'); ?>	

<head>
		<title>Barangay Mahabang Parang</title>
		
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

p {
  font-family: "Arial", Times, serif;
}
div.a {
  text-indent: 50px;
}

		</style>
		
<script>

function printPage() {
    window.print();
}

</script>
		  <link rel="icon" type="image/png" href="favicon.jpg"/>
</head>


<body><div class = "container">
		<div id = "header">
		<br/>
	<?php
				include ('dbconn.php');
				if (isset($_GET['request_id']))
				$request_id=$_GET['request_id'];
				$result= mysqli_query($conn,"select * from document_request where request_id='$request_id'") or die (mysql_error());

			
				while ($row= mysqli_fetch_array ($result) ){
			
					?>
				<center><img src = "image/header.png" style = " margin-top:px; float:center; margin-:10px; width:1000px; height:350px;" ></center>

	<H1><center><B> CERTIFICATE OF INDIGENCY</B></CENTER></h1>
	
	
	
<img src = "../userimage/<?php echo $row['uimage'];?>" style = " margin-top:-100px; float:right; margin-:10px; width:200px; height:200px;" />
			
                <br>
	 <td colspan="2" rowspan="4">
                       <h2><b>
						<p>To Whom It May Concern:</p>
                        <td class="text-right"><strong></strong></td>
                        <td class="text-right"></td>
                    </tr>
                    <tr>
                      <td colspan="2" rowspan="4">
					  &nbsp;
                        <div class="a">
<p>      This is to certify that <?php echo$row['fname'];?> <?php echo$row['mname'];?> <?php echo$row['lname'];?> with address at <?php echo $row['address'];?>, Barangay Mahabang Parang, Santa Maria, Bulacan, is belonging to the indigent family in our Barangay. </p></div>
						&nbsp;
                        <div class="a">
<p>      As per records of this office, subject person has <u>NO DEROGATORY RECORDS</u></p></div>
<div class="a">
<p>      This certification is issued upon the request of the said person for whatever Legal intents and purpose it may serve.</p></div>
                        <td class="text-right"><strong></strong></td>
                        <td class="text-right"></td>
                    </tr>
                
				</h2>
				
			
			
			
        <div align="center">
		<h2><b style="color:black;">Given this day of
		<?php include('currentdate.php'); ?>
       </h2>		</b> </div>	
		<br/>
 <br/>
		<br/>
		<br/><br/><br/><br/>
		<div align="right" >
		<h3>_____________________________            
		<br><b style="color:black; margin-right:50px">Signature of Applicant
       </h3>		</b> </div>	
		<br/><br/><br/><br/>
		<div align="bottom-left">
		<h2><b style="color:black;">NOT VALID WITHOUT SEAL
       </h2>		</b>
		<img src = "image/thumb.png" style = " margin-top:-100px; float:right; margin-right:10px; width:150px; height:100px;" />	   </div>	
		<br/>

		<div align="right">
		<h2><u> ANNALIZA AVINANTE
		</u><b style="color:black;margin-right:20px"><br>BARANGAY CLERK
       </h2>		</b> </div>	
		<br/>
		       

			<?php } ?>
				

<button type="submit" id="print" onclick="printPage()">Print</button>

							<?php
							$result= mysqli_query($conn,"select * from user where user_id='$id_session'") or die (mysql_error());
							$row=mysqli_num_rows($result);
							while ($row= mysqli_fetch_array ($result) ){
									
							?>
                               <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:black; font-size:15px;">Prepared by:'."<br /><br /> ".$row['fname']." ".$row['lname']." ".'</span>';?></h2>
	                        <?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>