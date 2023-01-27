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

				<center><img src = "image/header.png" style = " margin-top:px; float:center; margin-:10px; width:1000px; height:350px;" ></center>
				<?php
				include ('dbconn.php');
				if (isset($_GET['iname']))
				$iname=$_GET['iname'];
				$result= mysqli_query($conn,"select * from document_request where iname='Barangay Clearance'") or die (mysql_error());

			
				while ($row= mysqli_fetch_array ($result) ){
			
					?>
	<H1><center><B>CERTIFICATION OF BARANGAY CLEARANCE</B></CENTER></h1>
	<br><?php } ?><?php else:?><?php endif;?>
		<H1><center><B>CERTIFICATION OF BARANGAY CLEARANCE</B></CENTER></h1>
				<?php
				include ('dbconn.php');
				if (isset($_GET['request_id']))
				$request_id=$_GET['request_id'];
				$result= mysqli_query($conn,"select * from document_request where request_id='$request_id'") or die (mysql_error());

			
				while ($row= mysqli_fetch_array ($result) ){
			
					?>
                <br>
	 <td colspan="2" rowspan="4">
                       <h2><b>
						<p>To Whom It May Concern</p>
                        <td class="text-right"><strong></strong></td>
                        <td class="text-right"></td>
                    </tr>
                    <tr>
                      <td colspan="2" rowspan="4">
						&nbsp;
                        <div class="a">
<p>      This is to certify that <?php echo$row['username'];?> is a bonafide resident and is presently residing at ADDRESS under the juris diction of BARANGAY MAHABANG PARANG, STA. MARIA, BULACAN.</p></div>
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
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<div align="bottom-left">
		<h2><b style="color:black;">NOT VALID WITHOUT SEAL
       </h2>		</b> </div>	
		<br/>
		<div align="right">
		<h2><b style="color:black;"><u> ANNALIZA AVINANTE
		</u><br>BARANGAY CLERK
       </h2>		</b> </div>	
		<br/>
		       

			<?php } ?>
				

<button type="submit" id="print" onclick="printPage()">Print</button>
<br />
<br />
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