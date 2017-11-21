<?php
include("connection.php");
session_start();
if(isset($_POST['userLogin'])){
$email=mysqli_real_escape_string($con,$_POST["userEmail"]);
$password=md5($_POST["userPassword"]);

$query="select * from user_info where email='$email' AND password='$password'";
$result=mysqli_query($con, $query) or die("invalid selection");
$count=mysqli_num_rows($result);
if($count == 1){
	$row=mysqli_fetch_array($result);
	$_SESSION["uid"]=$row["user_id"];
	$_SESSION["name"]=$row["first_name"];
	
	echo "true";
}
else{
	echo " <div class='alert alert-danger'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	<b>Invalid Email/Password!</b>
	</div>";
	exit();
	}
}
?>
