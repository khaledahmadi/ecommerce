<?php 

session_start();
if(isset($_SESSION["uid"])){
	$name=$_SESSION["name"];
}
else{
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
			<li><a href=""><span class="fa fa-home"></span> Home</a></li>
			<li><a href=""><span class="fa fa-window-maximize"></span> Product</a></li>
			<div class="navbar-form navbar-left search">
			<div class="input-group">
			<input type="text" class="form-control" placeholder="Search" id="search" />
			<div class="input-group-btn">
			<button class="btn btn-primary" id="search_btn"><i class="fa fa-search"></i></button>
			</div>
			</div>
			</div>
		</ul>
		
		<ul class="nav navbar-nav navbar-right">
	  	  <li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-shopping-cart"></span> Cart<span class="badge">0</span></a>
	  	  	<div class="dropdown-menu cart_dropdwon">
	  	  		<div class="panel panel-success">
	  	  			<div class="panel-heading">
	  	  				<div class="row">
	  	  					<div class="col-md-3 col-sm-6 col-xs-3"><b>Sl.No</b></div>
	  	  					<div class="col-md-3 col-sm-6 col-xs-3"><b>Product Image</b></div>
	  	  					<div class="col-md-3 col-sm-6 col-xs-3"><b>Product Name</b></div>
	  	  					<div class="col-md-3 col-sm-6 col-xs-3"><b>Price In <b>$</b></b></div>
	  	  				</div>
	  	  			</div>
	  	  			<div class="panel-body">
	  	  				<div id="cart_contain"></div>
	  	  			</div>
	  	  			<div class="panel-footer"></div>
	  	  		</div>
	  	  	</div>
	  	  </li>
	  	  
		  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span>
		  <?php echo "Hi, ".$name; ?></a>
		  	<ul class="dropdown-menu user_dropdown">
		  		<li><a href="cart.php"><span class="fa fa-shopping-cart" style="font-size: 20px;"></span> My Cart</a></li>
		  		<li class="divider"></li>
		  		<li><a href="#"><span class="fa fa-unlock-alt" style="font-size: 20px;"></span> Change Password</a></li>
		  		<li class="divider"></li>
		  		<li><a href="logout.php"><span class="fa fa-sign-out" style="font-size: 20px;"></span> Logout</a></li>
		  	</ul>
		  </li>
		</ul>
		</div>
	</div>
</div>

<p><br></p>
<p><br></p>
<p><br></p>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2">
		<div id="get_category"></div>
			<!--<div class="nav nav-pills nav-stacked">
				<li class="active"><a href="#"><h4>Catagories</h4></a></li>
				<li><a href="#">Catagories</a></li>
				<li><a href="#">Catagories</a></li>
				<li><a href="#">Catagories</a></li>
				<li><a href="#">Catagories</a></li>
			</div>-->
			
			<div id="get_brand"></div>
			<!--<div class="nav nav-pills nav-stacked">
				<li class="active"><a href="#"><h4>Brands</h4></a></li>
				<li><a href="#">Catagories</a></li>
				<li><a href="#">Catagories</a></li>
				<li><a href="#">Catagories</a></li>
				<li><a href="#">Catagories</a></li>
			</div>-->
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12" id="AddToCard_msg"></div>
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">Products</div>
				<div class="panel-body">
				<div id="get_product"></div>

					<!--<div class="col-md-4">
						<div class="panel panel-info">
							<div class="panel-heading">Sumsung</div>
							<div class="panel-body">
								<img src="images/q4.jpg" width="100%">
							</div>
							<div class="panel-heading"> $500.00
								<button class="btn btn-danger btn-xs" style="float: right">AddToCard</button>
							</div>
						</div>
					</div>-->
				</div>
				<div class="panel-footer">&copy; 2017</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	
	<!-- Pagenation -->
	<div class="row">
		<div class="col-md-12">
			<center>
				<ul class="pagination" id="page_no"></ul>
			</center>
		</div>
	</div>
</div>
</body>
</html>
