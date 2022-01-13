<?php
include_once 'config/database.php';
if(isset($_POST['save']))
{	 
	$name = $_POST['name'];
	$email_id = $_POST['email_id'];
	$phone= $_POST['phone'];
	$password = md5($_POST['password']);
	$duplicate=mysqli_query($cn,"select * from login_user where email_id='$email_id' or phone='$phone'");
	if (mysqli_num_rows($duplicate)>0)
	{
		header("Location: signup.php?status=201");
		exit();
	}
	
	$sql = "INSERT INTO login_user (name,email_id,phone,password)
	VALUES ('$name','$email_id','$phone','$password')";
	if (mysqli_query($cn, $sql)) {
		header("Location: index.php?status=200");
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($cn);
	}
	 mysqli_close($cn);
}
?>