<?php
	include '../config/database.php';
	$code=$_POST['code'];
	$user=$_POST["name"];
	//$uname=$_POST['name'];
	$email=$_POST['email_id'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$upassword = md5($_POST['password']);
	

	
	if($_POST['mode']==1){
		$duplicate=mysqli_query($cn,"select * from mst_user where email_id='$email' ");
		if (mysqli_num_rows($duplicate)>0)
		{
			header('Location: add_user.php');
			$_SESSION["errormessage"]="Sorry the email has been taken";

			exit();
		}

if (!empty($code)){	
		
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
					$status=$row['status'];
	
				}
				//////////////////////////////////////
				//check if user alerady ako na device
				$checkdevice=mysqli_query($cn,"select * from devices_user where device_code='$code' ");
				if (mysqli_num_rows($checkdevice)>0)
				{
		
					header('Location: add_user.php');
					$_SESSION["errormessage"]="Sorry this device has already been taken";
	
			
	
			
	
	
	
			}else {
				$password="password";
			//add device into database
			$sql = "INSERT INTO `devices_user`(`device_code`, `password`,`date`, `device_name`,`device_description`,`capacity`, `device_user`, `gps`, `status`) VALUES ('$code','$password','$datetime','$name','$description','$capacity','$email','$gps','$status')";
				if (mysqli_query($cn, $sql)) {
	
					///congratulate user for adding a device
					$message="Congratulations ".$user." Your device  has been Registered successfully to our database."; 
					$sender="Admin";
					$my_date = date("Y-m-d H:i:s");
	
			$sqlcongratulate = "INSERT INTO `device_notification`(`device_code`, `device_user`, `date`, `message`, `sender`, `seen`) VALUES ('$code','$email','$my_date','$message','$sender','NO')";
			$executecongratulate=mysqli_query($cn,$sqlcongratulate);
					///congratulate user for adding a device

					
			
					$sql = "INSERT INTO `mst_user`(`device_code`,`name`, `email_id`, `phone`, `city`, `password`) VALUES ('$code','$uname','$email','$phone','$city','$upassword')";
					if (mysqli_query($cn, $sql)) {
						header('Location: user_list.php');
						$_SESSION["successmessage"]="User added successfully";
			
					}else {
						echo"failed to add user";
						}
			
					
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
	
	   $sql2 = "INSERT INTO device_data(device_user,device_code,password,status,date,sales,stock_in,stock_sold,stock_remaining,unit_price) VALUES ('$email','$code','$password','$status','$datetime','0','0','0','0','0')";
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
	
	$sqlmilk = "INSERT INTO milk_status(device_user,device_code,temperature,ph,conductivity) VALUES ('$email','$code','0','0','0')";
	$execute=mysqli_query($cn,$sqlmilk);
		
	}
	
			}
						//end tag tocheck if user alerady ako na device
	
	//////////////////////////////////////////////////
			}else {
			
					//kumbuka hapa kwa status 201 kuweka ikue success
					header('Location: add_user.php');
					$_SESSION["errormessage"]="Sorry this device does not exist in our database";
	
					exit();
			}
		}else {
			
			

			$sql = "INSERT INTO `mst_user`(`device_code`,`name`, `email_id`, `phone`, `city`, `password`) VALUES ('$code','$uname','$email','$phone','$city','$upassword')";
			if (mysqli_query($cn, $sql)) {
				header('Location: user_list.php');
				$_SESSION["successmessage"]="User added successfully";
	
			}else {
				echo"failed to add user";
				}
	


		}
		




		}











	
//#########Editing db starts here###########//


	if($_POST['mode']==2){
		$user_id=$_POST['user_id'];
		$password = md5($_POST['password']);

		//#########obtain user to link delete clause###########//
	$rs=mysqli_query($cn,"SELECT * FROM mst_user WHERE user_id=$user_id");
	while($row=mysqli_fetch_array($rs))
	{
		$d_user=$row['email_id'];
	}
//#########obtain user to link delete clause###########//


		$sql = "UPDATE `mst_user` SET device_code='$code', name='$uname',email_id='$email',phone='$phone',city='$city',password='$upassword' WHERE user_id=$user_id;";
		if (mysqli_query($cn, $sql)) {
			header('Location: user_list.php');
			$_SESSION["successmessage"]="User Edited successfully";

		}else {		
			header('Location: add_user.php');
			$_SESSION["errormessage"]="Sorry. something went wrong ";

			}
	}
?>