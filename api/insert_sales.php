<?php
include("dbconfig.php");


if(empty($_GET['device_code']) || empty($_GET['values'])) {
	echo"One of the field is blank <br>check your data and try again";		
}else{

        
    	$device_code = $_GET['device_code'];
    

        $sql = "select * from devices_user where device_code='$device_code'";
		$execute=mysqli_query($conn,$sql);

		if(mysqli_num_rows($execute)== 0){
			//$user="none";
			echo"Sorry, either such device  does not exist or the it may not have been assigned to a user. Please check your device code properly and try again";
		 }
		 else{

			
			while($row=mysqli_fetch_array($execute))
			{
				$user=$row['device_user'];
				//get the machines passsword for veryfying
				$dbpassword=$row['password'];
				
	
			}
			  // something else to display the content

			  if ($execute) {

				$device_code = $_GET['device_code'];		
				$values = $_GET['values'];
	
				list($password,$stock_sold,$unit_price)=explode(',', $values);
				$password=mysqli_real_escape_string($conn,$password);
				$stock_sold=mysqli_real_escape_string($conn,$stock_sold);
				$unit_price=mysqli_real_escape_string($conn,$unit_price);
				$sales=$stock_sold*$unit_price;

				//VERIF SEVICE PASSWORD
				//$pass=md5($pass);
				$check=mysqli_query($conn,"select * from devices_user where device_code='$device_code' and password='$password'");
				$row = mysqli_fetch_array($check);
				if(mysqli_num_rows($check)>0)
				{
					//$_SESSION["email_id"]=$email_id;
					//$_SESSION["user_id"]=$row['user_id'];
					//$_SESSION["name"]=$row['name'];
		
					$sql2 = "INSERT INTO device_data (device_user, device_code, password, date, sales, stock_sold, unit_price )
				
					VALUES ('".$user."', '".$device_code."', '".$password."', '".$datetime."', '".$sales."', '".$stock_sold."', '".$unit_price."')";
			
					if ($conn->query($sql2) === TRUE) {
						echo "Device Data uploaded successfully";
					} else {
						
						echo "Error: " . $sql2 . "<br>" . $conn->error;
					}		
		
				   
				}
				else
				{
			   
					echo "Sorry. Check your device password and try again";
			
				}
				
			}
			  
		 
			}

    }



	$conn->close();

?>