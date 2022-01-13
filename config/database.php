<?php
session_start();
function errormessage(){
    if (isset($_SESSION["errormessage"])) {
        $output="<div class=\"alert alert-danger alert-dismissible fade show\">";
        $output.=htmlentities($_SESSION["errormessage"]);
        $output.="<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
        $output.="<span aria-hidden=\"true\">&times;</span>";
        $output.="</button>";        
        $output.="</div>";
        
        $_SESSION["errormessage"]=null;
        return $output;
                
        # code...
    }

}
function successmessage(){
    if (isset($_SESSION["successmessage"])) {
        $output="<div class=\"alert alert-success alert-dismissible fade show\">";
        $output.=htmlentities($_SESSION["successmessage"]);
        $output.="<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
        $output.="<span aria-hidden=\"true\">&times;</span>";
        $output.="</button>";
        $output.="</div>";
        
        $_SESSION["successmessage"]=null;
        return $output;

    }

 

}

error_reporting(0);
$cn=mysqli_connect("localhost","kaggzcok_root","kaguma2021","kaggzcok_login_signup") or die("Could not Connect My Sql");
$datetime=date("Y-m-d")

?>
