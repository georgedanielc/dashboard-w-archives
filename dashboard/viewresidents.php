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
                                        <h1>Barangay Mahabang Parang <small>Resident</small></h1>
					
             
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
							<?php
							$resident_id=$_GET['resident_id'];
							
							$result= mysqli_query($conn,"select * from resident where resident_id='$resident_id'") or die (mysql_error());
										
			                while ($row= mysqli_fetch_array ($result)){
				             $resident_id=$row['resident_id'];
							 $imagenochange=$row['rimage'];
							
							?>
									
							<form method="POST" enctype="multipart/form-data" action="">
							<div class="picture">
					         	 <label> User Image
                                    </label>
							   <a href=""><?php if($row['rimage'] != ""): ?>
										<img src="resident/<?php echo $row['rimage']; ?>" width="200px" height="150px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php else: ?>
										<img src="pimage/noimage.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										</a>	
                                   

							</div>
							
						
							<div class="products-add-info">
							
					
					
					   
						
							     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">First Name
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="fname" class="form-control"  placeholder="Enter Information" value="<?php echo $row['fname']; ?>  "disabled>
								    </div>
									</div>
								
																     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Middle Name
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="mname" class="form-control"  placeholder="Enter Information" value="<?php echo $row['mname']; ?>"disabled>
								    </div>
									</div>
									
																     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Last Name
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="lname" class="form-control"  placeholder="Enter Information" value="<?php echo $row['lname']; ?>"disabled>
								    </div>
									</div>
									
									
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Birthdate
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="bdate" class="form-control" placeholder="Enter Information" value="<?php echo $row['bdate']; ?>"disabled>
								    </div>
									</div>
									
																		<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Birth Place
									 <div class="form-padding-correction">
							         <input type="text" name="bplace" class="form-control"  placeholder="Enter Information" value="<?php echo $row['bplace']; ?>"disabled>
								    </div>
									
									</div>
									

									
																		<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Contact Number
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="contact" class="form-control"  placeholder="Enter Information" value="<?php echo $row['contact']; ?>" disabled>
								    </div>
									</div>

																		<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Email
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="email" class="form-control"  placeholder="Enter Information" value="<?php echo $row['email']; ?>" disabled>
								    </div>
									</div>
									
																		
















                            </div>
									
									
							<?php } ?>
					         
						
						            <div class="btn-addproducts">
									 <a href="resident.php"> <button type="button" class="btn btn-primary">Done</button></a>
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
			
			if ($_SERVER["REQUEST_METHOD"] == "POST"){
				$resident_id=$_GET['resident_id'];
				
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							
									if ($error > 0){
										

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$bdate = $_POST['bdate'];
$bplace = $_POST['bplace'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$skills = $_POST['skills'];
$philhealth_no = $_POST['philhealth_no'];
$pagibig_no = $_POST['pagibig_no'];
$voters_id = $_POST['voters_id'];
$precint_no = $_POST['precint_no'];
$blood_type = $_POST['blood_type'];
$highest_educational_attainment = $_POST['highest_educational_attainment'];
$house_ownership_status = $_POST['house_ownership_status'];
$land_ownership_status = $_POST['land_ownership_status'];
$dwelling_type = $_POST['dwelling_type'];
$former_address = $_POST['former_address'];
$current_address = $_POST['current_address'];
$remarks = $_POST['remarks'];

$still_profile1 = $imagenochange;

mysqli_query($conn,"update resident set fname='$fname', mname='$mname', lname='$lname', bdate='$bdate', bplace='$bplace', age='$age', contact='$contact',
email='$email', gender='$gender', skills='$skills', philhealth_no='$philhealth_no', pagibig_no='$pagibig_no', voters_id='$voters_id', precint_no='$precint_no',
blood_type='$blood_type', highest_educational_attainment='$highest_educational_attainment', house_ownership_status='$house_ownership_status',
land_ownership_status='$land_ownership_status', dwelling_type='$dwelling_type', former_address='$former_address', current_address='$current_address',
remarks='$remarks', rimage='$still_profile1' where resident_id='$resident_id'")or die(mysql_error());
echo "<script>alert('Successfully Updated Info!'); window.location='resident.php'</script>";		


										
										
										
									}
									
									else{
										
move_uploaded_file($_FILES["image"]["tmp_name"],"resident/" . $_FILES["image"]["name"]);			
$profile=$_FILES["image"]["name"];
								
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$bdate = $_POST['bdate'];
$bplace = $_POST['bplace'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$skills = $_POST['skills'];
$philhealth_no = $_POST['philhealth_no'];
$pagibig_no = $_POST['pagibig_no'];
$voters_id = $_POST['voters_id'];
$precint_no = $_POST['precint_no'];
$blood_type = $_POST['blood_type'];
$highest_educational_attainment = $_POST['highest_educational_attainment'];
$house_ownership_status = $_POST['house_ownership_status'];
$land_ownership_status = $_POST['land_ownership_status'];
$dwelling_type = $_POST['dwelling_type'];
$former_address = $_POST['former_address'];
$current_address = $_POST['current_address'];
$remarks = $_POST['remarks'];


								
								
mysqli_query($conn,"update resident set fname='$fname',mname='$mname', lname='$lname', bdate='$bdate', bplace='$bplace',age='$age',contact='$contact',
email='$email',gender='$gender',skills='$skills',philhealth_no='$philhealth_no',pagibig_no='$pagibig_no',voters_id='$voters_id',precint_no='$precint_no',
blood_type='$blood_type',highest_educational_attainment='$highest_educational_attainment',house_ownership_status='$house_ownership_status',
land_ownership_status='$land_ownership_status',dwelling_type='$dwelling_type',former_address='$former_address',current_address='$current_address',
remarks='$remarks', rimage='$profile' where resident_id='$resident_id'")or die(mysql_error());								
echo "<script>alert('Successfully Updated Info!'); window.location='resident.php'</script>";										
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
</html>
