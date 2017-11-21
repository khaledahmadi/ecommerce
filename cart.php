<?php 

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bayat Store</title>
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/main.css" type="text/css" rel="stylesheet">
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#MainNavbar" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			<a href="#" class="navbar-brand">Shopping Store</a>
		</div>
		<div class="collapse navbar-collapse" id="MainNavbar">
		<ul class="nav navbar-nav">
			<li><a href="index.php"><span class="fa fa-home"></span> Home</a></li>
			<li><a href=""><span class="fa fa-window-maximize"></span> Product</a></li>
		</ul>
	</div>
	</div>
</div>

<p><br></p>
<p><br></p>
<p><br></p>

<div class="container-fluid">
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8" id="cartcheckout_msg"></div>
	<div class="col-md-2"></div>
</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Cart Checkout</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2"><b>Action</b></div>
						<div class="col-md-2"><b>Product Image</b></div>
						<div class="col-md-2"><b>Product Name</b></div>
						<div class="col-md-2"><b>Quantity</b></div>
						<div class="col-md-2"><b>Product Price</b></div>
						<div class="col-md-2"><b>Price In $</b></div>
					</div>
					
					<div id="cart_checkout"></div>
					
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</body>
</html>
