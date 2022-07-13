<?php
$servername = "localhost";
$username = "hubbuddi_xiphiasadmin";
$password = "C~5_@432X6Yp";
$dbname = "hubbuddi_xiphiasdb";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} 

?>