<?php
include("dbconfig.php");


if(empty($_GET['device_code']))
    {
		echo"One of the field is blank <br>check your data and try again";		

	}else {

        
    	$device_code = $_GET['device_code'];
    

        $sql = "select * from devices where device_code='$device_code'";
		$execute=mysqli_query($conn,$sql);
		
		
		if(mysqli_num_rows($execute)== 0){
		//	$status=2;
		//	echo $status;
			echo "Sorry we dont have such a device in our database. Check your device code and try again ";
		}
		//	echo "Sorry we dont have such a device in our database "; }
		 else{

			while($row=mysqli_fetch_array($execute))
			{
				$status=$row['status'];
	
			}  	
			
			echo $status;
		 
			}            

        
    }



	$conn->close();

?>