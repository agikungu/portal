<?php

					//#########Function to delete user###########//
					function delete_user(&$sql){
                        $cn=mysqli_connect("localhost","root","","login_signup") or die("Could not Connect My Sql");

						//mysqli_query($cn,$sql);

						echo $sql;
					
							}
	$id=90;
	$sql_user="'DELETE FROM `mst_user` WHERE user_id=$id'";
		 delete_user($sql_user);
//$sql_notification= "DELETE FROM `device_notification` WHERE device_user='$d_user'";
	