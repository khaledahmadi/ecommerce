<?php
include("connection.php");
if(isset($_POST['add'])){
	$program=$_POST['program'];
	$faculty=$_POST['faculty'];
	$code=$_POST['code'];
	$desc=$_POST['desc'];
	$group=$_POST['group'];
	$credit=$_POST['credit'];
	$lecturer=$_POST['lecturer'];
	$venue=$_POST['venue'];
	
	$query="INSERT INTO subject VALUES('','$faculty','$program','$code', '$desc','$group','$credit','$lecturer','$venue','')"; 
	$result=mysqli_query($con,$query) or die("invalid");
	if($result){
		echo "<script>alert(' Registered')</script>";
			header("location:add_course.php");
	}
	else{
		echo "<script>alert('Not Registered')</script>";
	}
}

if(isset($_GET['id'])){
	$id=$_GET['id'];
	$query="DELETE FROM product where product_id='$id'";
	$result=mysqli_query($con,$query) or die("invalid");
	if($result){
		echo "<script>alert(' Registered')</script>";
			header("location:add_product.php");
	}
	else{
		echo "<script>alert('Not Deleted')</script>";
	}
}

$query2="SELECT * FROM categories";
$result2=mysqli_query($con,$query2) or die("Error");
$optionid="";

while($row3=mysqli_fetch_array($result2, MYSQLI_BOTH)){
	$optionid=$optionid."<option value='$row3[0]'>$row3[1] </option>";
}

$query2="SELECT * FROM brands";
$result2=mysqli_query($con,$query2) or die("Error");
$optionid1="";

while($row4=mysqli_fetch_array($result2, MYSQLI_BOTH)){
	$optionid1=$optionid1."<option value='$row4[0]'>$row4[1] </option>";
}
?>


<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/main.css" type="text/css" rel="stylesheet">
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="js/admin_main.js" type="text/javascript"></script>
<title>Product</title>
</head>

<body>
<div class="menu">
	<p><b>List Of All Products</b></p>
</div>
<div class="nav navbar-right">
	<a href="" data-toggle="modal" data-target="#new_subject" title=" Add New Product"> <i class="fa fa-plus hoverable" style="font-size: 20px; margin-right: 10px; margin-bottom: 20px;"></i></a>
	<a href="" data-toggle="modal" data-target="#student" title=" List of Customers"> <i class="fa fa-users hoverable" style="font-size: 20px; margin-right: 10px;margin-bottom: 20px;"></i></a>
	<a href="login.php" title="Logout"><i class="fa fa-sign-out" style="font-size: 20px; margin-right: 40px;margin-bottom: 20px;"></i></a>
</div>

<div class="container-fluid">
 <div class="row">
 <div class="col-md-12">
  <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0">
    <thead>
      <tr class="bg-primary">
        <th>No</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Image</th>
        <th>Keyword</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    <?php
	$no=1;
	$query2="SELECT * FROM product";
	$result2=mysqli_query($con,$query2) or die("Error");
	while($row2=mysqli_fetch_array($result2)){
		$product_id=$row2['product_id'];
		$cat_id=$row2['cat_id'];
		
	?>
    <tr>
	<form method="post">
      <td><?php echo $no; ?></td>
      <td><select class="form-control" id="category-<?php echo $product_id; ?>"><?php echo $optionid;?></select></td>
      <td><select class="form-control" id="brand-<?php echo $product_id; ?>"><?php echo $optionid1;?></select></td>
      <td><input type="text" id="product_name-<?php echo $product_id; ?>" class="form-control" value="<?php echo $row2['product_title']; ?>"></td>
      <td><input type="text" id="price-<?php echo $product_id; ?>" class="form-control" value="<?php echo $row2['product_price']; ?>"></td>
      <td><textarea id="desc-<?php echo $product_id; ?>" class="form-control" cols="15" rows="3"><?php echo $row2['product_desc']; ?></textarea></td>
      <td><img src='images/<?php echo $row2['product_image']; ?>' width='100px' height='80px'><input type="file" id="image-<?php echo $product_id; ?>" class="form-control hidden"></td>
	  <td><textarea id="keyword-<?php echo $product_id; ?>" class="form-control" cols="15" rows="3"><?php echo $row2['product_keywords']; ?></textarea></td>
     
      <td><div class="btn-group"><a href="#" pid='<?php echo $product_id; ?>' class='btn btn-primary update_admin'><span class="fa fa-edit"></span></a>
      <a href="add_product.php?id=<?php echo $product_id ?>" class='btn btn-danger'><span class="fa fa-trash"></span></a></div></td>
	</form>
    </tr>
    <?php 
		$no++;
	}
		?>
    </tbody>
  </table>
</div>
</div>
</div>

<!-- model add new subject -->
    <div class="modal fade" id="new_subject" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Login Menu</h4>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="form-group">
						<input type="number" name="matric" class="form-control" required placeholder="Enter Your Matric">
					</div>
					<div class="form-group">
						<input type="password" name="pass" class="form-control" required placeholder="Enter Your Password">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-success btn-block" value="Login"> 
			</div>
		</div>
	</div>
</div>
	</div>

<!-- model for list of students-->
<div id="student" class="modal fade">
    <div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
      			<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>List Of Customers</h4>
			</div>
			<div class="modal-body">
   <table class="table table-hover" style="overflow-x: scroll;">
    <thead>
      <tr class="w3-black">
		<th>No</th>
        <th>Product Name</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
    <?php
		$no=1;
	$query2="SELECT * FROM cart";
	$result2=mysqli_query($con,$query2) or die("Error");
	while($row2=mysqli_fetch_array($result2)){
		$id=$row2['id'];
	?>
    <tr class="w3-center">
      <td><?php echo $no; ?></td>
      <td><?php echo $row2['product_title']; ?></td>
      <td><img src='images/<?php echo $row2['product_image']; ?>' width='100px' height='80px'></td>
      <td><?php echo $row2['quantity']; ?></td>
      <td><?php echo $row2['price']; ?></td>
      <td><?php echo $row2['total_amount']; ?></td>
    </tr>
    <?php 
		$no++;
	}
		?>
    </tbody>
  </table>
  </div>
</div>
</div>
</div>
</body>
</html>
