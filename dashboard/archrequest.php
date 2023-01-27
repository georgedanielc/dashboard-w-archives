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
            <div class="navbar-collapse collapse templatemo-sidebar">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="archives.php"><i class="fa fa-database"></i> Archives</a></li>
					                    <li><a href="appreq.php"><i class="fa fa-tasks"></i> Approved Requests</a></li>      
					                    <li><a href="appres.php"><i class="fa fa-tasks"></i> Approved Reservation</a></li> 	
					<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>										
                    <li class="active"> <a href="archrequest.php"><i class="fa fa-tasks"></i> Disaproved Requests</a></li>                    
                    <li><a href="archreservation.php"><i class="fa fa-globe"></i>Disaproved Reservations</a></li>
					<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>

						<li><a href="archbanner.php"><i class="fa fa-globe"></i> Deleted Banners</a></li>
						<li><a href="archnews.php"><i class="fa fa-globe"></i> Deleted News</a></li>
						<li><a href="archprojects.php"><i class="fa fa-globe"></i> Deleted Projects</a></li>
						<li><a href="archofficial.php"><i class="fa fa-globe"></i> Deleted Officials</a></li>
						<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>
						<li><a href="archincidents.php"><i class="fa fa-globe"></i> Deleted Incidents</a></li>
						<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>
						<li><a href="archresident.php"><i class="fa fa-bullseye"></i> Deleted Resident</a></li>
					<li><a href="archuser.php"><i class="fa fa-bullseye"></i> Deleted Users</a></li>
					<li><a href="archadmin.php"><i class="fa fa-bullseye"></i> Deleted Admin</a></li>
											<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>
						<li><a href="audittrail.php"><i class="fa fa-globe"></i> Audit Trail</a></li>
					
					
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
</nav>
        <div id="page-wrapper">
            <div class="row">
						      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>	
			<li><a href="archives.php">Archives</a></li>
            <li class="active">Request</a></li>

          </ol>
                <div class="col-lg-12">
                    <h1>Barangay Mahabang Parang <small>Disapproved Request</small></h1>
					
             
                </div>
            </div>
	
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Request Information</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">

								  

								  
							     <div class="button-search">
								<form method="POST">
                             

								
                                 </span>
                                 </div>
								  
							<!--Here starts the Table for the products-->
	





<table>
  <tr>
    <th>Name</th>
    <th>Purpose</th>
    <th>Requested Date</th>
	    <th>Date Disapproved</th>
	<th>Fullname</th>
	<th>Action</th>	
  </tr>

   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
    $txtsearch=$_POST['search-products'];
								$result= mysqli_query($conn,"select * from document_request where request_id LIKE '%$txtsearch%' or cert_id LIKE '%$txtsearch%' or or clear_id LIKE '%$txtsearch%'") or die (mysql_error());
	
	}
	else{
		
											$result= mysqli_query($conn,"select * from document_request where stats='Disapprove' ") or die (mysql_error());
		
	}

			while ($row= mysqli_fetch_array ($result) ){
				$request_id=$row['request_id'];
		
			?>
			
			
  <tr>
    <td><?php echo $row['iname']; ?></td>
	<td><?php echo $row['purpose']; ?></td>
	<td><?php echo $row['datereserved']; ?></td>
		<td><?php echo $row['datedisapp']; ?></td>
	<td><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></td>

	<td>

	 <a href="deleterequest.php<?php echo '?request_id='.$request_id; ?>"><button type="button" class="btn btn-primary btn-sm">Delete</button></a>
	 	 <a href="docremark.php<?php echo '?request_id='.$request_id; ?>"><button type="button" class="btn btn-primary btn-sm">View Remarks</button></a>
	</td>
  </tr>
  		<?php } ?>
</table>

							
							
							
							
							<!--Here ends the Table for the products-->
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
</body>
</html>
