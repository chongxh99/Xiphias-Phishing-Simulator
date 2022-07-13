<?php
    session_start();
    error_reporting(0);
    include("dbconnect.php");
  
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    
    // require '/home8/javathre/public_html/web_project/Code/HTML/PHPMailer/Exception.php';
    // require '/home8/javathre/public_html/web_project/Code/HTML/PHPMailer/PHPMailer.php';
    // require '/home8/javathre/public_html/web_project/Code/HTML/PHPMailer/SMTP.php';
  
    if (isset($_POST['login'])) {
        $company_email = $_POST["company_email"];
        $_SESSION["session_id"] = session_id();
        $_SESSION["email"] = "$company_email";
        $password = $_POST["password"];
        $query = "SELECT * FROM `tbl_user` WHERE `company_email` = '$company_email' AND `password` = '$password' ";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result -> fetch_assoc()){
                extract($row);
                
                if($status=="block"){
                    echo "<script type='text/javascript'>alert('Account hass been block');window.location.assign('login_page.php?');</script>'";
                }
            }
            
                echo "<script type='text/javascript'>alert('Success');window.location.assign('Campaign_page.php?');</script>'";

        }else{
            echo "<script type='text/javascript'>alert('Fail!!!');window.location.assign('login_page.php');</script>'";
        }
    }
    
    if (isset($_GET["status"])) {
        if (($_GET["status"] == "logout")) {
            session_unset();
            session_destroy();
            echo "<script> alert('Session Cleared')</script>";
            echo "<script> window.location.replace('home_page.php')</script>";
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

    <!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>

    .bg-image{
        background-image: url('../assets/image/login_bg.jpg');
        /* filter: brightness(0.8); */
    }
</style>

</head>

<body onload="loadCookies()">
    <!-- header -->
  <nav class="navbar navbar-expand-lg" style="background-color: #283f50">
    <div class="container-fluid">
      <a class="navbar-brand" href="home_page.php" style="color: white">
        <img src="../assets/image/logo.png" alt="" width="35" height="30" class="d-inline-block align-text-top">
        Xiphias
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!--<ul class="navbar-nav me-auto mb-2 mb-lg-0" >-->
        <!--  <li class="nav-item">-->
        <!--    <a class="nav-link active" aria-current="page" href="home_page.php" style="color: white" >Home</a>-->
        <!--  </li>-->
        <!--  <li class="nav-item">-->
        <!--    <a class="nav-link" href="#" style="color: white">About Us</a>-->
        <!--  </li>-->
        <!--</ul>-->
      </div>
    </div>
  </nav> 

  <!-- body -->
    <div class="row">

        <div class="row bg-image py-5">
            <div class="col-0 col-md-2 col-lg-4"></div>
            <div class="col-12 col-md-8 col-lg-4 my-5" >
                <div class="container py-4 rounded shadow" style="background-color: rgb(161, 161, 161);">
                    <div class="row" style="background-color: #283f50">
                        <a class="navbar-brand" href="#" style="color: white">
                            <img src="../assets/image/logo.png" alt="" width="35" height="30" class="d-inline-block align-text-top">
                            Login
                        </a>
                    </div>
                
                    <form method="post" name="loginForm" onsubmit="return validateLoginForm()">
                        <div class="my-4 row ">
                            <div class="col-3 col-md-3 col-lg-3">
                                <label for="inputPassword" class="col-form-label">Username</label>
                            </div>                                
                            <div class="col-9 col-md-3 col-lg-9 ">
                                <input type="email" class="form-control" id="email" name="company_email"  placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="my-4 row">
                            <div class="col-3">
                                <label for="inputPassword" class="col-form-label">Password</label>
                            </div>
                            <div class="col-9">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberme" name="rememberme">
                            <label class="form-check-label" for="flexCheckChecked"> Remember Me </label>
                        </div>
                        <div class="mb-1 row">
                            <div class="col-3">
                                <button type="submit" class="btn btn-secondary" name="login">Login</button>
                            </div>
                            <div class="col-4"></div>
                            <div class="col-5">
                                <!--<button type="" class="btn btn-secondary float-end">Forgot Password</button>-->
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="col-0 col-md-2 col-lg-4"></div>

            
            
            <div class="row" >
                <div class= "col-3 col-md-2 col-lg-4"></div>
                <div class= "col-6 col-md-8 col-lg-4 my-5">
                <h4 style="color: white;"> Don't have an account?</h4>
                <br>
                <a href="register_page.php"><button class="btn btn-success mx-3"
              style="color: white">Register Now</button></a>
                <br><br><br><br>
                </div>
                <div class= "col-3 col-md-2 col-lg-4"></div>
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

    <script>
    function validateLoginForm() {
        var email = document.forms["loginForm"]["email"].value;
        var password = document.forms["loginForm"]["password"].value;
        if ((email === "") || (password === "")) {
            alert("Please fill out your email/password");
            return false;
        }
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!re.test(String(email))) {
            alert("Please correct your email");
            return false;
        }
        setCookies(10);
    }

    function setCookies(exdays) {
        var email = document.forms["loginForm"]["email"].value;
        var password = document.forms["loginForm"]["password"].value;
        var rememberme = document.forms["loginForm"]["rememberme"].checked;
        console.log(email, password, rememberme);
        if (rememberme) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = "cusername=" + email + ";" + expires + ";path=/";
            document.cookie = "cpass=" + password + ";" + expires + ";path=/";
            document.cookie = "rememberme=" + rememberme + ";" + expires + ";path=/";
    
        } else {
            document.cookie = "cusername=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
            document.cookie = "cpass=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/";
            document.cookie = "rememberme=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/";
        }
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function loadCookies() {
        var username = getCookie("cusername");
        var password = getCookie("cpass");
        var rememberme = getCookie("rememberme");
        console.log("COOKIES:" + username, password, rememberme);
        document.forms["loginForm"]["email"].value = username;
        document.forms["loginForm"]["password"].value = password;
        if (rememberme) {
            document.forms["loginForm"]["rememberme"].checked = true;
        } else {
            document.forms["loginForm"]["rememberme"].checked = false;
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
</body>
</html>