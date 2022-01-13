<?php
include '../config/database.php';
session_start();
$id = $_SESSION["user_id"];/* userid of the user */
if(count($_POST)>0) {
$result = mysqli_query($cn,"SELECT * from login_user WHERE user_id='" . $id . "'");
$row=mysqli_fetch_array($result);

//if(md5($_POST["currentpassword"]) == $row["password"] && $_POST["newpassword"] == $_POST["confirmpassword"] ) {
	if(md5($_POST["currentpassword"]) == $row["password"])
	
	{
	if( $_POST["newpassword"] == $_POST["confirmpassword"] ) {
		$sql = "UPDATE login_user set password='" . md5($_POST["newpassword"]) . "' WHERE user_id='" . $id . "'";
			if (mysqli_query($cn, $sql)) {
				header('Location: change_password.php?status=202');
			}else{

				header('Location: change_password.php?status=203');
				
			}
	
	
		}
		else{
			header('Location: change_password.php?status=200');
		}
}
else	{

	header('Location: change_password.php?status=201');

}

}

?>