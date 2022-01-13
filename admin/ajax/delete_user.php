<?php
	include '../../config/database.php';
	/**/
	$id=$_POST['id'];
	$sql = "DELETE FROM `mst_user` WHERE user_id=$id";
				//#########delete every table relating to user###########//
	//#########obtain user to link delete clause###########//
	$rs=mysqli_query($cn,"SELECT * FROM mst_user WHERE user_id=$id");

					while($row=mysqli_fetch_array($rs))
					{
						$d_user=$row['email_id'];
					}
	//#########obtain user to link delete clause###########//


	//#########delete every table relating to user###########//
	$query_del="DELETE FROM `mst_user` WHERE user_id=$id;
	DELETE FROM `device_data` WHERE device_user='$d_user';
	DELETE FROM `devices_user` WHERE device_user='$d_user';
	DELETE FROM `milk_status` WHERE device_user='$d_user';
	DELETE FROM `device_notification` WHERE device_user='$d_user'";
	
	//#########delete every table relating to user###########//

	if (mysqli_multi_query($cn,$query_del)) {
		echo json_encode(array("statusCode"=>200));
	}

?>