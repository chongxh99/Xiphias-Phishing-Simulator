<?php

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
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  
  <!-- header -->
  <nav class="navbar navbar-expand-lg" style="background-color: #283f50">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: white">
        <img src="../assets/image/logo.png" alt="" width="35" height="30" class="d-inline-block align-text-top">
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
        
                <a href="login_page.php"><button class="btn btn-outline-success mx-3" style="color: white">Login</button></a>
              
                <a href="register_page.php"><button class="btn btn-outline-success mx-3" style="color: white">Sign up</button></a>

      </div>
    </div>
  </nav> 

  <!-- body -->
  
    <section class="Main">
      <div class="row pt-5" style="background-color: #283f50;">
        <div class="col-5 " >
          <div class="row my-5">
            <div class="col-3" >
            </div>
            <div class="col-6">
              <div class="row">
                <h1 style="color: white" >Xiphias Phishing Simulator</h1>
              </div>
              <div class="row" style="color: white">
                <p>Xiphias is a phishing simulator that let any organization evaluate the employees' cyber security awareness</p>
              </div>
              <div class="row">
                <div class="col-3">
                </div>
                <div class="col-6">
                  <a href="register_page.php"><button class="btn btn-secondary "
                style="color: white">Get Started !</button></a>
                </div>
                <div class="col-3">
                </div>
              </div>
            </div>
  
            <div class="col-3 ">
            </div>
          </div>
        </div>
        <div class="col-7" style="background-color: #283f50; ">
          <img src="../assets/image/example_page/Slide1.JPG" alt="Graph" width="875px" height="550px">
        </div>
      </div>
    </section>

    <section class="Features">
      <div class="row" style="background-color: #DEDEDE;">
        <div class="col">
          <h1 class="text-center my-5" style="font-size: 65px;">Features</h1>
        </div>
      <div class="container" style="background-color: #DEDEDE;" ></div>  
        <div class="row" style="background-color: #DEDEDE;">
          <div class="col">
            <img src="../assets/image/web-design.png" class="rounded mx-auto d-block" alt="web design" width="150px" height="150px">
            <div class="row">
              <h2 class="text-center mt-3" style="font-size: 30px">Beautiful Web UI</h2>
              <h3 small class="text-center mt-2 text-muted" style="font-size: 20px" small class="text-muted">
                Xiphias has a gorgeous web interface. Import existing websites and emails, enable email open tracking, and more with a single click.
              </h3>
            </div>
          </div>
          <div class="col">
            <img src="../assets/image/cross-platform.png" class="rounded mx-auto d-block" alt="cross platform" width="150px" height="150px" >
            <div class="row">
              <h2 class="text-center mt-3" style="font-size: 30px">Cross Platform</h2>
              <h3 small class="text-center mt-2 text-muted" style="font-size: 20px" small class="text-muted">
                Xiphias binaries are provided for most platforms, including Windows, Mac OSX, and Linux.
              </h3>
            </div>
          </div>
          <div class="col">
            <img src="../assets/image/monitoring.png" class="rounded mx-auto d-block" alt="monitor" width="150px" height="150px">
            <div class="row">
              <h2 class="text-center mt-3" style="font-size: 30px">Real-Time Result</h2>
              <h3 small class="text-center mt-2 text-muted" style="font-size: 20px" small class="text-muted">
                Xiphias updates results automatically. Using the UI, you can view a timeline for each recipient, tracking email opens, link clicks, submitted credentials, and more
              </h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="Steps in usig Xiphias">
      <div class="row">
        <div class="container" style="background-color: rgb(255, 255, 255);">
          <div class="row" style="background-color:rgb(255, 255, 255) ;">
            <h1 class="text-center my-5" style="font-size: 55px;">
            Steps to use Xiphias Simulator
            </h1>
            <div class="col-4">
              <img src="../assets/image/create campaign.png" class="rounded mx-auto d-block" alt="1st Step" width="50px" height="50px" >
              <h3 class="text-center my-4" style="font-size: 30px;">1. Create Campaign</h3>
              <h3 small class="text-center mt-2 text-muted" style="font-size: 20px" small class="text-muted">
                To create campaigns in Xiphias, user needs to fill-in and select details for phishing test.The details are campaign name, test groups, frequency, start date and time, and track activity.
              </h3>
            </div>
            <div class="col-4">
              <img src="../assets/image/Template.png" class="rounded mx-auto d-block" alt="1st Step" width="50px" height="50px" >
              <h3 class="text-center my-4" style="font-size: 30px;">2. Select Phishing Template</h3>
              <h3 small class="text-center mt-2 text-muted" style="font-size: 20px" small class="text-muted">
                Xiphias make it easy to select template in the phishing test. Users can search for various templates in search bar. It is all ready for you.
              </h3>
            </div>
            <div class="col-4">
              <img src="../assets/image/Target.png" class="rounded mx-auto d-block" alt="1st Step" width="50px" height="50px" >
              <h3 class="text-center my-4" style="font-size: 30px;">3. Target Selection</h3>
              <h3 small class="text-center mt-2 text-muted" style="font-size: 20px" small class="text-muted">
                Target selection in Xiphias is simple too. Users are able to select even hundreds of targets at once by uploading file.
              </h3>
            </div>
          </div>

          <div class="row" style="background-color:rgb(255, 255, 255) ;">
            <div class="col-4">
              <img src="../assets/image/verification.png" class="rounded mx-auto d-block mt-5" alt="1st Step" width="50px" height="50px" >
              <h3 class="text-center my-4" style="font-size: 30px;">4. Verification</h3>
              <h3 small class="text-center mt-2 text-muted" style="font-size: 20px" small class="text-muted">
                After all the details are selected, Xiphias will ask users to double confirm all the selected details.
              </h3>
            </div>
            <div class="col-4">
              <img src="../assets/image/Report.png" class="rounded mx-auto d-block mt-5" alt="1st Step" width="50px" height="50px" >
              <h3 class="text-center my-4" style="font-size: 30px;">5. View Report</h3>
              <h3 small class="text-center mt-2 text-muted" style="font-size: 20px" small class="text-muted">
                Xiphias will generate reports fully automatically for user. All the tested results will be recorded and stated professionally and neatly.
              </h3>
            </div>
            <div class="col-4">
              <img src="../assets/image/Feedback.png" class="rounded mx-auto d-block mt-5" alt="1st Step" width="50px" height="50px" >
              <h3 class="text-center my-4" style="font-size: 30px;">6. Feedback Form</h3>
              <h3 small class="text-center mt-2 text-muted" style="font-size: 20px" small class="text-muted">
                When everything is done, Xiphias will like to know how you feel about the whole process for phishing test through feedback. It is just a simple feedback form for us to make improvement in the future.
              </h3>
            </div>
          </div>
          
        </div>
      </div>
    </section>

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

                    <div class="col-4">
                      <div class="row my-5"></div>
                      <a href="register_page.php"><button class="btn btn-warning "
                style="color: black">Register Now</button></a>
                    </div> 
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

   <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script>
        function logOut(){
        window.location.assign("logout.php?");
        window.location.assign("login_page.php?");
    }
    </script>
</body>
</html>