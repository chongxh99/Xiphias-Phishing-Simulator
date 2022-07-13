<?php
session_start();
include("dbconnect.php");

if (isset($_POST['register'])) {
    
    $company_email = $_POST["company_email"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $password = $_POST["inputPassword"];
    $confirmPassword = $_POST["confirm_pass"];
    $company_name = $_POST["company_name"];
    $company_phnum = $_POST["company_phnum"];
    $status = "active";
    $otp = "0";
    // $otp = rand(1000, 9999);
  
    if($password!=$confirmPassword){
      //this is javascript - message box and bring u to another page
        echo "<script type='text/javascript'>alert('Password Not match!');window.location.assign('register_page.php');</script>";
    }else{
        $query = "INSERT INTO tbl_user(company_email, first_name, last_name, password, company_name, company_phnum, otp, status, img_status) VALUES('$company_email', '$first_name', '$last_name', '$password','$company_name','$company_phnum','$otp','$status','noimg')";
        if(mysqli_query($conn, $query))
        {
            echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('login_page.php');</script>";
            
        }else{
           echo "<script type='text/javascript'>alert('Failed!!!');window.location.assign('register_page.php');</script>";
        }
       
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

    <style>

        .bg-image{
            background-image: url('../assets/image/login_bg.jpg');
            /* filter: brightness(0.8); */
        }
    </style>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>

<body>
    <!-- header -->
  <nav class="navbar navbar-expand-lg" style="background-color: #283f50">
    <div class="container-fluid">
      <a class="navbar-brand" href="home_page.php" style="color: white">
        <img src="../assets/image/logo.png" alt="logo" width="35" height="30" class="d-inline-block align-text-top">
        Xiphias
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home_page.php" style="color: white" ></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="color: white"></a>
          </li>
        </ul>
        
        <a href="login_page.php"><button class="btn btn-outline-success mx-3"
              style="color: white">Login</button></a>
              
      </div>
    </div>
  </nav> 

  <!-- body -->
    <div class="row">

        <div class="row bg-image pt-5">
            <div class="col-3"></div>
            <div class="col-6 my-5" >
                <div class="container py-3 rounded shadow" style="background-color: rgb(161, 161, 161);">
                    <div class="row" style="background-color: #283f50">
                        <a class="navbar-brand" href="#" style="color: white">
                            <img src="../assets/image/logo.png" alt="" width="35" height="30" class="d-inline-block align-text-top">
                            Sign Up
                        </a>
                    </div>
                
                    <form method="post">
                        
                        <div class="my-4 row">
                            <div class="col-3">
                                <label for="inputPassword" class="col-form-label">Company Email (Username)</label>
                            </div>
                            <div class="col-9">
                                <input type="email" class="form-control" id="company_email" name="company_email" placeholder="name@domain.com" required>
                            </div>
                        </div>
                        
                        <div class="my-4 row ">
                            <div class="col-3">
                                <label for="inputPassword" class="col-form-label">First name</label>
                            </div>                                
                            <div class="col-9">
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                        </div>
    
                        <div class="my-4 row">
                            <div class="col-3">
                                <label for="inputPassword" class="col-form-label">Last name</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>
    
                        <div class="my-4 row">
                            <div class="col-3">
                                <label for="inputPassword" class="col-form-label">Password</label>
                            </div>
                            <div class="col-9">
                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
                            </div>
                        </div>
    
                        <div class="my-4 row">
                            <div class="col-3">
                                <label for="inputPassword" class="col-form-label">Confirmation Password</label>
                            </div>
                            <div class="col-9">
                                <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" required>
                            </div>
                        </div>
    
                        <div class="my-4 row">
                            <div class="col-3">
                                <label for="inputPassword" class="col-form-label">Company Name</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="company_name" name="company_name" required>
                            </div>
                        </div>
    
                        <div class="my-4 row">
                            <div class="col-3">
                                <label for="inputPassword" class="col-form-label">Company phone number</label>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" id="company_phnum" name="company_phnum" placeholder="0112233556" required>
                            </div>
                        </div>
    
                        <div class="mb-1 row">
                            <div class="col-5"></div>
                            <div class="col-3">
                                <input type="submit" class="btn btn-secondary" name="register" value="Submit">
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </form>
                </div>
            <div class="col-3"></div>
        </div>

             <!-- <footer> -->

     <section class="footer">
      <div class="main-footer position">
        <div class="footer-middle mt-0" style="background: #283f50">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <img src="../assets/image/logo.png" alt="" width="150" height="175" class="d-inline-block align-text-top pt-5">

                    </div>
                    <div class="col-6">
                      <h1 class="my-5" style="font-size: 60px; color: white;">
                         Xiphias Phishing Simulation Tool</h1>
                      <h3 class="my-3" style="color: white;"> Totally for free.</h3>
                    </div>

                    <div class="col-4"></div> 
                </div>
                <div class="footer-bottom">
                    <p class="text-xs-center footer-title-text" style="color: white;">
                        &copy; <script>document.write(new Date().getFullYear())</script> Xiphias - The Best Phishing Simulator For Free in the Internet.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
</body>
</html>