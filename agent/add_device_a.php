<?php
	include '../config/database.php';
	include '../config/access.php';
	$code=$_POST['code'];
	$name=$_POST['name'];
	$description=$_POST['description'];

	
	//$status=$_POST['status'];
	$capacity=$_POST['capacity'];

    $gps=$_POST['gps'];
	
	
	if($_POST['mode']==1){
		$duplicate=mysqli_query($cn,"select * from devices where device_code='$code' ");
		if (mysqli_num_rows($duplicate)>0)
		{
			header('Location: add_device.php?status=201');
			exit();
		}
		
	$sql = "INSERT INTO `devices`(`device_code`, `device_name`, `device_description`, `capacity`,`gps`) VALUES ('$code','$name','$description','$capacity','$gps')";
		if (mysqli_query($cn, $sql)) {
			header('Location: add_device.php?status=200');
		}else {
			echo"failed to upload device";
		}
	}
	if($_POST['mode']==2){
        $user_id=$_POST['user_id'];
        //hapa ikikataa shida inaweza kuwa ni hapo kwa active huja pass value
		$sql = "UPDATE `devices` SET device_code='$code',device_name='$name',device_description='$description',capacity='$capacity',gps='$gps' WHERE id=$user_id";
		if (mysqli_query($cn, $sql)) {
			header('Location: device_list.php?status=200');
		}else {
		echo"failed to edit";
		}
	}
?>