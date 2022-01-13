<?php
	include '../config/database.php';
	include '../config/access.php';
	$name=$_POST['name'];
	$email=$_POST['email_id'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$password = md5($_POST['password']);

	
	if($_POST['mode']==1){
		$duplicate=mysqli_query($cn,"select * from login_user where email_id='$email' ");
		if (mysqli_num_rows($duplicate)>0)
		{
			header('Location: add_agent.php?status=201');
			exit();
		}
		
	$sql = "INSERT INTO `login_user`(`name`, `email_id`, `phone`, `city`, `password`) VALUES ('$name','$email','$phone','$city','$password')";
		if (mysqli_query($cn, $sql)) {
			header('Location: add_agent.php?status=200');
		}else {
			echo"failed to add agent";
			}
	}
	if($_POST['mode']==2){
		$user_id=$_POST['user_id'];
		$password = md5($_POST['password']);

		$sql = "UPDATE `login_user` SET name='$name',email_id='$email',phone='$phone',city='$city',password='$password' WHERE user_id=$user_id";
		if (mysqli_query($cn, $sql)) {
			header('Location: agent_list.php?status=200');
		}else {
			echo"failed to edit";
			}
	}
?>