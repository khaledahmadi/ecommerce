<?php
	include("connection.php");
// update part
	if(isset($_POST['p_update'])){
		$update_id=$_POST["pid"];
		$category=$_POST['category'];
		$brand=$_POST['brand'];
		$product_name=$_POST['product_name'];
		$price=$_POST['price'];
		$desc=$_POST['desc'];
		$image=$_POST['image'];
		$keyword=$_POST['keyword'];
		
		$query1="UPDATE product SET cat_id='{$category}', brand_id='{$brand}',product_title='{$product_name}', product_price='{$price}',product_desc='{$desc}', product_keywords='{$keyword}' where product_id='$update_id'"; 
			
		$result1=mysqli_query($con, $query1) or die("invalid");
		if($result1){
			echo"true";
		}
		else{
			echo "Not Updated";
		}
		
	}


if(isset($_POST["cart_modal"])){
	echo '
		<table id="zctb1" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="overflow-y: scroll;">
		<thead>
		  <tr class="w3-black">
			<th>No</th>
			<th>Customer Name</th>
			<th>Product Name</th>
			<th>Image</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total</th>
		  </tr>
		</thead>
		<tbody>
	';
	$no=1;
	$query2="SELECT c.*, s.first_name FROM cart c, user_info s where s.user_id=c.user_id";
	$result2=mysqli_query($con,$query2) or die("Error");
	while($row2=mysqli_fetch_array($result2)){
		$id=$row2['id'];
		$img=$row2["product_image"];
		echo '
		  <tr class="w3-center">
		  <td>'.$no.'</td>
		  <td>'.$row2["first_name"].'</td>
		  <td>'.$row2["product_title"].'</td>
		  <td><img src="'.$row2["product_image"].'" width="100px" height="80px"></td>
		  <td>'.$row2["quantity"].'</td>
		  <td>'.$row2["price"].'</td>
		  <td>'.$row2["total_amount"].'</td>
		</tr>';
		$no++;
	}
	echo '
		</tbody>
	    </table>
	';
}
?>