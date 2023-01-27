
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
                    <li class="active"><a href="inventory.php"><i class="fa fa-tasks"></i> Products</a></li>                    
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
                            <h3 class="panel-title">Add Product</h3>
                        </div>
                        <div class="panel-body">
                            <div id="shieldui-grid1">
							<?php
							$barcode=$_GET['Barcode'];
							
							$result= mysqli_query($conn,"select * from products where Barcode='$barcode'") or die (mysql_error());
										
			                while ($row= mysqli_fetch_array ($result)){
				             $barcode=$row['Barcode'];
							 $imagenochange=$row['pimage'];
							
							?>
									
							<form method="POST" enctype="multipart/form-data" action="">
							<div class="picture">
					         	 <label> Image
                                    </label>
							   <a href=""><?php if($row['pimage'] != ""): ?>
										<img src="pimage/<?php echo $row['pimage']; ?>" width="200px" height="150px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php else: ?>
										<img src="images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										</a>	
                                    <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" value=<?php echo $row['pimage']; ?>/>

							</div>
							
						
							<div class="products-add-info">
							
					
					
					   
						
							     	<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Barcode
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="barcode" class="form-control"  placeholder="Enter Barcode" value="<?php echo $row['Barcode']; ?>">
								    </div>
									</div>
								
									
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name">Brand Name
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="brandname" class="form-control" placeholder="Enter Brand Name" value="<?php echo $row['bname']; ?>">
								    </div>
									</div>
									
											<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Product Name 
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="pname" class="form-control" placeholder="Enter Product Name" value="<?php echo $row['pname']; ?>">
								    </div>
									</div>
									
														<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Motor Part 
									   </label>
									 <div class="form-padding-correction">
							         <input type="text" name="motorpart" class="form-control" placeholder="Enter Motor Part" value="<?php echo $row['motorpart']; ?>">
								    </div>
									</div>
									
														<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Model Number 
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="modelnumber" class="form-control" placeholder="Enter Model Number" value="<?php echo $row['modelnumber']; ?>">
								    </div>
									</div>
									
														<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Quantity
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity" value="<?php echo $row['quantity']; ?>">
								    </div>
									</div>
									
									<div class="form-padding">
									<label class="control-label .col-lg-2" for="first-name" >Price 
                                    </label>
									 <div class="form-padding-correction">
							         <input type="text" name="price" class="form-control" placeholder="Enter Price" value="<?php echo $row['price']; ?>">
								    </div>
									</div>
									
											    <div class="form-group">
                                         <label>Description:</label>
                                         <textarea class="form-control" name="txtdesc" rows="3" value="<?php echo $row['productdesc']; ?>"></textarea>
                            </div>
									
									
							<?php } ?>
					         
						
						            <div class="btn-addproducts">
									 <a href="inventory.php"> <button type="button" class="btn btn-primary">Cancel</button></a>
									</div>
									
									  <div class="btn-cancel">
								  <button type="Submit" class="btn btn-success">Update Product</button>
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
				$barcode=$_GET['Barcode'];
				
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							
									if ($error > 0){
										
$barcode = $_POST['barcode'];
$brandname = $_POST['brandname'];
$pname = $_POST['pname'];
$motorpart = $_POST['motorpart'];
$modelnumber = $_POST['modelnumber'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$txtdesc = $_POST['txtdesc'];
$still_profile1 = $imagenochange;

mysqli_query($conn,"update products set Barcode='$barcode',bname='$brandname',pname='$pname',price='$price',motorpart='$motorpart',modelnumber='$modelnumber',quantity='$quantity',pimage='$still_profile1',productdesc='$txtdesc' where Barcode='$barcode'")or die(mysql_error());
echo "<script>alert('Successfully Updated Info!'); window.location='inventory.php'</script>";		


										
										
										
									}
									
									else{
										
move_uploaded_file($_FILES["image"]["tmp_name"],"pimage/" . $_FILES["image"]["name"]);			
$profile=$_FILES["image"]["name"];								
$barcode = $_POST['barcode'];
$brandname = $_POST['brandname'];
$pname = $_POST['pname'];
$motorpart = $_POST['motorpart'];
$modelnumber = $_POST['modelnumber'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];									
								
mysqli_query($conn,"update products set Barcode='$barcode',bname='$brandname',pname='$pname',price='$price',motorpart='$motorpart',modelnumber='$modelnumber',quantity='$quantity',pimage='$profile',productdesc='$txtdesc'  where Barcode='$barcode' ")or die(mysql_error());								
echo "<script>alert('Successfully Updated Info!'); window.location='inventory.php'</script>";										
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
