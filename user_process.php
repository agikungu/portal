<?php
include_once 'config/database.php';
if(isset($_POST['save']))
{	 
	//$username = mysqli_real_escape_string($cn, $_POST['username']);
	$name = mysqli_real_escape_string($cn, $_POST['name']);
	$email_id = mysqli_real_escape_string($cn, $_POST['email_id']);
	$phone = mysqli_real_escape_string($cn, $_POST['phone']);
	$city = mysqli_real_escape_string($cn, $_POST['city']);
	$code = mysqli_real_escape_string($cn, $_POST['code']);
	$password = md5($_POST['password']);

	
/*
	$name = $_POST['name'];
	$email_id = $_POST['email_id'];
	$phone= $_POST['phone'];
	$city= $_POST['city'];
	$code= $_POST['code'];
	$password = md5($_POST['password']);
	*/
	$duplicate=mysqli_query($cn,"select * from mst_user where email_id='$email_id' or phone='$phone'");
	if (mysqli_num_rows($duplicate)>0)
	{
		header("Location: user_signup.php");
		$_SESSION["errormessage"]="Sorry the phone number or the email used has already been taken";

		exit();
	}
	if (empty($code)){
		$code="none";
		
		
			}
	$sql = "INSERT INTO mst_user (device_code,name,email_id,phone,city,password)
	VALUES ('$code','$name','$email_id','$phone','$city','$password')";
	if (mysqli_query($cn, $sql)) {
		header("Location: login.php");
		$_SESSION["successmessage"]="Registration succesfull You can now login";

	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($cn);
	}
	 mysqli_close($cn);
}
?>