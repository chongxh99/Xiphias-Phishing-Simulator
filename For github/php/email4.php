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
    <center class="wrapper">
        <div class="container">
            <div class="row my-4">
                <img src="https://hubbuddies.com/271317/xiphias/assets/image/email_template_gmail/gmail_logo.jpg" class="center" style="max-width: 600px;" width="180" alt="">
            </div>
            
            <div class="row mb-5">
                <h2 style="text-align:center; font-family: sans-serif">
                <?php
                    $sqlloadtarget = "SELECT * FROM tbl_target WHERE email = '$email'";
                    $result = $conn->query($sqlloadtarget);
                        if ($result->num_rows > 0){
                            while ($row = $result -> fetch_assoc()){
                            extract($row);
                ?>
                New device signed in to <?php echo $target_name ?></h2>
                <?php
                    }
                }
                ?>
            </div>
            <hr class="center mb-3" style="max-width: 600px;">
            <div class="row my-3">
                <p class="center" style="font-family: sans-serif; font-size: medium; max-width: 600px; text-align: start; ">Your Google Account was just signed in to from a new Apple iPhone device. 
                    You 're getting this email to make sure it was you.</p>
            </div>
            <div class="row mb-5">
                <div class="col-4"></div>
                <div class="col-4">
                <a href="https://hubbuddies.com/271317/xiphias/php/phishing.php?email=<?php echo $email ?>&template=<?php echo $template ?>" name="phishingEmail">CHECK ACTIVITY</a>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="row mt-3">
                <p class="center" style="font-family: sans-serif; font-size: small; max-width: 600px; text-align: start; color: #979797;">You received this email to let you know about the important changes to your
                     Google Account and services. @<script>document.write(new Date().getFullYear())</script> Google LLC, 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA.</p>
            </div>
        
        </div>
    </center>
    
    
    <!--JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    
</body>
</html>