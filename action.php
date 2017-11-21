<?php 
session_start();
include("connection.php");
if(isset($_POST['category'])){
	$cat_query="select * from categories";
	$result=mysqli_query($con, $cat_query) or die("Invalid");
	
	echo "<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Catagories</h4></a></li>";
	
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			$cat_id=$row['cat_id'];
			$cat_name=$row['cat_title'];
			
			echo " <li><a href='#' cid='$cat_id' class='category'>$cat_name</a></li>";
		}
		echo "</div>";
	}
}

if(isset($_POST['brand'])){
	$brand_query="select * from brands";
	$result=mysqli_query($con, $brand_query) or die("Invalid");
	
	echo "<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brand</h4></a></li>";
	
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			$brand_id=$row["brand_id"];
			$brand_name=$row["brand_title"];
			echo "
			<li><a href='#' bid='$brand_id' class='brand'>$brand_name</a></li> ";
		}
	echo "</div>";
	}
}

//pagenation
if(isset($_POST["page"])){
	$query_page="select * from product";
	$result=mysqli_query($con,$query_page) or die("invalid pagenation");
	$count_page=mysqli_num_rows($result);
	$pageno=ceil($count_page/9);
	for($i=1;$i<=$pageno;$i++){
		echo "<li><a href='#' class='page' page_id='$i'>$i</a></li>";
	}
}

if(isset($_POST['product'])){
	$limit=9;
	if(isset($_POST["get_page_no"])){
		$page_id=$_POST['page_no'];
		$start= ($page_id * $limit) - $limit;
	}
	else{
		$start=0;
	}
	
	$product_query="select * from product limit $start,$limit";
	$result=mysqli_query($con, $product_query);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			$product_id=$row["product_id"];
			$product_name=$row["product_title"];
			$price=$row["product_price"];
			$product_image=$row["product_image"];
			echo "
			<div class='col-md-4 col-sm-6 col-xs-12'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$product_name</div>
							<div class='panel-body'>
								<img src='$product_image' width='100%' height='200px'>
							</div>
							<div class='panel-heading'> $$price
								<button pid='$product_id' class='btn btn-success btn-xs' id='addToCard' style='float: right'>AddToCard</button>
							</div>
						</div>
					</div>
			";
}
}
}

if(isset($_POST["get_selected_category"]) || isset($_POST["get_selected_brand"]) || isset($_POST["search"])){
	if(isset($_POST["get_selected_category"])){
	$cid=$_POST["cat_id"];
	$query="select * from product where cat_id='$cid'";
	}
	else if(isset($_POST["get_selected_brand"])){
	$bid=$_POST["brand_id"];
	$query="select * from product where brand_id='$bid'";
	}
	else{
	$keyword=$_POST["keyword"];
	$query="select * from product where product_keywords like '%$keyword%'";
	}
	
	$result=mysqli_query($con, $query) or die("Invalid");
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_array($result)){
			$product_id=$row["product_id"];
			$product_name=$row["product_title"];
			$price=$row["product_price"];
			$product_image=$row["product_image"];
			echo "
			<div class='col-md-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>$product_name</div>
							<div class='panel-body'>
								<img src='$product_image' width='100%' height='200px'>
							</div>
							<div class='panel-heading'> $price
								<button pid='$product_id' class='btn btn-success btn-xs' id='addToCard' style='float: right'>AddToCard</button>
							</div>
						</div>
					</div>
			";
		}
	}
	else{
		echo "<div class='alert alert-warning'><b>No Result Found!</b></div>";
	}

}


// Add To Product
if(isset($_POST['AddToCart'])){
	if(isset($_SESSION['uid'])){
	$pid=$_POST['pid'];
	$user_id=$_SESSION["uid"];
	
	$query="select * from cart where p_id='$pid' and user_id='$user_id'";
	$result=mysqli_query($con,$query) or die("Invalid Cart");
	$count=mysqli_num_rows($result);
	if($count > 0){
		echo " <div class='alert alert-warning'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Product is already added to the card, Continue Shopping..!</b>
		</div>";
		exit();
	}
	else{
		$query="select * from product where product_id='$pid'";
		$result=mysqli_query($con,$query) or die("Invalid Product");
		$row=mysqli_fetch_array($result);
		$product_id=$row["product_id"];
		$product_name=$row["product_title"];
		$price=$row["product_price"];
		$product_image=$row["product_image"];
		
		$sql="insert into cart values('','$product_id', '0', '$user_id','$product_name','$product_image','1','$price','$price')";
		$result=mysqli_query($con,$sql) or die('Not Inserted');
		if($result){
			echo " <div class='alert alert-success'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>Product Is Added..!</b>
			</div>";
			exit();
		}
	}
}
else{
	echo " <div class='alert alert-danger'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>You Need to Login First...</b>
			</div>";
			exit();
}
}


// Cart Container
if(isset($_POST['cart_container']) || isset($_POST["cart_checkout"])){
	$user_id=$_SESSION["uid"];
	$query="select * from cart where user_id='$user_id'";
	$result=mysqli_query($con,$query) or die("invalid Cart");
	$cart_cout=mysqli_num_rows($result);
	if($cart_cout > 0){
	$no=1;
	$total_amount=0;
	while($row=mysqli_fetch_array($result)){
		$product_id=$row["p_id"];
		$image=$row['product_image'];
		$name=$row["product_title"];
		$price=$row["price"];
		$quantity=$row["quantity"];
		$total=$row["total_amount"];
		
		// total amount of all product
		$price_array=array($total);
		$sum_price=array_sum($price_array);
		$total_amount= $total_amount + $sum_price;
		
		if(isset($_POST['cart_container'])){
		echo "
			<div class='row'>
	  	  		<div class='col-md-3 col-xs-3'>$no</div>
	  	  		<div class='col-md-3 col-xs-3'><img src='$image' width='60px' height='50px;'></div>
	  	  		<div class='col-md-3 col-xs-3'>$name</div>
	  	  		<div class='col-md-3 col-xs-3'>$price</div>
	  	  	</div>";
		$no++;
	}
		else{
			echo " 
			<div class='row'>
				<div class='col-md-2'>
				<div class='btn-group'>
					<a href='' delete_id='$product_id' class='btn btn-danger delete'><span class='fa fa-trash'></span></a>
					<a href='#' update_id='$product_id' class='btn btn-primary update'><span class='fa fa-edit'></span></a>
				</div>
				</div>
				<div class='col-md-2'><img src='$image' width='60px' height='50px;'></div>
				<div class='col-md-2'>$name</div>
				
				<div class='col-md-2'><input type='text' class='form-control quantity' id='quantity-$product_id' pid='$product_id' value='$quantity'></div>
				
				<div class='col-md-2'><input type='text' class='form-control price' id='price-$product_id' pid='$product_id' name='price' value='$price' disabled></div>
				
				<div class='col-md-2'><input type='text' class='form-control total' id='total-$product_id' pid='$product_id' name='total' value='$total' disabled></div>
			</div>";
		}
	}
		if(isset($_POST["cart_checkout"])){
		echo "<div class='row'>
			 <div class='col-md-8'></div>
			 <div class='col-md-4'>
			 <h1>Total $$total_amount<h1>
			 </div>
			 </div>";
	}
		//Paypal Form 
		echo '
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
		  <input type="hidden" name="cmd" value="_cart">
		  <input type="hidden" name="business" value="khalid123@yahoo.com">
		  <input type="hidden" name="upload" value="1">';
		  
		  $x=0;
		  $sql="select * from cart where user_id='$user_id'";
		  $result=mysqli_query($con,$sql) or die("invalid cart");
		  while($row=mysqli_fetch_array($result)){
			  $product_name=$row["product_title"];
			  $price=$row["price"];
			  $quantity=$row["quantity"];
			  $x++;
		  echo '<input type="hidden" name="item_name_'.$x.'" value="'.$product_name.'">
		  <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
		  <input type="hidden" name="amount_'.$x.'" value="'.$price.'">
		  <input type="hidden" name="quantity_'.$x.'" value="'.$quantity.'">';
		  }
		   echo 
			   '<input type="hidden" name="return" value="payment.php">
			   <input type="hidden" name="cancel_return" value="cancel.php">
			   <input type="hidden" name="currency_code" value="USD">
			   <input type="hidden" name="custom" value="'.$user_id.'">
			   
			   <input type="image" name="submit" src="images/paypal-button.png" alt="Add to Cart" class="paypal" ">
</form>';
		
	}
	else{
		echo "<div class='alert alert-danger'><b>No Cart</b></div>";
	}
}

// delete product
if(isset($_POST["delele_product"])){
	$user_id=$_SESSION['uid'];
	$pid=$_POST["delete"];
	
	$query="delete from cart where p_id='$pid' AND user_id='$user_id'";
	$result=mysqli_query($con,$query) or die("Not Deleted");
	if($result){
		echo " <div class='alert alert-danger'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>Successfully Deleted Continue Shopping...!</b>
			</div>";
	}
}


/// update product
if(isset($_POST["update_product"])){
	$user_id=$_SESSION['uid'];
	$pid=$_POST["update"];
	$quantity=$_POST["quantity"];
	$price=$_POST["price"];
	$total=$_POST["total"];
	
	$query="update cart set quantity='{$quantity}', price='{$price}', total_amount='{$total}' where user_id='$user_id' AND p_id='$pid'"; 
	$result=mysqli_query($con,$query) or die("Not Updated");
	if($result){
		echo " <div class='alert alert-success'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>Successfully Updated Continue Shopping...!</b>
			</div>";
	}
	}
		
// notification
if(isset($_POST["count_cart"]) AND isset($_SESSION["uid"])){
	$user_id=$_SESSION['uid'];
	$query="select * from cart where user_id='$user_id'";
	$result=mysqli_query($con,$query) or die("invalid Cart");
	echo mysqli_num_rows($result);
}

