<?php
    session_start();
    include("dbconnect.php");
    require_once('QuickChart.php');
    $email = $_GET["email"];
    $campaign_id = $_GET["campaign_id"];
    error_reporting(0);

    $sqlphishingyes = "SELECT a.campaign_id, a.target_name, a.target_email, a.target_hpnum, b.phishing_status 
    FROM tbl_target a
    JOIN tbl_phishing b
    ON b.phishing_email= a.target_email
    WHERE a.email = '$email' AND b.phishing_status = 'yes' AND a.campaign_id = '$campaign_id'";
    $result = $conn->query($sqlphishingyes);
    if ($result->num_rows > 0){
    
    $totalphishingyes = mysqli_num_rows( $result );
    }
    
    $sqlphishingno = "SELECT a.campaign_id, a.target_name, a.target_email, a.target_hpnum, b.phishing_status 
    FROM tbl_target a
    JOIN tbl_phishing b
    ON b.phishing_email= a.target_email
    WHERE a.email = '$email' AND b.phishing_status = 'no' AND a.campaign_id = '$campaign_id'";
    $result = $conn->query($sqlphishingno);
    if ($result->num_rows > 0){
    
    $totalphishingno = mysqli_num_rows( $result );
    }
    
    $chart1 = new QuickChart(array(
      'width' => 500,
      'height' => 300
    ));
    
    $chart1->setConfig('{
      type: "pie",
      data: {
        labels: ["Number of people subjected to phishing", "Number of people who not subjected to phishing"],
        datasets: [{
          label: "Users",
          data: [ '.$totalphishingyes.', '.$totalphishingno.']
        }]
      }
    }');
    
    $chart2 = new QuickChart(array(
      'width' => 500,
      'height' => 300
    ));
    
    $chart2->setConfig('{
      type: "bar",
      data: {
        labels: ["Number of people subjected to phishing", "Number of people who not subjected to phishing"],
        datasets: [{
          label: "Users",
          data: [ '.$totalphishingyes.', '.$totalphishingno.']
        }]
      }
    }');
    $image = $chart1->toBinary();
    $chart1->toFile('../assets/image/chart1.png');
    $chart2->toFile('../assets/image/chart2.png');

    echo    "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content= 'width=device-width, initial-scale=1.0'>
                <title>Document</title>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
                integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
                <link rel='stylesheet' href= 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css'>
            </head>
            <body>
            <div class='container-fluid'>
                <div class='container'>
                    <div class='row my-5'>
                        <div class='col'>
                            <h1>Phishing Simulation Report</h1>
                        </div>
                    </div>
                </div>
            
                <!-- File & Graphic Type Chart -->
                <div class='row mt-4 px-5'>
                    <div class='col-0 col-md-1 col-lg-1'></div>
                    <div class='col-0 col-md-4 col-lg-4'>
                        <!-- Pie Chart -->
                        <div class='card shadow mb-4'>
                            <div class='card-header bg-transparent py-3'>
                                <h3 class='m-0 font-weight-bold text-gray-800'>Phishing Statistics</h3>
                            </div>
                            <div class='card-body'>
                                <div class='chart-bar'>
                                    <img class='img-fluid' src = 'https://hubbuddies.com/271317/xiphias/assets/image/chart1.png' />
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class='col-0 col-md-6 col-lg-6'>
                        <!-- Pie Chart -->
                        <div class='card shadow mb-4'>
                            <div class='card-header bg-transparent py-3'>
                                <h3 class='m-0 font-weight-bold text-gray-800'>Phishing Statistics</h3>
                            </div>
                            <div class='card-body'>
                                <div class='chart-bar'>
                                    <img class='img-fluid' src = 'https://hubbuddies.com/271317/xiphias/assets/image/chart2.png' />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-0 col-md-1 col-lg-1'></div>
                </div>
            </div>
                
            </body>
            </html>"

?>