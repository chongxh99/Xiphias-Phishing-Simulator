<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_GET["email"];
$template = $_GET["template"];
$yes= "yes";

$sqlsearch = "SELECT * FROM tbl_phishing WHERE phishing_email = '$email' AND template = '$template'";
$result = $conn->query($sqlsearch);
if($result->num_rows>0){
    $sqlupdate = "UPDATE tbl_phishing SET phishing_status = '$yes' WHERE phishing_email = '$email' AND template = '$template'";
    if($conn->query($sqlupdate) === TRUE ){
        echo 'success';
    }else{
        echo 'failed';
    }
        
}else{
    echo "no record";
}
?>