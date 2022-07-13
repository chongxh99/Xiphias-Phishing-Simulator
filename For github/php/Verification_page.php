<?php
session_start();
include("dbconnect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home8/hubbuddi/public_html/271317/xiphias/php/PHPMailer/Exception.php';
require '/home8/hubbuddi/public_html/271317/xiphias/php/PHPMailer/PHPMailer.php';
require '/home8/hubbuddi/public_html/271317/xiphias/php/PHPMailer/SMTP.php';


session_start();
error_reporting(0);
include("dbconnect.php");
$email = $_SESSION["email"];
$campaign_id = $_SESSION["campaign_id"];
$index = 1;

$sqlloadtarget = "SELECT * FROM tbl_template WHERE email = '$email' AND campaign_id = '$campaign_id'";
$result = $conn->query($sqlloadtarget);
if ($result->num_rows > 0){
    while ($row = $result -> fetch_assoc()){
        extract($row);
        
        $templateResult = $template;
        $templateIdResult = $template_id;
    }
}

if(isset($_POST['send_email'])){

    $option1 = $_POST["option1"];
    $template = $_POST["template"];
    $phishing_id = $_POST["phishing_id"];
    $phishing_status = "no";
    $campaign_id = $_SESSION["campaign_id"];
    $email = $_SESSION["email"];
    $count = count($option1);
    $index = 1;
    
    // echo $count;
    for($i=0;$i<$count;$i++){
        
        $sqlinsertphishing = "INSERT INTO tbl_phishing (email, phishing_email, phishing_status, template, campaign_id) VALUES('$email', '$option1[$i]','$phishing_status', '$template', '$campaign_id')";
        $conn->query($sqlinsertphishing);
        $index ++;
        // echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('Report_page.php');</script>";    
        }
    
    foreach($option1 as $item){
        
        sendEmail($item, $template );
    }
    
    // $sqlsearch = "SELECT * FROM tbl_template WHERE campaign_id = '$campaign_id' AND email = '$email'";
    // $result = $conn->query($sqlsearch);
    
    if (isset($sqlinsertphishing)){
        echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('Report_page.php');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Failed!!!');window.location.assign('Verification_page.php');</script>";
    } 
    
}

function sendEmail($email, $template){
    
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;                           //Disable verbose debug output
    $mail->isSMTP();                                //Send using SMTP
    $mail->Host       = 'mail.hubbuddies.com';                         //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                       //Enable SMTP authentication
    $mail->Username   = 'xiphias_ps212@hubbuddies.com';                         //SMTP username
    $mail->Password   = 'eJ#nycwY6zri';                         //SMTP password
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;
    
    
    
    $from = "xiphias_ps212@hubbuddies.com";
    $to = $email;
    $subject = "Xiphias";
    $index = 1 ;
    
    session_start();
    error_reporting(0);
    include("dbconnect.php");

    if($template == "Netflix"){
        $message .= file_get_contents("https://hubbuddies.com/271317/xiphias/php/email2.php?email=$email&template=$template");
        $mail->setFrom($from,"Netflix");
    }else if($template == "Google"){
        $message .= file_get_contents("https://hubbuddies.com/271317/xiphias/php/email4.php?email=$email&template=$template");
        $mail->setFrom($from,"Google");
    }else if($template == "Apple"){
        $message .= file_get_contents("https://hubbuddies.com/271317/xiphias/php/email1.php?email=$email&template=$template");
        $mail->setFrom($from,"Apple");
    }else if($template == "Account"){
        $message .= file_get_contents("https://hubbuddies.com/271317/xiphias/php/email5.php?email=$email&template=$template");
        $mail->setFrom($from,"Human Resources Department");
    }else if($template == "Starbucks"){
        $message .= file_get_contents("https://hubbuddies.com/271317/xiphias/php/email3.php?email=$email&template=$template");
        $mail->setFrom($from,"Starbucks");
    }
    
    // $mail->setFrom($from,"Xiphias");
    $mail->addAddress($to);                                             //Add a recipient
    
    //Content
    $mail->isHTML(true);                                                //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
}


if (isset($_POST['update_campaign'])) {
    $campaign_id = $_POST["campaign_id"];
    $campaign_name = $_POST["campaign_name"];
    $campaign_group = $_POST["campaign_group"];
    $frequency = $_POST["frequency"];
    $track_activity = $_POST["track_activity"];
    $email = $_SESSION["email"];
    
    if(isset($track_activity)){
        $track_activity = "yes";
    }else{
        $track_activity = "no";
    }
    
    $sqlupdate = "UPDATE tbl_campaign SET campaign_name = '$campaign_name', campaign_group ='$campaign_group', frequency = '$frequency', track_activity = '$track_activity' WHERE email = '$email' AND campaign_id = '$campaign_id'";
    if ($conn->query($sqlupdate) === TRUE){
        echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('Verification_page.php');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Failed!!!');window.location.assign('Verification_page.php');</script>";
    } 
    
}else if (isset($_POST['update_template'])) {
    $template_id = $_POST["template_id"];
    $template = $_POST["template"];
    // $campaign_id = $_SESSION["campaign_id"];
    $email = $_SESSION["email"];
    
    
    $sqlupdate = "UPDATE tbl_template SET template = '$template' WHERE email = '$email' AND template_id = '$template_id'";
    if ($conn->query($sqlupdate) === TRUE){
        echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('Verification_page.php');</script>";
    }else{
        echo "<script type='text/javascript'>alert('Failed!!!');window.location.assign('Verification_page.php');</script>";
    } 
    
}else if (isset($_POST['add_target'])) {
    
    $email = $_SESSION["email"];
    $campaign_id = $_SESSION["campaign_id"];
    $target_name = $_POST["target_name"];
    $target_email = $_POST["target_email"];
    $target_hpnum = $_POST["target_hpnum"];
  
    $query = "INSERT INTO tbl_target(email, campaign_id, target_name, target_email, target_hpnum) VALUES('$email', '$campaign_id', '$target_name', '$target_email', '$target_hpnum')";
    if(mysqli_query($conn, $query))
    {
        echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('Verification_page.php');</script>";
        
    }else{
       echo "<script type='text/javascript'>alert('Failed!!!');window.location.assign('Verification_page.php');</script>";
    }
   
  
}else if (isset($_POST['edit_target'])){
    
    $email = $_SESSION["email"];
    $target_id = $_POST["target_id"];
    $target_name = $_POST["target_name"];
    $target_email = $_POST["target_email"];
    $target_hpnum = $_POST["target_hpnum"];
    
    $sqlupdate = "UPDATE tbl_target SET target_name = '$target_name', target_email = '$target_email', target_hpnum = '$target_hpnum' WHERE email = '$email' AND target_id = '$target_id'";
    
    if(mysqli_query($conn, $sqlupdate))
    {
        echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('Verification_page.php');</script>";
        
    }else{
       echo "<script type='text/javascript'>alert('Failed!!!');window.location.assign('Verification_page.php');</script>";
    }
    }else if (isset($_POST['deleteTarget'])){
    
    $target_id = $_POST["target_id"];
    
    $deleteDoc = "DELETE FROM `tbl_target` WHERE target_id = '$target_id'";
    
    if(mysqli_query($conn, $deleteDoc))
    {
        echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('Verification_page.php');</script>";
        
    }else{
       echo "<script type='text/javascript'>alert('Failed!!!');window.location.assign('Verification_page.php');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiphias</title>

    <!--CSS only-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
</head>

<body>

    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
        <a href="#" class="navbar-brand text-light mt-5">
            <div class="display-5 font-weight-bold">
                <img src="../assets/image/logo.png" alt="" width="50" height="50" class="d-inline-block align-text-top ps-1">
                Xiphias</div>
        </a>
        <ul class="navbar-nav d-flex flex-column mt-5 w-100">
          <li class="nav-item w-100">
            <a href="Campaign_page.php" class="nav-link text-light pl-4">Create Campaign</a>
          </li>
          <li class="nav-item w-100">
            <a href="Template_page.php" class="nav-link text-light pl-4">Phishing Template</a>
          </li>
          <li class="nav-item w-100">
            <a href="Target_page.php" class="nav-link text-light pl-4">Target Selection</a>
          </li>
          <li class="nav-item w-100">
            <a href="Verification_page.php" class="nav-link text-light pl-4">Verification</a>
          </li>
          <li class="nav-item w-100">
            <a href="Report_page.php" class="nav-link text-light pl-4">Report</a>
          </li>
          <li class="nav-item w-100">
            <a href="Feedback_page.php" class="nav-link text-light pl-4">FeedBack Form</a>
          </li>
        </ul>
    </nav>

    <section class="my-container">
        <div class="row" style="background-color: #283f50">
          <div class="col-1">
            <button class="btn m-4" id="menu-btn"><i class="bi bi-justify"></i></button>
          </div>
          <div class="col-9"></div>
          <div class="col-1">
              <?php
                $email = $_SESSION['email'];
                if(isset($email)){
                    ?>
                    <a href="profile_page.php" ><img src="../assets/image/default_img.png" class="img-fluid mt-2" width="100px"height="100px" alt="phishing template"></a>
                    
                    <?php
                } else{
                    
                }
            ?>
          </div>
          <div class="col-1">
            <button class="btn btn-primary my-4" data-bs-target="#logoutModal" data-bs-toggle="modal" >Logout</button>
          </div>
        </div>
        
        <div class="container-fluid">
            <div class="container">
                <div class="row mt-5 mb-3 ps-5">
                    <div class="col">
                        <h1>Verification</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="card bg-light mb-3">
                <div class="card-body">
                    <div class="row my-2 ms-2">
                        <div class="col-12">
                            <h4>Campaign</h4>
                        </div>
                        <!--<div class="col-1">-->
                        <!--    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editCampaign">Edit</button>-->
                        <!--</div>-->
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered py-3 " style="background-color:white">
                                <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Campaign Name</th>
                                        <th>Group(s)</th>
                                        <th>Frequency</th>
                                        <th>Start Date</th> 
                                        <th>Track Activity</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        session_start();
                                        error_reporting(0);
                                        include("dbconnect.php");
                                        // echo $_SESSION["email"];
                                        $email = $_SESSION['email'];
                                        $index = 1;
                                        
                                        $sqlloadtarget = "SELECT * FROM tbl_campaign WHERE email = '$email'";
                                        $result = $conn->query($sqlloadtarget);
                                        if ($result->num_rows > 0){
                                            while ($row = $result -> fetch_assoc()){
                                            extract($row);
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $index++ ?></td>
                                        <td><?php echo $campaign_name ?></td>
                                        <td><?php echo $campaign_group ?></td>
                                        <td><?php echo $frequency ?></td>
                                        <td><?php echo $start_date ?></td>
                                        <td><?php echo $track_activity ?></td>
                                        <td>
                                            <i class="bi bi-pencil me-2" style="color: #693D70 ; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#editCampaign" onclick="updateCampaignDialog('<?php echo $campaign_id ?>', '<?php echo $campaign_name ?>', '<?php echo $campaign_group ?>', '<?php echo $frequency ?>', '<?php echo $start_date ?>', '<?php echo $track_activity ?>')"></i>
                                        </td>
                                    </tr>
                                    
                                        <?php 
                                            }
                                        } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="row my-2 ms-2">
                        <div class="col-11">
                            <h4>Selected Template</h4>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editTemplate" onclick="updateTemplate('<?php echo $templateResult ?>', '<?php echo $templateIdResult ?>')">Edit</button>
                        </div>
                    </div>
                    <div class="row my-2 ms-2">
                        <div class="col-3">
                            <h5>Template Name: </h5>
                        </div>
                        <div class="col-9">
                            <?php
                                session_start();
                                error_reporting(0);
                                include("dbconnect.php");
                                $email = $_SESSION['email'];
                                // echo $email;
                                $index = 1;
                                
                                $sqlloadtarget = "SELECT * FROM tbl_template WHERE email = '$email'";
                                $result = $conn->query($sqlloadtarget);
                                if ($result->num_rows > 0){
                                    while ($row = $result -> fetch_assoc()){
                                        extract($row);
                                        
                                        if($template == "Netflix"){
                                            ?>
                                             <h2 class=" mt-3" style="font-size: 25px">Netflix Reset Password</h2>
                                            <?php
                                        }else if($template == "Google"){
                                            ?>
                                             <h2 class=" mt-3" style="font-size: 25px">Google Safety Message</h2>
                                            <?php
                                        }else if($template == "Apple"){
                                            ?>
                                             <h2 class=" mt-3" style="font-size: 25px">Apple Support</h2>
                                            <?php
                                        }else if($template == "Account"){
                                            ?>
                                            <h2 class=" mt-3" style="font-size: 25px">Account Scheduled</h2>
                                            <?php
                                        }else if($template == "Starbucks"){
                                            ?>
                                            <h2 class=" mt-3" style="font-size: 25px">Starbucks Promotion</h2>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                            <div class="card" style="width: 375px;">
                                <!--<img src="../assets/image/Template1.jpg" class="card-img-top" alt="phishing template">-->
                                <div class="card-body">
                                <?php    
                                    $campaign_id = $_SESSION["campaign_id"];
                                    
                                    $sqlloadtemplate = "SELECT * FROM tbl_template WHERE email = '$email' AND campaign_id = '$campaign_id'";
                                    $result = $conn->query($sqlloadtemplate);
                                    if ($result->num_rows > 0){
                                        while ($row = $result -> fetch_assoc()){
                                            extract($row);
                                            
                                            if($template == "Netflix"){
                                                ?>
                                                 <img src="../assets/image/Template1.jpg" class="card-img-top" width="350px"height="450px" alt="phishing template">
                                                <?php
                                            }else if($template == "Google"){
                                                ?>
                                                 <img src="../assets/image/Template4.jpg" class="rounded mx-auto d-block" alt="web design" width="350px"height="400px">
                                                <?php
                                            }else if($template == "Apple"){
                                                ?>
                                                <img src="../assets/image/Template2.jpg" class="rounded mx-auto d-block" alt="web design" width="350px"height="400px">
                                                <?php
                                            }else if($template == "Account"){
                                                ?>
                                                <img src="../assets/image/Template5.jpg" class="rounded mx-auto d-block" alt="web design" width="350px"height="400px">
                                                <?php
                                            }else if($template == "Starbucks"){
                                                ?>
                                                <img src="../assets/image/Template3.jpg" class="rounded mx-auto d-block" alt="web design" width="350px"height="400px">
                                                <?php
                                                
                                            }
                                        }
                                    }
                                
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="row my-2 ms-2">
                        <div class="col-11">
                            <h4>Selected Target</h4>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTarget">Edit</button>
                        </div>
                    </div>
                    <form method="POST">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered py-3" style="background-color:white">
                                <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Full Name</th>
                                        <th>Email Address</th>
                                        <th>Handphone Number</th>
                                        <th>Template</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        session_start();
                                        error_reporting(0);
                                        include("dbconnect.php");
                                        $email = $_SESSION['email'];
                                        $campaign_id = $_SESSION["campaign_id"];
                                        $index = 1;
                                        
                                        $sqlloadtarget = "SELECT a.target_id, a.target_name, a.target_email, a.target_hpnum, b.template
                                        FROM tbl_target a
                                        JOIN tbl_template b
                                        ON b.email= a.email
                                        WHERE a.email = '$email' AND a.campaign_id = '$campaign_id'";
                                        $result = $conn->query($sqlloadtarget);
                                        if ($result->num_rows > 0){
                                            while ($row = $result -> fetch_assoc()){
                                                extract($row);
                                                ?>
                                        <tr>
                                          <td><?php echo $index++ ?></td>
                                          <td><?php echo $target_name ?></td>
                                          <td><?php echo $target_email ?></td>
                                          <td><?php echo $target_hpnum ?></td>
                                          <td><?php echo $template ?></td>
                                          <td>
                                            <i class="bi bi-pencil me-2" style="color: #693D70 ; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#editTarget" onclick="updateTargetDialog('<?php echo $target_id ?>', '<?php echo $target_name ?>', '<?php echo $target_email ?>', '<?php echo $target_hpnum ?>')"></i>
                                            <i class="bi bi-trash me-2" style="color: #693D70 ; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#deleteTargetModal" onclick="deleteTargetDialog('<?php echo $target_id ?>')"></i>
                                            <input type="checkbox" class="form-check-input " id="check1" name="option1[]" value="<?php echo $target_email ?>" checked>
                                          </td>
                                        </tr>
                                        
                                     <?php   
                                    }
                                }
                          ?>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>

            <div class="row my-2">
                <div class="col-10"></div>
                <div class="col-2">
                    <input type="hidden" class="form-input " id="check1" name="template" value="<?php echo $template ?>">
                    <button type="submit" class="btn btn-primary" name="send_email" >Confirm</button>
                </div>
                </form>
            </div>
        </div>
    </section>
    
    <!--Edit Target Modal -->
    <div class="modal fade" id="editTarget" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add or Import File</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form method="POST">
                <div class="modal-body">
                      <p class="h6 mb-2">Manual Add Target List</p>
                      <input type="hidden" class="form-control" id="target_id1" name="target_id" aria-describedby="emailHelp" required>
                      <div class="mb-3">
                          <label for="fullName">Full Name</label>
                          <input type="text" class="form-control" id="target_name" name="target_name" aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="emailAdd">Email Address</label>
                        <input type="text" class="form-control" id="target_email" name="target_email" aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="hpNum">Handphone Number</label>
                        <input type="text" class="form-control" id="target_hpnum" name="target_hpnum" aria-describedby="emailHelp" required>
                      </div>
                      <br>
                      <!--<p class="h6 mb-2">Import File</p>-->
                      <!--<div class="mb-3">-->
                      <!--  <input type="hidden" class="form-control" id="document" name="document" aria-describedby="emailHelp" required>-->
                      <!--  <div class="mb-3">-->
                      <!--      <input type="file" class="form-control" id="percentage" name="percentage" aria-describedby="emailHelp" required> -->
                      <!--  </div>-->
                      <!--</div>-->
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="edit_target">Done</button>
                      <button type="reset" class="btn btn-outline-warning reset-btn" data-bs-dismiss="modal" aria-label="Close">Reset</button>
                  </div>
            </form>
          </div>
      </div>
    </div>
    
    <!--Delete Target Modal-->
    <div class="modal fade" id="deleteTargetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    Are You Sure ?
                    <input type="hidden" class="form-control" id="target_id2" name="target_id" aria-describedby="emailHelp" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning reset-btn" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn userlist-btn text-light" name='deleteTarget'>Yes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <!--Target Modal -->
    <div class="modal fade" id="addTarget" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add or Import File</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form method="POST">
                <div class="modal-body">
                      <p class="h6 mb-2">Manual Add Target List</p>
                      <!--<input type="hidden" class="form-control" id="document" name="document" aria-describedby="emailHelp" required>-->
                      <div class="mb-3">
                          <label for="fullName">Full Name</label>
                          <input type="text" class="form-control" id="fullName" name="target_name" aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="emailAdd">Email Address</label>
                        <input type="text" class="form-control" id="emailAdd" name="target_email" aria-describedby="emailHelp" required>
                      </div>
                      <div class="mb-3">
                        <label for="hpNum">Handphone Number</label>
                        <input type="text" class="form-control" id="hpNum" name="target_hpnum" aria-describedby="emailHelp" required>
                      </div>
                      <br>
                      <!--<p class="h6 mb-2">Import File</p>-->
                      <!--<div class="mb-3">-->
                      <!--  <input type="hidden" class="form-control" id="document" name="document" aria-describedby="emailHelp" required>-->
                      <!--  <div class="mb-3">-->
                      <!--      <input type="file" class="form-control" id="percentage" name="percentage" aria-describedby="emailHelp" required> -->
                      <!--  </div>-->
                      <!--</div>-->
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="add_target">Done</button>
                      <button type="reset" class="btn btn-outline-warning reset-btn" data-bs-dismiss="modal" aria-label="Close">Reset</button>
                  </div>
            </form>
          </div>
      </div>
    </div>
    
    <!--Logout Modal-->
    <div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Logout ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are You Sure ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-warning reset-btn" data-bs-dismiss="modal">No</button>
                <a href="home_page.php?status=logout" >
                    <button type="button" class="btn btn-outline-primary">Yes</button>
                </a>
              </div>
            </div>
        </div>
    </div>
        
    <!-- Campaign Modal -->
    <div class="modal fade" id="editCampaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Campaign</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3">
                    <input type="hidden" class="form-control" name="campaign_id" id="campaign_id" aria-describedby="emailHelp" required>
                      <label for="exampleInputEmail1" class="form-label">Campaign Name</label>
                      <input type="text" class="form-control" name="campaign_name" id="campaign_name" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Group(s)</label>
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="font-size: medium" id="campaign_group" name="campaign_group">
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                    </div>
                    <div class=" row mb-1">
                            <label for="exampleInputPassword1" class="form-label" >Frequency</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="frequency" value="one time" id="frequency1">
                                <label class="form-check-label" for="oneTime">
                                  One Time
                                </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="frequency" value="monthly" id="frequency2" >
                                <label class="form-check-label" for="monthly">
                                  Monthly
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Track Activity</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="track_activity1" name="track_activity" value="yes">
                            <label class="form-check-label" for="mySwitch">Yes</label>
                        </div>
                    </div>
                  
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="update_campaign">Save changes</button>
                    </div>
                </form>
        </div>
        </div>
    </div>

    <!-- Template Modal -->
    <div class="modal fade" id="editTemplate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Template</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" class="form-control" id="template_id1" name="template_id" aria-describedby="emailHelp" required>
                    <div class="row mb-3">
                        <div class="col-9">
                            <label for="exampleInputEmail1" class="form-label">Netflix Reset Password</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="template" value="Netflix" id="Netflix">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-9">
                            <label for="exampleInputEmail1" class="form-label">Apple Support</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="template" value="Apple" id="Apple">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-9">
                            <label for="exampleInputEmail1" class="form-label">Starbucks Promotion</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="template" value="Starbucks" id="Starbucks">
                        </div>
                    </div>
                        
                    <div class="row mb-3">
                        <div class="col-9">
                            <label for="exampleInputEmail1" class="form-label">Google Safety Message</label>
                        </div>
                        <div class="col-3">
                            
                            <input class="form-check-input" type="radio" name="template" value="Google" id="Google">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-9">
                            <label for="exampleInputEmail1" class="form-label">Account Scheduled</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="radio" name="template" value="Account" id="Account">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="update_template">Save changes</button>
                    </div>
                </form>
        </div>
        </div>
    </div>

    <!-- <footer> -->
    <section class="footer">
        <div class="main-footer position">
            <div class="footer-middle mt-0" style="background: #283f50">
            <div class="container">
                <div class="row">
                <div class="col-1">
                    <img src="../assets/image/logo.png" alt="" width="110" height="100" class="d-inline-block align-text-top mt-5">
                </div>
                <div class="col-11">
                    <h1 class="mt-5" style="font-size: 60px; color: white;">
                    Xiphias Phishing Simulation Tool</h1>
                    <h3 class="mt-2" style="color: white;"> Totally for free.</h3>
                </div>
                </div>
                <div class="footer-bottom">
                <p class="text-xs-center footer-title-text" style="color: white;">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script> Xiphias - The Best Phishing Simulator For Free
                    in the Internet.
                </p>
                </div>
            </div>
            </div>
        </div>
    </section>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" class="init">
    $(document).ready( function (){

        var events = $('#events');
        var table = $('#example').DataTable( {
            select: true,
            "pagingType": "full",
        })
    });
    </script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script>
        var menu_btn = document.querySelector("#menu-btn")
        var sidebar = document.querySelector("#sidebar")
        var container = document.querySelector(".my-container")
        menu_btn.addEventListener("click", () => {
            sidebar.classList.toggle("active-nav")
            container.classList.toggle("active-cont")
        })
        
        function updateTemplate(templateResult, templateIdResult){
            
            document.getElementById('template_id1').value = templateIdResult;
            
            if(templateResult == "Account"){
                
                document.getElementById('Account').checked = true;
                
            }else if(templateResult == "Apple"){
                
                document.getElementById('Apple').checked = true;
                
            }else if(templateResult == "Google"){
                
                document.getElementById('Google').checked = true;
                
            }else if(templateResult == "Netflix"){
                
                document.getElementById('Netflix').checked = true;
                
            }else if(templateResult == "Starbucks"){
                
                document.getElementById('Starbucks').checked = true;
                
            }
        }
        
        function updateTargetDialog(target_id, target_name, target_email, target_hpnum){
            
            console.log(target_id);
            
            document.getElementById('target_id1').value = target_id;
            document.getElementById('target_name').value = target_name;
            document.getElementById('target_email').value = target_email;
            document.getElementById('target_hpnum').value = target_hpnum;
        }
        
        function deleteTargetDialog(target_id){
            
            document.getElementById('target_id2').value = target_id;
        }
        
        function updateCampaignDialog(campaign_id, campaign_name, campaign_group, frequency, start_date, track_activity){
            
            console.log("a");
            console.log(campaign_name);
            console.log(campaign_group);
            console.log(frequency);
            console.log(start_date);
            console.log(track_activity);
            document.getElementById('campaign_id').value = campaign_id;
            document.getElementById('campaign_name').value = campaign_name;
            document.getElementById('campaign_group').value = campaign_group;
            // document.getElementById('start_date').value = start_date;
            
            if(frequency == "one time"){
                document.getElementById('frequency1').checked = true;
            }else if(frequency == "monthly"){
                document.getElementById('frequency2').checked = true;
            }

            if(track_activity == "yes"){
                document.getElementById('track_activity1').checked = true;
            }else{
                document.getElementById('track_activity1').checked = false;
            }
        }
    </script>    

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>