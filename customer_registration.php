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
<!-- Sign up form message -->
<div class="row">
    <div class="col-md-2"></div>
	<div class="col-md-8" id="signup_msg">
		<!-- Alert from sign up form -->
	</div>
	<div class="col-md-2"></div>
</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">Customer SignUp Form</div>
				<div class="panel-body">
					<form method="post">
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">First Name</label>
								<input type="text" name="f_name" id="f_name" class="form-control">
							</div>
							
							<div class="col-md-6">
								<label for="l_name">Last Name</label>
								<input type="text" name="l_name" id="l_name" class="form-control">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Mobile</label>
								<input type="number" name="mobile" id="mobile" class="form-control">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="address1">Address 1</label>
								<input type="text" name="address1" id="address1" class="form-control">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="address2">Address 2</label>
								<input type="text" name="address2" id="address2" class="form-control">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control">
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="repassword">Re-enter Password</label>
								<input type="password" name="repassword" id="repassword" class="form-control">
							</div>
						</div>
						<p><br></p>
						<div class="row">
							<div class="col-md-12">
								<input type="button" name="signup_btn" id="signup_btn" value="Sign Up" class="btn btn-success btn-lg" style="float: right;">
							</div>
						</div>
						
					</form>
				</div>
				<div class="panel-footer">kdkafkd</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

</body>
</html>
