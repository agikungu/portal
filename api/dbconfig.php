<?php
//Creates new record as per request
    //Connect to database

	$servername = "localhost";
	$username = "kaggzcok_root";
	$password = "kaguma2021";
	$dbname = "kaggzcok_login_signup";
    

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    //Get current date and time
    date_default_timezone_set("Africa/Nairobi");
    //$d = date("Y-m-d");
    //echo " Date:".$d."<BR>";
    $t = date("H:i:s");
    $datetime=date("Y-m-d") ;
    


?>