<?php
	include '../config/database.php';
	include '../config/access.php';
	$code=$_POST['code'];
	$name=$_POST['name'];
	$description=$_POST['description'];
	$capacity=$_POST['capacity'];
	if( empty($_POST["status"]) ) {
	$status=0;
	}elseif(!empty($_POST['status'])) {
		$status=$_POST['status'];
	}
    $gps=$_POST['gps'];
	$my_date = date("Y-m-d H:i:s");

	
	
	if($_POST['mode']==1){
		$duplicate=mysqli_query($cn,"select * from devices where device_code='$code' ");
		if (mysqli_num_rows($duplicate)>0)
		{
			header('Location: add_device.php?status=201');
			exit();
		}
		
	$sql = "INSERT INTO `devices`(`date`, `device_code`, `device_name`, `device_description`, `capacity`,`gps`,`status`) VALUES ('$my_date','$code','$name','$description','$capacity','$gps','$status')";
		if (mysqli_query($cn, $sql)) {
			header('Location: add_device.php?status=200');
		}
	}
	if($_POST['mode']==2){
		//ku update kwa device_data status ikuwe on or off
		$sqlsdevice_datastatus="UPDATE device_data SET status='$status' WHERE device_code='$code'";
	$execute1=mysqli_query($cn,$sqlsdevice_datastatus);
		//ku update kwa device_data status ikuwe on or off

		//ku update kwa devices_user status ikuwe on or off
		$sqlsdevices_userstatus="UPDATE devices_user SET status='$status' WHERE device_code='$code'";
		$execute2=mysqli_query($cn,$sqlsdevices_userstatus);
		//ku update kwa devices_user status ikuwe on or off

        $user_id=$_POST['user_id'];
        //hapa ikikataa shida inaweza kuwa ni hapo kwa active huja pass value
		$sql = "UPDATE `devices` SET date='$my_date',device_name='$name',device_description='$description',capacity='$capacity',gps='$gps',status='$status' WHERE id=$user_id";
		if (mysqli_query($cn, $sql)) {
			if ($status>0) {
				$acc="activated";
			} else {

				$acc="deactivated";
			}	
			//get the username for outputing the data
			$getuser=mysqli_query($cn,"select * from devices_user WHERE device_code='$code'");
			while($row=mysqli_fetch_array($getuser))
			{
				$owner=$row['device_user'];
				$dname=$row['device_name'];

			}

			
				///Notify user that a device has been altered
				$message="Hi ".$owner." ".$dname. " has been " .$acc. "."; 
				$sender="Admin";
				$my_date = date("Y-m-d H:i:s");
		$sqlnotify = "INSERT INTO `device_notification`(`device_code`, `device_user`, `date`, `message`, `sender`, `seen`) VALUES ('$code','$owner','$my_date','$message','$sender','NO')";
		$executenotify=mysqli_query($cn,$sqlnotify);
				///Notify user that a device has been altered

				header('Location: device_list.php?status=200');
		}else {
		echo"failed to edit";
		}
	}
?>