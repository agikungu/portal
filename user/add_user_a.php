<?php
	include '../config/database.php';
	include '../config/access.php';
	$code=$_POST['code'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	
	
	if($_POST['mode']==1){
		$duplicate=mysqli_query($cn,"select * from mst_user where email='$email' ");
		if (mysqli_num_rows($duplicate)>0)
		{
			header('Location: add_user.php?status=201');
			exit();
		}
		
	$sql = "INSERT INTO `mst_user`(`device_code`,`name`, `email`, `phone`, `city`) VALUES ('$code','$name','$email','$phone','$city')";
		if (mysqli_query($cn, $sql)) {
			header('Location: add_user.php?status=200');
		}else {
			echo"failed to add user";
			}
	}
	if($_POST['mode']==2){
		$user_id=$_POST['user_id'];
		$sql = "UPDATE `mst_user` SET device_code='$code', name='$name',email='$email',phone='$phone',city='$city' WHERE id=$user_id";
		if (mysqli_query($cn, $sql)) {
			header('Location: user_list.php?status=200');
		}else {
			echo"failed to edit";
			}
	}
?>