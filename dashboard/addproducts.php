
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
                    <h1>Rifa Motor Shop <small>Product Information</small></h1>
					
             
                </div>
            </div>
	
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><a href = "addproducts.php">Add Products</a></h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">
					
							<div class="products-add-info">
							
							<form method="POST" enctype="multipart/form-data" action="">
			
							     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Barcode
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="barcode" class="form-control"  placeholder="Enter Barcode">
								    </div>
									</div>
								
									
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Brand Name
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="brandname" class="form-control" placeholder="Enter Brand Name">
								    </div>
									</div>
									
											<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Product Name 
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="pname" class="form-control" placeholder="Enter Product Name">
								    </div>
									</div>
									
														<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Motor Part 
									   </label>
									 <div class="form-padding-correction">
							         <input type="text" name="motorpart" class="form-control" placeholder="Enter Motor Part">
								    </div>
									</div>
									
														<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Model Number 
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="modelnumber" class="form-control" placeholder="Enter Model Number">
								    </div>
									</div>
									
														<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Quantity
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
								    </div>
									</div>
									
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Price 
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="price" class="form-control" placeholder="Enter Price">
								    </div>
									</div>
									
									    <div class="form-group">
                                         <label>Description:</label>
                                         <textarea class="form-control" name="txtdesc"rows="3"></textarea>
                            </div>
									
									
					                <div class="form-group">
                                   <label>File input</label>
                                    <input type="file" name="image">
                                    </div>
									
						
						
						            <div class="btn-addproducts">
									 <a href="inventory.php"> <button type="button" class="btn btn-primary">Cancel</button></a>
									</div>
									
									  <div class="btn-cancel">
								  <button type="Submit" class="btn btn-success">Add Product</button>
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


							
			$file=$_FILES['image']['tmp_name'];
			$image = $_FILES["image"] ["name"];
			$image_name= addslashes($_FILES['image']['name']);
			$size = $_FILES["image"] ["size"];
			$error = $_FILES["image"] ["error"];
			
				if($size > 10000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
						
						else{
							
					move_uploaded_file($_FILES["image"]["tmp_name"],"pimage/" . $_FILES["image"]["name"]);			
					$book_image=$_FILES["image"]["name"];
					
					
                    $barcode = $_POST['barcode'];
$brandname = $_POST['brandname'];
$pname = $_POST['pname'];
$motorpart = $_POST['motorpart'];
$modelnumber = $_POST['modelnumber'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$txtdesc = $_POST['txtdesc'];



                    $result=mysqli_query($conn,"select * from products WHERE barcode='$barcode' ") or die (mySQL_error());
					$row=mysqli_num_rows($result);
					if ($row > 0)
					{
				    echo "<script>alert('Product already active!'); window.location='inventory.php'</script>";

					}
					else
					{		
                   
						$sql="insert into products (Barcode, bname,pname, price, motorpart, modelnumber, quantity,pimage,productdesc)
						values ('$barcode','$brandname','$pname', '$price', '$motorpart', '$modelnumber', '$quantity','$book_image','$txtdesc')";
						if ($conn->query($sql) === TRUE) {
                   		echo "<script>alert('Product successfully added!'); window.location='inventory.php'</script>";
                        } else {
          
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
</html>
