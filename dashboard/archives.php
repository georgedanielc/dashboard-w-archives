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
                    <li class="active"><a href="archives.php"><i class="fa fa-database"></i> Archives</a></li>
					                    <li><a href="appreq.php"><i class="fa fa-tasks"></i> Approved Requests</a></li>      
					                    <li><a href="appres.php"><i class="fa fa-tasks"></i> Approved Reservation</a></li> 	
					<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>										
                    <li><a href="archrequest.php"><i class="fa fa-tasks"></i> Disaproved Requests</a></li>                    
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
            <li class="active">Archives</a></li>

          </ol>
                <div class="col-lg-12">
                    <h1>Barangay Mahabang Parang <small>Archives</small></h1>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Welcome to Barangay Mahabang Parang Online Reservation and Monitoring System.
                        <br />
                        System Archives
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Monitoring</h3>
                        </div>
                        <div class="panel-body">


                            <div class="row alert-danger">
                                <div class="col-xs-5">
                                   <a href="archuser.php"> <i class="fa fa-user-circle fa-5x"></i></a>
                                </div>
                                <div class="col-xs-5 text-right">
											<?php
							$result = mysqli_query($conn,"SELECT * FROM archusers");
							$num_rows = mysqli_num_rows($result);
							?>
                                    <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text"> Deleted User/s</p>
                                </div>
                            </div>
							    <div class="row alert-danger">
                                <div class="col-xs-5">
                                    <a href="resident.php"> <i class="fa fa-users fa-5x"></i></a>
                                </div>
								
                                <div class="col-xs-5 text-right">
											<?php
							$result = mysqli_query($conn,"SELECT * FROM resident");
							$num_rows = mysqli_num_rows($result);
							?>
                                    <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text"> Deleted Residents</p>
                                </div>
                            </div>
                            <div class="row alert-success">
                                <div class="col-xs-5">
                                    <a href="reservation.php"> <i class="	fa fa-sticky-note 	 fa-5x"></i></a>
                                </div>
                                <div class="col-xs-5 text-right">
							<?php
							$result = mysqli_query($conn,"SELECT * FROM reservation_request  where stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
                                    <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text">Approved Reservation</p>
                                </div>
                            </div>
							 <div class="row alert-success ">
                                <div class="col-xs-5">
                                    <a href="request.php"> <i class="fa fa-sticky-note fa-5x"></i></a>
                                </div>
                                <div class="col-xs-5 text-right">
							<?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
                                    <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text">Approved Requests</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
					          <div class="col-lg-9">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="row templatemo-chart-row">
				             				  <div class="col-md-6 col-sm-6">
				  <div class="panel panel-primary">
				   <div class="panel-heading">
				   <h3 class="panel-title">Approved Requests</div>
                    <canvas id="templatemo-doughnut-chart"></canvas>
                    </div>
                     
                  </div>   
  <div class="col-md-6 col-sm-6">
					<div class="panel panel-primary">
                  <div class="panel-heading">
				  <h3 class="panel-title">Printed Requests</div>

                    <canvas id="templatemo-pie-chart"></canvas>

                     </div>
                  </div>
				  

                  


                </div>                       
              </div>
			  
                </div>                  
              </div>
            </div>
			</div>
			<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script type="text/javascript">


	var pieChartData = [
      {
		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Certificate of Indigency' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value:<?php echo $num_rows; ?>,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Certificate of Indigency"
      },
      {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Certificate of Death' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#577A3A",
        highlight: "#608341",
        label: "Certificate of Death"
      },
      {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Barangay Permit' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value:<?php echo $num_rows; ?>,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Barangay Permit"
      },

	  {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Certificate of Clamity Assistance' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#1919ff",
        highlight: "#3232ff",
        label: "Certificate of Clamity Assistance"
      },
	        {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Excavation Permit' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value:<?php echo $num_rows; ?>,
        color: "#8c19ff",
        highlight: "#9932ff",
        label: "Excavation Permit"
      },
	        {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Barangay Clearance' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#ff8c19",
        highlight: "#ff9932",
        label: "Barangay Clearance"
      },
	        {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Business Permit' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#1919ff",
        highlight: "#3232ff",
        label: "Business Permit"
      }

      ]
	  

	  

	
	var pieChartsData = [
      {
		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Certificate of Indigency' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value:<?php echo $num_rows; ?>,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Certificate of Indigency"
      },
      {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Certificate of Death' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#577A3A",
        highlight: "#608341",
        label: "Certificate of Death"
      },
      {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Barangay Permit' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value:<?php echo $num_rows; ?>,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Barangay Permit"
      },

	  {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Certificate of Clamity Assistance' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#1919ff",
        highlight: "#3232ff",
        label: "Certificate of Clamity Assistance"
      },
	        {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Excavation Permit' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value:<?php echo $num_rows; ?>,
        color: "#8c19ff",
        highlight: "#9932ff",
        label: "Excavation Permit"
      },
	        {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Barangay Clearance' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#ff8c19",
        highlight: "#ff9932",
        label: "Barangay Clearance"
      },
	        {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Business Permit' and stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#1919ff",
        highlight: "#3232ff",
        label: "Business Permit"
      }

      ]
	  
	  
      window.onload = function(){
        var ctx_pie = document.getElementById("templatemo-pie-chart").getContext("2d");
		var ctx_doughnut = document.getElementById("templatemo-doughnut-chart").getContext("2d");
		

        window.myPieChart = new Chart(ctx_pie).Pie(pieChartData,{
          responsive: true
        });
		window.myDoughnutChart = new Chart(ctx_doughnut).Doughnut(pieChartsData,{
          responsive: true
        });


      
      }
	  


    </script> 
		
								
							
							
							</div>
                        </div>
                    </div>
                </div>
				
            </div>
            <div class="row">

                        <div class="panel-body">
                            <div id="shieldui-grid1"></div>
                        </div>
                    </div>
                </div>
            </div>
  
        </div>
  
    </div>
   
	
</body>
</html>
