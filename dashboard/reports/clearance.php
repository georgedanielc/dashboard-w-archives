<html>
<?php include('../dbconn.php'); ?>
<?php include('../session.php'); ?>	
<script>window.print()</script>
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
		  <style type="text/css" media="print">
    @page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    html
    {
        background-color: #FFFFFF; 
        margin: 0px;  /* this affects the margin on the html before sending to printer */
    }

    body
    {
        border: solid 1px white ;
        margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
    }
	
</style>
</head>


<body><div class = "container">
		<div id = "header">
		<br/>
	<?php
				include ('dbconn.php');
				if (isset($_GET['request_id']))
				$request_id=$_GET['request_id'];
				$result= mysqli_query($conn,"select * from document_request where request_id='$request_id' ") or die (mysql_error());

			
				while ($row= mysqli_fetch_array ($result) ){
			
					?>
				<center><img src = "image/header.png" style = " margin-top:px; float:center; margin-:10px; width:1000px; height:350px;" ></center>

	<H1><center><B> BARANGAY CLEARANCE</B></CENTER></h1>
	
	
	
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
<p>      This i s to certify that the person whose name, signature,thumb marks and other personal data appearing hereon, has requested for a Barangay Clearance from this office.</p></div>
						&nbsp;
                        <div class="a">
<p>      This is to certify that <?php echo$row['fname'];?> <?php echo$row['mname'];?> <?php echo$row['lname'];?>is a bonafide resident and is presently residing at <?php echo $row['address'];?> under the jurisdiction of BARANGAY MAHABANG PARANG, STA. MARIA, BULACAN.</p></div>
<div class="a">
<p>      This certification is issued upon the request of the said person for whatever Legal intents and purpose it may serve.</p></div>
                        <td class="text-right"><strong></strong></td>
                        <td class="text-right"></td>
                    </tr>
                
				</h2>
				
			
			<?php } ?>
			
        <div align="center">
		<h2><div class="a"><b style="color:black;">Given this day of
		<?php include('currentdate.php'); ?>
       </h2>		</b> </div>	</div>
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
					<?php
						$user_query=mysqli_query($conn,"select * from users where username='$id_session'")or die(mysql_error());
	                    $row=mysqli_fetch_array($user_query); {
					
					?>
		<div class = "a" align="right" >
		<h2><u>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo$row['fname'];?> <?php echo$row['mname'];?> <?php echo$row['lname'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
		<b style="color:black;margin-right:20px"><br>&nbsp;&nbsp;&nbsp;<?php echo$row['brgyposition'];?>
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