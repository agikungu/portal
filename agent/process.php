<?php
include_once '../config/database.php';
   if($_POST['mode']==2){
		$user_id =$_POST['user_id'];
		$_SESSION['name'] = $_POST['name'];
		$name = $_POST['name'];
		$email_id = $_POST['email_id'];
		$phone= $_POST['phone'];
		$city= $_POST['city'];
	
		echo $sql = "UPDATE `login_user` SET `name`='$name' , `email_id`='$email_id' , `phone`='$phone', `city`='$city' WHERE user_id = $user_id ";
		if (mysqli_query($cn, $sql)) {
			header('Location: profile.php?status=200');
		}
	}
?> 
