<?php
include("connection.php");
if(isset($_POST['add'])){
	$category=$_POST['category'];
	$brand=$_POST['brand'];
	$product_name=$_POST['product_name'];
	$price=$_POST['price'];
	$desc=$_POST['desc'];
	$keyword=$_POST['keyword'];
	
	$file_name=$_FILES['myfile']['name'];
	$file_size=$_FILES['myfile']['size'];
    $file_tmp=$_FILES['myfile']['tmp_name'];
    $file_type=$_FILES['myfile']['type'];
  
	if($file_name){
	$location="images/$file_name";
    move_uploaded_file($file_tmp,$location);
	
	$query="INSERT INTO product VALUES('','$category','$brand','$product_name', '$price','$desc','$location','$keyword')"; 
	$result=mysqli_query($con,$query) or die("invalid");
	if($result){
		echo "<script>alert(' Registered')</script>";
			header("location:add.php");
	}
	else{
		echo "<script>alert('Not Registered')</script>";
	}
	}
}

if(isset($_GET['del'])){
	$id=$_GET['del'];
	$query="DELETE FROM product where product_id='$id'";
	$result=mysqli_query($con,$query) or die("invalid");
	if($result){
        echo "<script>alert('Data Deleted');</script>" ;
}
}

//Insert Product Category;
$query6="SELECT * FROM categories";
$result6=mysqli_query($con,$query6) or die("Error");
$optionid="";
while($row6=mysqli_fetch_array($result6, MYSQLI_BOTH)){
	$optionid=$optionid."<option value='$row6[0]'>$row6[1] </option>";
}

//Insert product Brand
$query7="SELECT * FROM brands";
$result7=mysqli_query($con,$query7) or die("Error");
$optionid1="";
while($row7=mysqli_fetch_array($result7, MYSQLI_BOTH)){
	$optionid1=$optionid1."<option value='$row7[0]'>$row7[1] </option>";
}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
    <br>
	<title>Add Product</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/datatables/1.10.15/css/dataTables.foundation.min.css">
	<link href="css/main.css" type="text/css" rel="stylesheet">
</head>

<body>
	

	<div class="ts-main-content">
			<div class="nav navbar-right">
				<a href="" data-toggle="modal" data-target="#new_subject" title=" Add New Product"> <i class="fa fa-plus hoverable" style="font-size: 20px; margin-right: 10px; margin-bottom: 20px;"></i></a>
				<a href="" data-toggle="modal" data-target="#student" title=" List of Customers"> <i class="fa fa-users hoverable" style="font-size: 20px; margin-right: 10px;margin-bottom: 20px;"></i></a>
				<a href="login.php" title="Logout"><i class="fa fa-sign-out" style="font-size: 20px; margin-right: 40px;margin-bottom: 20px;"></i></a>
			</div>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-heading"><b style="font-size: 18px;">List Of Products</b></div>
							<div class="panel-body">
								<table id="zctb" class=" table table-striped table-bordered table-hover" cellspacing="0">
									<thead>
										<tr>
											<th>No.</th>
                                            <th>Category</th>
											<th>Brand</th>
											
                                            <th>Name</th>
											<th>Price</th>
											<th>Description</th>

											<th>Image</th>
        									<th>Keyword</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>No.</th>
                                            <th>Category</th>
											<th>Brand</th>
											
                                            <th>Name</th>
											<th>Price</th>
											<th>Description</th>

											<th>Image</th>
        									<th>Keyword</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php
$no=1;
	$query2="SELECT * FROM product";
	$result2=mysqli_query($con,$query2) or die("Error");
	while($row2=mysqli_fetch_array($result2)){
		$product_id=$row2['product_id'];
		$cat_id=$row2['cat_id'];
		$brand_id= $row2["brand_id"];
		
		$query4="SELECT * FROM categories where cat_id='$cat_id'";
		$result4=mysqli_query($con,$query4) or die("Error");
		$row4=mysqli_fetch_array($result4, MYSQLI_BOTH);
		$cat_title=$row4["cat_title"];
		
		$query5="SELECT * FROM brands where brand_id='$brand_id'";
		$result5=mysqli_query($con,$query5) or die("Error");
		$row5=mysqli_fetch_array($result5, MYSQLI_BOTH);
	    $brand_title=$row5["brand_title"];
		
	  	?>
<tr><td><?php echo $no;?></td>
<form method="post" action="" enctype="multipart/form-data" class="upload">

	<td><select class="form-control" id="category-<?php echo $product_id; ?>">
		<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
		<?php
		$query6="SELECT * FROM categories";
		$result6=mysqli_query($con,$query6) or die("Error");
		while($row6=mysqli_fetch_array($result6, MYSQLI_BOTH)){
		echo "<option value='$row6[0]'>$row6[1] </option>";
		}
		?>
		</select></td>
   
    <td><select class="form-control" id="brand-<?php echo $product_id; ?>">
		<option value="<?php echo $brand_id; ?>"><?php echo $brand_title; ?></option>
    	<?php 
		$query7="SELECT * FROM brands";
		$result7=mysqli_query($con,$query7) or die("Error");
		while($row7=mysqli_fetch_array($result7, MYSQLI_BOTH)){
			echo "<option value='$row7[0]'>$row7[1] </option>";
		}
		?>
    
    </select></td>
     
      <td><input type="text" id="product_name-<?php echo $product_id; ?>" class="form-control" value="<?php echo $row2['product_title']; ?>"></td>
      <td><input type="text" id="price-<?php echo $product_id; ?>" class="form-control" value="<?php echo $row2['product_price']; ?>"></td>
      <td><textarea id="desc-<?php echo $product_id; ?>" class="form-control" cols="15" rows="3"><?php echo $row2['product_desc']; ?></textarea></td>
      <td><img src='<?php echo $row2['product_image']; ?>' width='100px' height='80px' id="img"><input type="file" id="image-<?php echo $product_id; ?>" class="form-control form_image " style="display: none;"></td>
	  <td><textarea id="keyword-<?php echo $product_id; ?>" class="form-control" cols="15" rows="3"><?php echo $row2['product_keywords']; ?></textarea></td>
	  
<td><div class="btn-group">
<a href="#" pid='<?php echo $product_id; ?>' class='update_admin'><span class="fa fa-edit text-primary" style="font-size: 20px;"></span></a>&nbsp;&nbsp;
<a href="add.php?del=<?php echo $product_id;?>" onclick="return confirm("Do you want to delete");"><i class="fa fa-trash text-danger" style="font-size: 20px;"></i></a></div></td>
</form>
</tr>
									<?php
$no=$no+1;
									 } ?>


									</tbody>


							</div>
						</div>


					</div>
				</div>



			</div>
		</div>
	</div>



<!-- model add new product -->
    <div class="modal fade" id="new_subject" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Add Product</h4>
			</div>
			<form method="post" action="" enctype="multipart/form-data">
			<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<label for="Category">Category</label>
							<select class="form-control" name="category"><?php echo $optionid;?></select>
						</div>
						<div class="col-md-4">
							<label for="Brand">Brand</label>
							<select class="form-control" name="brand"><?php echo $optionid1;?></select>
						</div>
						<div class="col-md-4">
							<label for="Name">Product Name</label>
							<input type="text" class="form-control" name="product_name">
						</div>
					</div><br>

					<div class="row">
						<div class="col-md-6">
							<label for="Price">Price</label>
							<input type="text" class="form-control" name="price">
						</div>
						<div class="col-md-6">
							<label for="image">Image</label>
							<input type="file" class="form-control" name="myfile">
						</div>
					</div><br>	
					
					<div class="row">
						<div class="col-md-6">
							<label for="desc">Description</label>
							<textarea class="form-control" name="desc" rows="5"></textarea>
						</div>
						<div class="col-md-6">
							<label for="key">Keywords</label>
							<textarea class="form-control" name="keyword" rows="5"></textarea>
						</div>
					</div>		
			</div><br>
			<div class="modal-footer">
				<input type="submit" class="btn btn-success btn-block" value="Add" name="add"> 
			</div>
			</form>
		</div>
	</div>
</div>

<!-- model for list of cart-->
<div id="student" class="modal fade">
    <div class="modal-dialog modal-lg">
		<div class="modal-content" style="max-height: 600px; overflow-y: scroll;">
			<div class="modal-header">
      			<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>List Of Customers</h4>
			</div>
			<div class="modal-body">
				<div id="cart_modal"></div>  		
       
 		    </div>
		</div>
	</div>
</div>
<!-- Loading Scripts -->

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/admin_main.js"></script>

</body>

</html>
