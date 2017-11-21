<?php
include("connection.php");

$f_name=$_POST["f_name"];
$l_name=$_POST["l_name"];
$mobile=$_POST["mobile"];
$address1=$_POST["address1"];
$address2=$_POST["address2"];
$email=$_POST["email"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];

$name_validate="/^[a-zA-Z ]*$/";
$email_validate="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number_validate="/^[0-9]+$/";
	
if(empty($f_name) || empty($l_name) || empty($mobile) || empty($address1) || empty($address2) || empty($email) || empty($password) || empty($repassword)){
	echo " <div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Please Fill All The Fields!</b>
	</div>";
	exit();
}
else{
	
if(!preg_match($name_validate,$f_name)){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>This $f_name is not valid</b>
	</div>";
	exit();
	}
if(!preg_match($name_validate,$l_name)){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>This $l_name is not valid</b>
	</div>";
	exit();
	}
if(!preg_match($number_validate,$mobile)){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>This Mobile Number $mobile is not valid</b>
	</div>";
	exit();
	}
if(!preg_match($email_validate,$email)){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>This Email $email address is not valid</b>
	</div>";
	exit();
	}
if(strlen($password) < 9){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>This password is week</b>
	</div>";
	exit();
	}
if(strlen($repassword) < 9){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>The repeat password is week</b>
	</div>";
	exit();
	}
if($password != $repassword){
	echo "<div class='alert alert-warning'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Password Not Match</b>
	</div>";
	exit();
	}
	// check for email validaty
	$sql="select user_id from user_info where email='$email' LIMIT 1";
	$check_email=mysqli_query($con, $sql) or die("invalid query for email");
	$count_email=mysqli_num_rows($check_email);
	if($count_email > 0){
		echo " <div class='alert alert-danger'>
	           <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b> Email Already Exist, Try Another Email</b>
			   </div>";
	}
	else{
	$password_hash=md5($password);
	$query="INSERT INTO user_info VALUES('', '$f_name', '$l_name', '$email', '$mobile', '$address1', '$address2', '$password_hash')";
	$result=mysqli_query($con,$query) or die("Not Inserted");
	if($result){
		echo "<script>window.location.href='profile.php'</script>";
		
	}
	}
}

?>
