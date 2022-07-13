<?php
    session_start();
    include("https://hubbuddies.com/271317/xiphias/php/dbconnect.php");
    $email = $_SESSION["email"];

    $sqlphishingyes = "SELECT a.target_name, a.target_email, a.target_hpnum, b.phishing_status 
    FROM tbl_target a
    JOIN tbl_phishing b
    ON b.email= a.target_email AND b.campaign_id = a.campaign_id
    WHERE a.email = '$email' AND b.phishing_status = 'yes'";
    $result = $conn->query($sqlphishingyes);
    if ($result->num_rows > 0){
    
    $totalphishingyes = mysqli_num_rows( $result );
    }
    
    $sqlphishingno = "SELECT a.target_name, a.target_email, a.target_hpnum, b.phishing_status 
    FROM tbl_target a
    JOIN tbl_phishing b
    ON b.email= a.target_email AND b.campaign_id = a.campaign_id
    WHERE a.email = '$email' AND b.phishing_status = 'no'";
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
    <title>Report Email</title>

    <!--CSS only-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>
<body>

    <div class="container-fluid">
        <div class="container">
            <div class="row my-5">
                <div class="col">
                    <h1>Phishing Simulation Report</h1>
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
                        <h3 class="m-0 font-weight-bold text-gray-800">Phishing Statistics</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <img class="img-fluid" src="https://quickchart.io/chart?c={type:'pie',data:{labels:['Number of people subjected to phishing', 'Number of people who not subjected to phishing'],
                                datasets:[{label:'Users',data:['<?php echo $totalphishingyes ?>', '<?php echo $totalphishingno ?>']}]}}" />
                        </div>
                    </div>
                </div>
                </div>
            <div class="col-0 col-md-6 col-lg-6">
                <!-- Pie Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-transparent py-3">
                        <h3 class="m-0 font-weight-bold text-gray-800">Phishing Statistics</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <img class="img-fluid" src="https://quickchart.io/chart?c={type:'bar',data:{labels:['Number of people phished','Number of people who not phished'],
                            datasets:[{label:'Users',data:['<?php echo $totalphishingyes ?>','<?php echo $totalphishingno ?>']}]}}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-0 col-md-1 col-lg-1"></div>
        </div>

    
</body>
</html>