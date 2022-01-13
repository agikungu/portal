<?php
if(empty($_SESSION['user_id'])){
	header('Location: ../index.php');
}

?>

<?php 
$admin="alekskaggz@gmail.com";

if ($_SESSION["email_id"]==$admin) {
  $_SESSION['admin']=true;

  
}



?>