<?php
	include '../config/database.php';
	include '../config/access.php';
	$code=$_POST['code'];
	$name=$_POST['name'];
	$description=$_POST['description'];

	
	$status=$_POST['status'];
	$capacity=$_POST['capacity'];

    $gps=$_POST['gps'];
$user=$_SESSION["email_id"];
	
	
	if($_POST['mode']==1){	
		$duplicate=mysqli_query($cn,"select * from devices where device_code='$code' ");
		if (mysqli_num_rows($duplicate)>0)
		{

			while($row=mysqli_fetch_array($duplicate))
			{
				$name=$row['device_name'];
				$description=$row['device_description'];
				$capacity=$row['capacity'];
				$gps=$row['gps'];
				$status=$row['status'];



				


			}
			
		

			$sql = "INSERT INTO `devices_user`(`device_code`, `device_name`, `device_user`, `device_description`, `capacity`,`gps`,`status`) VALUES ('$code','$name','$user','$description','$capacity','$gps','$status')";
			if (mysqli_query($cn, $sql)) {
				header('Location: add_device.php?status=200');
			}else {
				echo"failed to upload device";
			}

		}else {
		
				//kumbuka hapa kwa status 201 kuweka ikue success
				header('Location: add_device.php?status=201');
				exit();
		}
		

	}
	if($_POST['mode']==2){
        $user_id=$_POST['user_id'];
        //hapa ikikataa shida inaweza kuwa ni hapo kwa active huja pass value
		$sql = "UPDATE `devices_user` SET device_code='$code',device_name='$name',device_user='$user',device_description='$description',capacity='$capacity',gps='$gps',status='$status' WHERE id=$user_id";
		if (mysqli_query($cn, $sql)) {
			header('Location: device_list.php?status=200');
		}else {
		echo"failed to edit";
		}
	}
?>