<!DOCTYPE html>
<html lang="en">

<?php include ('dbconn.php'); ?>
<?php include ('session.php'); ?>
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
	<script src="js/bootstrap.min.js"></script>
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
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="index.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li><a href="request.php"><i class="fa fa-tasks"></i> Pending Requests</a></li>                    
                    <li><a href="reservation.php"><i class="fa fa-globe"></i> Pending Reservations</a></li>
					<li><a href="message.php"><i class="fa fa-globe"></i> Message</a></li>
					<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>
					<li><a href="reservables.php"><i class="fa fa-globe"></i> Reservables</a></li>
					<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>

						<li><a href="banners.php"><i class="fa fa-globe"></i> Banners</a></li>
						<li><a href="news.php"><i class="fa fa-globe"></i> News And Announcements</a></li>
						<li class="active"><a href="projects.php"><i class="fa fa-globe"></i> Ongoing Projects</a></li>
						<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>
						<li><a href="resident.php"><i class="fa fa-bullseye"></i>Resident</a></li>
					<li><a href="users.php"><i class="fa fa-bullseye"></i>Resident Users</a></li>
					<li><a href="admin.php"><i class="fa fa-bullseye"></i>Admin Information</a></li>
                               
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
						        <?php
					        $result= mysqli_query($conn,"select * from messages") or die (mysql_error());
							$count=mysqli_num_rows($result);
		
							?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge"><?php echo $count; ?></span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><?php echo $count; ?> Reservations Pending</li>
                            <li class="message-preview">
                                <a href="reserveproducts.php">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Reservations Pending</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            
                        </ul>
                    </li>
                    
					<?php
						$user_query=mysqli_query($conn,"select * from users where username='$id_session'")or die(mysql_error());
	                    $row=mysqli_fetch_array($user_query); {
					
					?>
					
					
                    <li class="dropdown user-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?><b class="caret"></b></a>
					<?php } ?>
                       <ul class="dropdown-menu">
                           <li class="divider"></li>
                           <li><a href="../sessiondes.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                       </ul>
                   </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                                        <h1>Barangay Mahabang Parang <small>Reservations</small></h1>
					
             
                </div>
            </div>
	
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Reservation Information</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">
							<?php
							$reservation_id=$_GET['reservation_id'];
							
							$result= mysqli_query($conn,"select * from reservation_request where reservation_id='$reservation_id'") or die (mysql_error());
										
			                while ($row= mysqli_fetch_array ($result)){
				             $reservation_id=$row['reservation_id'];
							 $imagenochange=$row['image'];
							
							?>
									
							<form method="POST" enctype="multipart/form-data" action="">
							<div class="picture">
					         	 <label> Image
                                    </label>
							   <a href=""><?php if($row['image'] != ""): ?>
										<img src="reservables/<?php echo $row['image']; ?>" width="200px" height="150px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php else: ?>
										<img src="images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										</a>	
                                    <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" value=<?php echo $row['image']; ?>/>

							</div>
							
						
							<div class="products-add-info">
							
					
					
					   
						
							     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Name
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="pname" class="form-control"  placeholder="Enter Name" value="<?php echo $row['iname']; ?>">
								    </div>
									</div>
								
									
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Purpose
                                    </label>
									 <div class="form-padding-correction">
									 <textarea class="form-control" type="text" rows="3"  value="<?php echo $row['purpose']; ?>"></textarea>
							   
								    </div>
									</div>
									
																		<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Date reserved
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="person" class="form-control"  placeholder="Enter Person" value="<?php echo $row['datereserved']; ?>">
								    </div>
									
									</div>
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Username
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="date" class="form-control"  placeholder="Enter Date" value="<?php echo $row['username']; ?>">
								    </div>
									</div>

                            </div>
									
									
							<?php } ?>
					         
						
						            <div class="btn-addproducts">
									 <a href="projects.php"> <button type="button" class="btn btn-primary">Cancel</button></a>
									</div>
									
									  <div class="btn-cancel">
								  <button type="Submit" class="btn btn-success">Update Project</button>
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
			
		
			?>
			
			
			
			
			
			
			<!-- PHP for adding the products -->
			
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
</body>
</html>
