<?php
include("dbconfig.php");


if(empty($_GET['device_code']) || empty($_GET['gps']))
    {
		echo"One of the field is blank <br>check your data and try again";		

	}else {

        
    	$device_code = $_GET['device_code'];
    	$gps = $_GET['gps'];

	    $sql = "INSERT INTO devices_user (device_code, gps, date)
		
		VALUES ('".$device_code."', '".$gps."', '".$datetime."')";

		if ($conn->query($sql) === TRUE) {
		    echo "Device Data uploaded successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
        

        
    }



	$conn->close();

?>