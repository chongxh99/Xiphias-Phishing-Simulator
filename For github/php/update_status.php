<?php
    error_reporting(0);
    include_once("dbconnect.php");
    $email= $_POST['email'];
    $template = $_POST['template'];
 
    $sqlupdate = "UPDATE tbl_phishing SET phishing_status = 'yes' WHERE email  = '$email' && template = '$template'";
    if ($conn->query($sqlupdate) === TRUE){
        echo 'Success';
        }else{
        echo 'Failed';
        }
?>