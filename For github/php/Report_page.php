<?php
session_start();
include("dbconnect.php");
$email = $_SESSION["email"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home8/hubbuddi/public_html/271317/xiphias/php/PHPMailer/Exception.php';
require '/home8/hubbuddi/public_html/271317/xiphias/php/PHPMailer/PHPMailer.php';
require '/home8/hubbuddi/public_html/271317/xiphias/php/PHPMailer/SMTP.php';


if(isset($_POST['send_email'])){
    
    $receiver_email = $_POST["receiver_email"];
    $campaign_id = $_SESSION["campaign_id"];
    /*echo $receiver_email;*/
    
    echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('Report_page.php');</script>";
    sendEmail($email, $receiver_email, $campaign_id);
}

function sendEmail($email, $receiver_email, $campaign_id){
    
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
    $to = $receiver_email;
    $subject = "Xiphias Phishing Simulation Report";
    $index = 1 ;
    
    
    $message .= file_get_contents("https://hubbuddies.com/271317/xiphias/php/test.php?email=$email&campaign_id=$campaign_id");
    $mail->setFrom($from,"Xiphias Phishing Simulation");
    $mail->addAddress($to);                                             //Add a recipient
    
    //Content
    $mail->isHTML(true);                                                //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
}

    $campaign_id = $_SESSION["campaign_id"];
    
    $sqlphishingyes = "SELECT a.campaign_id, a.target_name, a.target_email, a.target_hpnum, b.phishing_status 
    FROM tbl_target a
    JOIN tbl_phishing b
    ON b.phishing_email= a.target_email AND b.campaign_id = a.campaign_id
    WHERE a.email = '$email' AND b.phishing_status = 'yes' AND a.campaign_id = '$campaign_id'";
    $result = $conn->query($sqlphishingyes);
    if ($result->num_rows > 0){
    
    $totalphishingyes = mysqli_num_rows( $result );
    }
    
    $sqlphishingno = "SELECT a.campaign_id, a.target_name, a.target_email, a.target_hpnum, b.phishing_status 
    FROM tbl_target a
    JOIN tbl_phishing b
    ON b.phishing_email= a.target_email AND b.campaign_id = a.campaign_id
    WHERE a.email = '$email' AND b.phishing_status = 'no' AND a.campaign_id = '$campaign_id'";
    $result = $conn->query($sqlphishingno);
    if ($result->num_rows > 0){
    
    $totalphishingno = mysqli_num_rows( $result );
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
        
    <!-- body -->
    <div class="container-fluid">
        <div class="container">
            <div class="row my-5">
                <div class="col">
                    <h1>Report</h1>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-10"></div>
                <div class="col-2">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#send_report_email">Send as Email</button>
                </div>
            </div>
        </div>

        <!-- File & Graphic Type Chart -->
        <div class="row mt-4 px-5">
            <div class="col-0 col-md-1 col-lg-1"></div>
            <div class="col-0 col-md-4 col-lg-4 ">
                <!-- Pie Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-transparent py-3">
                        <h6 class="m-0 font-weight-bold text-gray-800">Phishing Statistics</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="fileTypeChart"></canvas>
                        </div>
                    </div>
                </div>
                </div>
            <div class="col-0 col-md-6 col-lg-6">
                <!-- Pie Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-transparent py-3">
                        <h6 class="m-0 font-weight-bold text-gray-800">Phishing Statistics</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="graphicTypeChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-0 col-md-1 col-lg-1"></div>
        </div>

        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-xl-1 col-md-1 mb-4"></div>
                    <div class="col-xl-5 col-md-5 mb-4">
                        <div class="card shadow h-100 py-2" style="border-left: 0.25rem solid #4181FD">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Number of people subjected to phishing
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            if($totalphishingyes != 0){
                                                echo $totalphishingyes;
                                            }else{
                                                echo 0;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-people-fill h3" style="color: #dee2e6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-5 col-md-5 mb-4">

                        <div class="card shadow h-100 py-2" style="border-left: 0.25rem solid #08846D;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Number of people who not subjected to phishing
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            
                                            <?php
                                            if($totalphishingno != 0){
                                                echo $totalphishingno;
                                            }else{
                                                echo 0;
                                            }
                                            ?>
                                            
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-file-earmark-person h3" style="color: #dee2e6"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-md-1 mb-4"></div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-1"></div>   
            <div class="col-10">    
                <div class="card shadow mb-4">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered py-3">
                                <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Full Name</th>
                                        <th>Email Address</th>
                                        <th>Handphone Number</th>
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
                                        
                                        $sqlloadtarget = "SELECT a.campaign_id, a.target_name, a.target_email, a.target_hpnum, b.phishing_status 
                                        FROM tbl_target a
                                        JOIN tbl_phishing b
                                        ON b.phishing_email= a.target_email AND b.campaign_id = a.campaign_id
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
                                        <td>
                                            <?php
                                            if($phishing_status == "yes"){
                                                ?>
                                                <p style:"font-family: sans-serif">Clicked</p>
                                                <?php
                                            }else{
                                                ?>
                                                <p style:"font-family: sans-serif">Unclicked</p>
                                                <?php
                                            }
                                            ?>
                                            
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
            <div class="col-1"></div>
        </div>

    </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="send_report_email" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Send Report As Email</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST">
              <div class="modal-body">
                  <p class="mb-4"><small><em>This report will be sent through email iin pdf file. Please provide the receiver's email below.</small></em></p>
                  <input type="hidden" class="form-control" id="document" name="document" aria-describedby="emailHelp" required>
                  <div class="mb-3">
                      <label for="fullName">Receiver's Email</label>
                      <input type="text" class="form-control" id="receiver_email" name="receiver_email" aria-describedby="emailHelp" required>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success" data-bs-dismiss="modal" name="send_email">Done</button>
                  <button type="reset" class="btn btn-outline-warning reset-btn" data-bs-dismiss="modal" aria-label="Close">Reset</button>
              </div>
          </form>
          </div>
      </div>
    </div>
    
      <!--Modal-->
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
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            let fileTypeChart = document.getElementById('fileTypeChart').getContext('2d');
            let massPopChart1 = new Chart(fileTypeChart, {

                type: 'pie',
                data: {
                    labels: ['subjected to phishing', 'not subjected to phishing'],
                    datasets: [
                        {
                            data: [<?php echo $totalphishingyes ?> , <?php echo $totalphishingno ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }, plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
                });

                let graphicTypeChart = document.getElementById('graphicTypeChart').getContext('2d');
                let massPopChart2 = new Chart(graphicTypeChart, {

                type: 'bar',
                data: {
                    labels: ['subjected to phishing', 'not subjected to phishing'],
                    datasets: [
                        {
                            data: [<?php echo $totalphishingyes ?>, <?php echo $totalphishingno ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }, plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
                });
        </script>
    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>
</html>