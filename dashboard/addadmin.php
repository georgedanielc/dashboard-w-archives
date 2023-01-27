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

						<li><a href="resident.php"><i class="fa fa-bullseye"></i> Resident</a></li>
					<li><a href="users.php"><i class="fa fa-bullseye"></i> Resident Users</a></li>
					<li class="active"><a href="admin.php"><i class="fa fa-bullseye"></i> Admin Information</a></li><?php } ?><?php else:?><?php endif;?>
					
					
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
                    <h1>Barangay Mahabang Parang</h1>
					
             
                </div>
            </div>
	
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
					 <div class="panel-heading">
					<h3 class="panel-title">Admin Information</h3>
                     </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">
					
							<div class="products-add-info">
																		<?php
							$resident_id=$_GET['resident_id'];
							
							$result= mysqli_query($conn,"select * from resident where resident_id='$resident_id'") or die (mysql_error());

			                while ($row= mysqli_fetch_array ($result)){
				             $resident_id=$row['resident_id'];

							
							?>
<form method="POST" enctype="multipart/form-data" action="">
							
<?php } ?>
							
							     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Username
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="username" class="form-control"  placeholder="Enter Username">
								    </div>
									</div>
									
											<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Password
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="password" class="form-control" placeholder="Enter Password">
								    </div>
									</div>
									


									<!--<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Position 
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="price" class="form-control" placeholder="Enter Price">
								    </div>
									</div>
									-->
											<label class="control-label .col-lg-2" for="first-name">Position
                                    </label>
									 <div class="form-padding-correction">
									 <select type="text" name="position" class="form-control"  placeholder="Enter Information" required>
  <option value="Admin">Admin</option>
  <option value="Author">Author</option>

</select>

											<label class="control-label .col-lg-2" for="first-name">Barangay Position
                                    </label>
									 <div class="form-padding-correction">
									 <select type="text" name="brgyposition" class="form-control"  placeholder="Enter Information" required>
  <option value="BARANGAY CLERK">Barangay Clerk</option>
  <option value="BARANGAY SECRETARY">Barangay Secretary</option>
    <option value="BARANGAY KAGAWAD">Barangay Kagawad</option>
	  <option value="BARANGAY CHIEF">Barangay Chief</option>
	  	  <option value="BARANGAY CAPTAIN">Barangay Captain</option>

</select>

							         
								    </div>

						
						
						            <div class="btn-addproducts">
									 <a href="admin.php"> <button type="button" class="btn btn-primary">Cancel</button></a>
									</div>
									
								  <div class="btn-cancel">
								  <button type="Submit" class="btn btn-success">Add User</button>
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
if (isset($_GET['resident_id']))
$resident_id=$_GET['resident_id'];

$username = $_POST['username'];
$passwords=md5($password);
$password=$_POST['password'];
$position = $_POST['position'];

$brgyposition = $_POST['brgyposition'];



                    $result=mysqli_query($conn,"select * from users WHERE username='$username' ") or die (mySQL_error());
					$row=mysqli_num_rows($result);
					if ($row > 0)
					{
				    echo "<script>alert('Username Already active!'); window.location='adduser.php'</script>";

					}
					else
					{		
                   $result= mysqli_query($conn,"select * from resident where resident_id='$resident_id'") or die (mysql_error());

							while ($row= mysqli_fetch_array ($result) ){
								
$fname=$row['fname'];
$mname=$row['mname'];
$lname=$row['lname'];
$contact = $row['contact'];
$email = $row['email'];
$rimage = $row['rimage'];
$address = $row['address'];
$bdate = $row['bdate'];
$gender = $row['gender'];
							}
				   
				      mysqli_query($conn,"INSERT INTO logic(username,resident_id, email, password,position,brgyposition)
			 VALUES('$username', '$resident_id','$email', '$password','$position','$brgyposition')")or die(mysql_error());
						$sql="insert into users (username, password , contact ,email ,position , uimage ,resident_id,fname,mname,lname,address,bdate,gender,brgyposition	)
						values ('$username','$passwords',  '$contact','$email','$position','$rimage','$resident_id','$fname','$mname','$lname','$address','$bdate','$gender','$brgyposition')";
						
						if ($conn->query($sql) === TRUE) {
                   		echo "<script>alert('User successfully added!'); window.location='admin.php'</script>";
                        } else {
          "<script>alert('User successfully added!'); window.location='Admin.php'</script>";
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
</html>
