<!DOCTYPE html>
<html lang="en">

<?php include ('dbconn.php'); ?>
<?php include ('session.php'); ?>
<?php
if(!empty($_SESSION['id'])){
	$test=$_SESSION['id'];
	$test2=$_SESSION['login'];	
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/local.css" />
		<link rel="stylesheet" type="text/css" href="css/mine.css" />
    <script defer src="css/fontawesome-all.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<link href="images/icons/blogo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
<style>
.form-group > label, .checkbox > label {position:relative}
.form-group.required > label:before, .checkbox.required > label:before { 
    content:"\f069"; 
    position:absolute; 
    top:-2px;
    right:-10px;
    color:#c00 ;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: 200;
    text-decoration: inherit;
    font-size: 8px;
    }
	
		p {
  color: blue;
}
	</style>

</head>
<body>


  <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin Panel</a>
				<a class="navbar-brand" href="../index.php">Barangay Website</a>
				<?php if(($login=='SuperAdmin')||($login=='Admin')):?>
							<?php 		
  
		    $result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['username'];

		   ?>
				<a class="navbar-brand" href="print.php">Print Requests</a><?php } ?><?php else:?><?php endif;?>
				<?php if($login=='SuperAdmin'):?>
			<?php 		
  
		    $result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['username'];

		   ?>
		   <a class="navbar-brand" href="archives.php">Archives</a><?php } ?><?php else:?><?php endif;?>
            </div>
               <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li><a href="index.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
					<?php if($login=='Author'):?>
			<?php 		
  
		    $result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['username'];

		   ?><?php } ?><?php else:?>
                    <li>
					<?php
					        $result= mysqli_query($conn,"select * from document_request where stats = 'Pending'") or die (mysql_error());
							$count=mysqli_num_rows($result);
		
							?>
					<a href="request.php"><i class="fa fa-tasks"></i> Pending Requests&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $count; ?></span></a>  </li>   
					<?php
					        $result= mysqli_query($conn,"select * from reservation_request where stats = 'Pending'") or die (mysql_error());
							$count=mysqli_num_rows($result);
		
							?>					
                    <li><a href="reservation.php"><i class="fa fa-tasks"></i> Pending Reservations&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $count; ?></span></a>  </li> 
					<?php
					        $result= mysqli_query($conn,"select * from messages") or die (mysql_error());
							$count=mysqli_num_rows($result);
		
							?>	
					<li><a href="message.php"><i class="fa fa-envelope"></i> Message&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $count; ?></span></a>  </li> 
					
					<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>
					<?php
					        $result= mysqli_query($conn,"select * from messages") or die (mysql_error());
							$count=mysqli_num_rows($result);
		
							?>	
					<li><a href="reservables.php"><i class="fa fa-globe"></i> Reservables&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $count; ?></span></a>  </li><?php endif;?>
					<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>

						<li><a href="banners.php"><i class="fa fa-globe"></i> Banners</a>  </li>
						<li ><a href="news.php"><i class="fa fa-globe"></i> News And Announcements</a></li>
						<li><a href="projects.php"><i class="fa fa-globe"></i> Ongoing Projects</a></li>
						<li><a href="gallery.php"><i class="fa fa-globe"></i> Gallery</a></li>
						<li><a href="bofficial.php"><i class="fa fa-globe"></i> Barangay Official</a></li>
												<li><a href="faqs.php"><i class="fa fa-globe"></i> FAQ's</a></li>
						<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>
					<li><a href="incident.php"><i class="fa fa-bullseye"></i> Incident Report</a></li>

					<li><a href="comments.php"><i class="fa fa-bullseye"></i> Comments</a></li>
								<?php if(($login=='SuperAdmin')||($login=='Admin')):?>
			<?php 		
  
		    $result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['username'];

		   ?>
						<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>

						<li class="active"><a href="resident.php"><i class="fa fa-bullseye"></i> Resident</a></li>
					<li><a href="users.php"><i class="fa fa-bullseye"></i> Resident Users</a></li>
					<li><a href="admin.php"><i class="fa fa-bullseye"></i> Admin Information</a></li><?php } ?><?php else:?><?php endif;?>
					
					
								<?php if($login=='SuperAdmin'):?>
			<?php 		
  
		    $result= mysqli_query($conn,"select * from users where username='$id_session'") or die (mysql_error());
			$row=mysqli_num_rows($result);

			while ($row= mysqli_fetch_array ($result) ){
			$username=$row['username'];

		   ?>

			

					<li><a href="archives.php"><i class="fa fa-database"></i> Archives</a></li><?php } ?><?php else:?><?php endif;?>	
               
				</ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
						        <?php
					        $result= mysqli_query($conn,"select * from messages") or die (mysql_error());
							$count=mysqli_num_rows($result);
		
							?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge"><?php echo $count; ?></span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><?php echo $count; ?> New Message/s</li>
                            <li class="message-preview">
                                <a href = "message.php">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message" >Message</span></a>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    

                    <li class="dropdown messages-dropdown">
					                    
					<?php
						$user_query=mysqli_query($conn,"select * from users where username='$id_session'")or die(mysql_error());
	                    $row=mysqli_fetch_array($user_query); {
					
					?>
					
					
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></b></a></li>
<li><a href="../sessiondes.php"><i class="fa fa-power-off"></i> Log Out</a></li>

                      <?php } ?>
				
                       
                   </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                                         <h1>Barangay Mahabang Parang <small>Add Resident</small></h1>
					
             
                </div>
            </div>
	
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Resident Information</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">
								<h4 align="left">* indicates mandatory fields	</h4>
							<div class="products-add-info">
							
							<form method="POST" enctype="multipart/form-data" action="">

							     	<div class="form-padding">

					     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">First Name *
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" id="titlenewtide" name="fname" class="form-control"  required placeholder="Enter Information">
								    </div>
									</div>
									</div>
								
																     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Middle Name *
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="mname" id="mname"class="form-control" required  placeholder="Enter Information">
								    </div>
									</div>
									
																     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Last Name *
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="lname" id="lname" class="form-control" required  placeholder="Enter Information" >
								    </div>
									</div>
									
									
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Birth Place *
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="bplace" class="form-control" required  placeholder="Enter Information" >
								    </div>
									</div>
									
																											<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Birth Date *
                                    </label>
									 <div class="form-padding-correction">
								    <input type="date" name="bdate" required >
										
									
									</div>
									</div>
																		<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Address *
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="address" class="form-control"required  placeholder="Enter Information" >
								    </div>
									</div>
									
																		<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Contact Number
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="contact" class="form-control"  placeholder="Enter Information" >
								    </div>
									</div>

																		<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Email *
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="email" class="form-control"  required placeholder="Enter Information" >
								    </div>
									</div>
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Gender
                                    </label>
									

																		
									<select type="text" name="gender" class="form-control" >
									   <option value="">--</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  
								

</select>

							</div>
					
																											<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">PhilHealth No
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="phno" class="form-control" placeholder="Enter Information" >
								    </div>
									</div>																		<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Pagibig No
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="pgno" class="form-control"  placeholder="Enter Information" >
								    </div>
									</div>
									
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Voters Id
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="vid" class="form-control"  placeholder="Enter Information" >
								    </div>
									</div><div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Precint No
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="pno" class="form-control"  placeholder="Enter Information" >
								    </div>
									</div><div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Blood Type 
                                    </label>
									 <div class="form-padding-correction">
							        									<select type="text" name="bt" class="form-control" >
									   <option value="">--</option>
  <option value="A">A</option>
  <option value="B">B</option>.
    <option value="O">O</option>
  <option value="AB">AB</option>
  
								

</select>

								    </div>
									</div>
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Highest Educational Attainment
                                    </label>
									 <div class="form-padding-correction">
									<select type="text" name="hea" class="form-control" >
									   <option value="">--</option>
  <option value="Less Than 6th Grade">Less Than 6th Grade</option>
  <option value="High School No Diploma">High School No Diploma</option>
    <option value="High School Graduate">High School Graduate</option>
	  <option value="Some College">Some College</option>
    <option value="Associate Degree">Associate Degree</option>
    <option value="Bachelor's Degree">Bachelor's Degree </option>
	  <option value="Graduate or Professional Degree">Graduate or Professional Degree</option>
  
  
  
								

</select>
									</div><div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">House Ownership Status
                                    </label>
									 <div class="form-padding-correction">
									<select type="text" name="hos" class="form-control" >
									   <option value="">--</option>
  <option value="Sole Ownership">Sole Ownership</option>
  <option value="Joint Tenancy">Joint Tenancy</option>
    <option value="Community Property">Community Property</option>
	  <option value="Tenant">Tenant</option>

  
  
  
								

</select>
								    </div>
									</div><div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Land Ownership Status
                                    </label>
									 <div class="form-padding-correction">
									<select type="text" name="los" class="form-control" >
									   <option value="">--</option>
  <option value="Sole Ownership">Sole Ownership</option>
  <option value="Joint Tenancy">Joint Tenancy</option>
    <option value="Community Property">Community Property</option>
	  <option value="Tenant">Tenant</option>

  
  
  
  
  
  
								

</select>
								    </div>
									</div>
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Dwelling type
                                    </label>
									 <div class="form-padding-correction">
									<select type="text" name="dt" class="form-control" >
									   <option value="">--</option>
  <option value="Single house on one lot">Single house on one lot</option>
  <option value="Bungalow">Bungalow</option>
	  <option value="Townhouse">Townhouse</option>
	    <option value="Two houses on one lot">	Two houses on one lot</option>
    <option value="Dual occupancy">Dual occupancy</option>


  
  
  
								

</select>
								    </div>
									</div>

									
									
									
									
					                <div class="form-group">
                                   <label>Image input</label>
                                    <input type="file" name="image" required>
                                    </div>
									
						
						
						            <div class="btn-addproducts">
									 <a href="resident.php"> <button type="button" class="btn btn-primary">Cancel</button></a>
									</div>
									
								  <div class="btn-cancel">
								  <button type="Submit" class="btn btn-success" name="subnewtide" id="subnewtide" disabled="disabled" >Add Resident</button>
									</div>
						         </form>
								 
                                  </div>
							

							
							  
				
							</div>
                        </div>
                    </div>
                </div>
            </div>
			<!-- PHP for adding the products -->
			<?php 
			function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
			if ($_SERVER["REQUEST_METHOD"] == "POST"){

$contact = test_input($_POST["contact"]);
    if (!preg_match('/^[0-9]{11}+$/', $contact)) {
     echo "<script>alert('Error! Contact number not valid'); window.location='addresident.php'</script>";; 
    }
						else{	
			$file=$_FILES['image']['tmp_name'];
			$image = $_FILES["image"] ["name"];
			$image_name= addslashes($_FILES['image']['name']);
			$size = $_FILES["image"] ["size"];
			$error = $_FILES["image"] ["error"];
			
				if($size > 10000000000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
						
						else{
							
					move_uploaded_file($_FILES["image"]["tmp_name"],"resident/" . $_FILES["image"]["name"]);	
					
$book_image=$_FILES["image"]["name"];

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$bdate = $_POST['bdate'];
$bplace = $_POST['bplace'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$phno = $_POST['phno'];
$pgno = $_POST['pgno'];
$vid = $_POST['vid'];
$pno = $_POST['pno'];
$bt = $_POST['bt'];
$hea = $_POST['hea'];
$hos = $_POST['hos'];
$los = $_POST['los'];
$dt = $_POST['dt'];




						$sql="insert into resident (fname, mname, lname, bdate, bplace,contact, email,rimage,address,gender,phno,pgno,vid,pno,bt,hea,hos,los,dt) values 
						('$fname','$mname', '$lname', '$bdate', '$bplace','$contact','$email','$book_image','$address','$gender','$phno','$pgno','$vid','$pno','$bt','$hea','$hos','$los','$dt')";
						if ($conn->query($sql) === TRUE) { 
                   		echo "<script>alert('Resident successfully added!'); window.location='resident.php'</script>";
                        } else {
							echo "<script>alert('Error!'); window.location='addresident.php'</script>";
                        }

					}
					
							
							
						}
			}
				

			
			
			
			?>
			
			
			
			
			
			
			<!-- PHP for adding the products -->
			
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
</body>
<script type = "text/javascript">
function validate_mobile($contact)
{
    return preg_match('/^[0-9]{11}+$/', $contact);
}

</script>
<script type = "text/javascript">
jQuery("input[type='text']").on("keyup", function () {
    if (jQuery(this).val() != "" ) {
        if (jQuery("#titlenewtide").val() != '') 
        {
            jQuery("#subnewtide").removeAttr("disabled");
        }
		 else if (jQuery("#mname").val() != '') 
        {
            jQuery("#subnewtide").removeAttr("disabled");
        }
				 else if (jQuery("#lname").val() != '') 
        {
            jQuery("#subnewtide").removeAttr("disabled");
        }
    } else {
        jQuery("#subnewtide").attr("disabled", "disabled");
    }
});
</script>
</html>
