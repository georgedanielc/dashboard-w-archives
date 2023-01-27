
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
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>-->
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
                    <li><a href="inventory.php"><i class="fa fa-tasks"></i> Products</a></li>                    
                        <li><a href="reserveproducts.php"><i class="fa fa-globe"></i> Reservations</a></li>
							<li style=" margin-left: 10px;"><p style="color:gray; cursor:context-menu;">____________________________</p></li>
						<li><a href="users.php"><i class="fa fa-bullseye"></i>Registered Costumers</a></li>
						<li><a href="admin.php"><i class="fa fa-bullseye"></i>Admin Information</a></li>
						<li><a href="sold.php"><i class="fa fa-bullseye"></i>Sold Products</a></li>
                                    
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge"></span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                             <li class="message-preview">
                                <a href="reserveproducts.php">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Reservations Pending</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown user-dropdown">
		<?php
						$user_query=mysqli_query($conn,"select * from user where user_id='$id_session'")or die(mysql_error());
	                    $row=mysqli_fetch_array($user_query); {
					
					?>
					
					
                    
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
                    <h1>Rifa Motor Shop <small>Add Reservation</small></h1>
					
             
                </div>
            </div>
	
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Products information</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">
							
							<!--Here starts the Table for the products-->
	




<table>
  <tr>
    <th>Product Image</th>
    <th>Barcode</th>
    <th>Brand Name</th>
    <th>Product Name</th>
	<th>Motor Part</th>
    <th>Model Number</th>
	<th>Quantity</th>
    <th>Price</th>
	<th>Action</th>
	
	
  </tr>
  <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
    $txtsearch=$_POST['search-products'];
								$result= mysqli_query($conn,"select * from products where Barcode LIKE '%$txtsearch%' or bname LIKE '%$txtsearch%'") or die (mysql_error());
	
	}
	else{
		
											$result= mysqli_query($conn,"select * from products order by pname ASC ") or die (mysql_error());
		
	}

			while ($row= mysqli_fetch_array ($result) ){
				$barcode=$row['Barcode'];
		
			?>
			
			
  <tr>
    <td><img src="pimage/<?php echo $row['pimage']; ?>" width="75px" height="50px"></td>
    <td><?php echo $row['Barcode']; ?></td>
    <td><?php echo $row['bname']; ?></td>
    <td><?php echo $row['pname']; ?></td>
	<td><?php echo $row['motorpart']; ?></td>
	<td><?php echo $row['modelnumber']; ?></td>
	<td><?php echo $row['quantity']; ?></td>
	<td><?php echo $row['price']; ?></td>
	<td>
	 <a href="addreservation.php<?php echo '?Barcode='.$barcode; ?>"> <button type="button"  class="btn btn-primary btn-sm">Reserve</button></a>
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
