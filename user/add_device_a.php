<?php
	include '../config/database.php';
	$code = mysqli_real_escape_string($cn, $_POST['code']);

	$user=$_SESSION["email_id"];
	
	
	if($_POST['mode']==1){	
			//check if  device ilo kwa database yetu
		$exist=mysqli_query($cn,"select * from devices where device_code='$code' ");
		if (mysqli_num_rows($exist)>0)
		{

			while($row=mysqli_fetch_array($exist))
			{
				$code=$row['device_code'];
				$name=$row['device_name'];
				$description=$row['device_description'];
				$capacity=$row['capacity'];
				$gps=$row['gps'];
				//$password=$row['password'];
				$status=$row['status'];

			}
			//////////////////////////////////////
			//check if user alerady ako na device
			$checkdevice=mysqli_query($cn,"select * from devices_user where device_code='$code' ");
			if (mysqli_num_rows($checkdevice)>0)
			{
	
				header('Location: add_device.php');
				$_SESSION["errormessage"]="Sorry this device has already been taken";

		

		



		}else {
			$password="password";
		//add device into database
		$sql = "INSERT INTO `devices_user`(`device_code`, `password`,`date`, `device_name`,`device_description`,`capacity`, `device_user`, `gps`, `status`) VALUES ('$code','$password','$datetime','$name','$description','$capacity','$user','$gps','$status')";
			if (mysqli_query($cn, $sql)) {

				///congratulate user for adding a device
				$message="Congratulations ".$user." Your device  has been Registered successfully to our database."; 
				$sender="Admin";
				$my_date = date("Y-m-d H:i:s");

		$sqlcongratulate = "INSERT INTO `device_notification`(`device_code`, `device_user`, `date`, `message`, `sender`, `seen`) VALUES ('$code','$user','$my_date','$message','$sender','NO')";
		$executecongratulate=mysqli_query($cn,$sqlcongratulate);
				///congratulate user for adding a device


				header('Location: add_device.php');
				$_SESSION["successmessage"]="Device added successfully";

				
			}else {
				echo"failed to upload device";
			}
			//check if  device iko kwa table ya device_data
			$checkdevice2=mysqli_query($cn,"select * from device_data where device_code='$code' ");
			if (mysqli_num_rows($checkdevice2)>0)
			{

			//ikipata kuna device already ina edit username pekeee
			$sql3="UPDATE device_data SET device_user='$user' WHERE device_code='$code'";
			$execute=mysqli_query($cn,$sql3);
	

		}else {


								//ikikosa device kwa device_table  ianweka zeros
   /////////////////////////////////////////////////////////////////////
   //$sql2 = "INSERT INTO device_data(device_user,device_code,password,status,date,sales,stock_in,stock_sold,stock_remaining,unit_price,temperature,ph,conductivity) VALUES ('$user','$code','$password','$status','$datetime','0','0','0','0','0','0','0','0')";

   $sql2 = "INSERT INTO device_data(device_user,device_code,password,status,date,sales,stock_in,stock_sold,stock_remaining,unit_price) VALUES ('$user','$code','$password','$status','$datetime','0','0','0','0','0')";
   $execute=mysqli_query($cn,$sql2);
			
		}

	//check if  device iko kwa table ya milk_data
	$checkdevice2=mysqli_query($cn,"select * from milk_status where device_code='$code' ");
	if (mysqli_num_rows($checkdevice2)>0)
	{

	//ikipata kuna device already ina edit username pekeee
	$sql4="UPDATE milk_status SET device_user='$user' WHERE device_code='$code'";
	$execute=mysqli_query($cn,$sql4);


}else {

						//ikikosa device kwa milk_table   inaweka zeros
/////////////////////////////////////////////////////////////////////

$sqlmilk = "INSERT INTO milk_status(device_user,device_code,temperature,ph,conductivity) VALUES ('$user','$code','0','0','0')";
$execute=mysqli_query($cn,$sqlmilk);
	
}

		}
					//end tag tocheck if user alerady ako na device

//////////////////////////////////////////////////
		}else {
		
				//kumbuka hapa kwa status 201 kuweka ikue success
				header('Location: add_device.php');
				$_SESSION["errormessage"]="Sorry this device does not exist in our database";

				exit();
		}
		

	}//end ya post condition

?>