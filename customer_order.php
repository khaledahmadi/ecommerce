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
			<a href="#" class="navbar-brand">Shopping Store</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="index.php"><span class="fa fa-home"></span> Home</a></li>
			<li><a href=""><span class="fa fa-window-maximize"></span> Product</a></li>
		</ul>
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
				<h1>Customer Details</h1>
				<hr>
					<div class="row">
						<div class="col-md-6">
							<img src="images/ipad.jpg" style="width:300px; height: 300px;" class="thumbnail">
						</div>
						<div class="col-md-6">
							<table class="table table-responsive table-striped">
								<tr><td>Pruduct Name </td><td>Ipad</td></tr>
								<tr><td>Pruduct Price</td><td>$400</td></tr>
								<tr><td>Quantity</td><td>4</td></tr>
								<tr><td>Payment</td><td>Completed</td></tr>
								<tr><td>Transaction ID</td><td>HKJJKJKDLSAJFLKAJKLFJA</td></tr>
							</table>
						</div>
					</div>
					
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
</body>
</html>
