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
<STYLE>
.link
{
   color:darkgreen;
   text-decoration: none; 
   background-color: none;
}
a {
	text-decoration: none; background-color: none; 
	}
	
	.links
{
   color:#A62626;
   text-decoration: none; 
   background-color: none;
}
</STYLE>
<script type="text/javascript">

</script>
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

                    <li class="active"><a href="index.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
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
						<li><a href="news.php"><i class="fa fa-globe"></i> News And Announcements</a></li>
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
                    <h1>Barangay Mahabang Parang <small>Dashboard Home</small></h1>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Welcome to Barangay Mahabang Parang Online Reservation and Monitoring System.
                        <br />
                        This System monitors your inventory and reservation of records in a real-time aspect.
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

                            <div class="row alert-success">
                                <div class="col-xs-5">
                                    <i class="fa fa-comment fa-5x"></i>
                                </div>
                                <div class="col-xs-5 text-right">
											<?php
							$result = mysqli_query($conn,"SELECT * FROM messages");
							$num_rows = mysqli_num_rows($result);
							?>
                                    <a href="message.php"><div class="link"> <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text">Message/s</p></div></a>
                                </div>
                            </div>
                            <div class="row alert-success">
                                <div class="col-xs-5">
                                   <i class="fa fa-user-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-5 text-right">
											<?php
							$result = mysqli_query($conn,"SELECT * FROM users");
							$num_rows = mysqli_num_rows($result);
							?>
                                    <a href="users.php"> <div class="link"> <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text">Users</p></div></a>
                                </div>
                            </div>
							    <div class="row alert-success">
                                <div class="col-xs-5">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
								
                                <div class="col-xs-5 text-right">
											<?php
							$result = mysqli_query($conn,"SELECT * FROM resident");
							$num_rows = mysqli_num_rows($result);
							?>
                                     <a href="resident.php"><div class="link"> <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text">Residents</p></div></a>
                                </div>
                            </div>
                            <div class="row alert-danger">
                                <div class="col-xs-5">
                                    <i class="	fa fa-sticky-note 	 fa-5x"></i>
                                </div>
                                <div class="col-xs-5 text-right">
							<?php
							$result = mysqli_query($conn,"SELECT * FROM reservation_request  where stats = 'Pending'");
							$num_rows = mysqli_num_rows($result);
							?>
                                   <a href="reservation.php"><div class="links">   <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text">Reservation&nbsp;Requests</p></div></a>
                                </div>
                            </div>
							 <div class="row alert-danger">
                                <div class="col-xs-5">
                                    <i class="fa fa-sticky-note fa-5x"></i>
                                </div>
                                <div class="col-xs-5 text-right">
							<?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where stats = 'Pending' ");
							$num_rows = mysqli_num_rows($result);
							?>
                                    <a href="request.php"> <div class="links"> <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text">Document Requests</p></div></a>
                                </div>
                            </div>
							<div class="row alert-danger">
                                <div class="col-xs-5">
                                    <i class="	fa fa-sticky-note 	 fa-5x"></i>
                                </div>
                                <div class="col-xs-5 text-right">
							<?php
							$result = mysqli_query($conn,"SELECT * FROM incidentrpt");
							$num_rows = mysqli_num_rows($result);
							?>
                                     <a href="incident.php"><div class="links"> <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text">Incident Reports</p></div></a>
                                </div>
                            </div>
														<div class="row alert-danger">
                                <div class="col-xs-5">
                                    <i class="	fa fa-sticky-note 	 fa-5x"></i>
                                </div>
                                <div class="col-xs-5 text-right">
							<?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where stats='Approve'");
							$num_rows = mysqli_num_rows($result);
							?>
                                     <a href="incident.php"><div class="links"> <p class="alerts-heading"><?php echo $num_rows; ?></p>
                                    <p class="alerts-text">Document Pending</p></div></a>
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
				  <h3 class="panel-title">Incident Chart</div>

                    <canvas id="templatemo-pie-chart"></canvas>

                     </div>
                  </div>
				  
				  <div class="col-md-6 col-sm-6">
				  <div class="panel panel-primary">
				   <div class="panel-heading">
				   <h3 class="panel-title">Document Demand</div>
                    <canvas id="templatemo-doughnut-chart"></canvas>
                    </div>
                     
                  </div>
                  
                              <div class="col-md-12 col-sm-5">
                <div class="panel panel-primary">
                  <div class="panel-heading">
				  <h3 class="panel-title">Purpose</div>
                  <canvas id="templatemo-line-chart" height="200" width="796" style="width: 796px; height: 398px;"></canvas>
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
			  <?php
							$result = mysqli_query($conn,"SELECT * FROM incidentrpt where typeofincident = 'Murder'");
							$num_rows = mysqli_num_rows($result);
							?>
      var randomScalingFactor = function(){ return Math.round(Math.random()*10)};
      var lineChartData = {
        labels : ["Murder","February","March","April","May","June","July"],
        datasets : [
        {
          label: "My First dataset",
          fillColor : "rgba(220,220,220,0.2)",
          strokeColor : "rgba(220,220,220,1)",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(220,220,220,1)",
		data : [<?php echo $num_rows; ?>,<?php echo $num_rows; ?>,<?php echo $num_rows; ?>,<?php echo $num_rows; ?>]
        },
        {
          label: "My Second dataset",
          fillColor : "rgba(151,187,205,0.2)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
        },
		        {
          label: "My Second dataset",
          fillColor : "rgba(151,187,205,0.2)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
        }
        ]

      }

      var pieChartData = [
      {
		  <?php
							$result = mysqli_query($conn,"SELECT * FROM incidentrpt where typeofincident = 'Robbery'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Robbery"
      },

      {
		  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM incidentrpt where typeofincident = 'Murder'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#577A3A",
        highlight: "#608341",
        label: "Murder"
      },

 {
			 	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM incidentrpt where typeofincident = 'Car Incident'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Car Incident"
      },

	     {
			 	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM incidentrpt where typeofincident = 'Physical Injury'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#1919ff",
        highlight: "#3232ff",
        label: "Physical Injury"
      },

	     {
			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM incidentrpt where typeofincident = 'Perjury'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#8c19ff",
        highlight: "#9932ff",
        label: "Perjury"
		
      },

      

      ] // pie chart data
	  

	
	var pieChartsData = [
      {
		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Certificate of Indigency'");
							$num_rows = mysqli_num_rows($result);
							?>
        value:<?php echo $num_rows; ?>,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Certificate of Indigency"
      },
      {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Certificate of Death'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#577A3A",
        highlight: "#608341",
        label: "Certificate of Death"
      },
      {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Barangay Permit'");
							$num_rows = mysqli_num_rows($result);
							?>
        value:<?php echo $num_rows; ?>,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Barangay Permit"
      },

	  {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Certificate of Clamity Assistance'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#1919ff",
        highlight: "#3232ff",
        label: "Certificate of Clamity Assistance"
      },
	        {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Excavation Permit'");
							$num_rows = mysqli_num_rows($result);
							?>
        value:<?php echo $num_rows; ?>,
        color: "#8c19ff",
        highlight: "#9932ff",
        label: "Excavation Permit"
      },
	        {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Barangay Clearance'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#ff8c19",
        highlight: "#ff9932",
        label: "Barangay Clearance"
      },
	        {
		  		  			 	  	  	  	  <?php
							$result = mysqli_query($conn,"SELECT * FROM document_request where iname = 'Business Permit'");
							$num_rows = mysqli_num_rows($result);
							?>
        value: <?php echo $num_rows; ?>,
        color: "#1919ff",
        highlight: "#3232ff",
        label: "Business Permit"
      }

      ]
	  
	  
      window.onload = function(){
        var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
        var ctx_pie = document.getElementById("templatemo-pie-chart").getContext("2d");
		var ctx_doughnut = document.getElementById("templatemo-doughnut-chart").getContext("2d");
		
		        window.myLine = new Chart(ctx_line).Line(lineChartData, {
          responsive: true
        });
        window.myPieChart = new Chart(ctx_pie).Pie(pieChartData,{
          responsive: true
        });
		window.myDoughnutChart = new Chart(ctx_doughnut).Doughnut(pieChartsData,{
          responsive: true
        });


      
      }
	  


    </script> 
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Recent Reservation By The Residents.</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-chart1">
							
							
<style>

table{
	border-collapse: collapse;
    width: 100%;
	border: solid 1px #DDEEEE;

}
th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f8f6ff}

th {
    background-color: #6c7ae0;
    color: white;

}
th:first-child{
	 border-radius: 7px 0 0 0;
}
th:last-child{
	 border-radius: 0 7px 0 0;
}

</style>


<table>
  <tr>
    <th>Reservable</th>
    <th>Name</th>
    <th>Date Reserved</th>
	<th>Quantity</th>
    <th>Purpose</th>
	
  </tr>
  <?php

$result= mysqli_query($conn,"select * from reservation_request ") or die (mysql_error());
							while ($row= mysqli_fetch_array ($result) ){
		
							?>
  <tr>
    <td><?php echo $row['iname']; ?></td>
    <td><?php echo $row['username']; ?></td>
	<td><?php echo $row['datereserved']; ?></td>
	<td><?php echo $row['quantity']; ?></td>
	<td><?php echo $row['purpose']; ?></td>
  </tr>
  		<?php } ?>
</table>
</div>
                        </div>
                    </div>
					</div>
					<br><br><br><br><br><br><br><br>
				<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Recent Document Request By The Residents.</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-chart1">

<style>

table{
	border-collapse: collapse;
    width: 100%;
	border: solid 1px #DDEEEE;

}
th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f8f6ff}

th {
    background-color: #6c7ae0;
    color: white;

}
th:first-child{
	 border-radius: 7px 0 0 0;
}
th:last-child{
	 border-radius: 0 7px 0 0;
}

</style>

<table>
  <tr>
    <th>Document</th>
    <th>Name</th>
    <th>Date Reserved</th>

    <th>Purpose</th>
	
  </tr>
  <?php

$result= mysqli_query($conn,"select * from document_request ") or die (mysql_error());
							while ($row= mysqli_fetch_array ($result) ){
		
							?>
  <tr>
    <td><?php echo $row['iname']; ?></td>
    <td><?php echo $row['username']; ?></td>
	<td><?php echo $row['datereserved']; ?></td>

	<td><?php echo $row['purpose']; ?></td>
  </tr>
  		<?php } ?>
</table>
							
							
							
								
							
							
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

