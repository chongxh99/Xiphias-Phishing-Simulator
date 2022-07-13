<?php
session_start();
include("dbconnect.php");


if (isset($_POST['edit_profile'])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $password = $_POST["password"];
        $company_name = $_POST["company_name"];
        $company_phnum = $_POST["company_phnum"];
        $email = $_SESSION["email"];
        
        if (empty($_POST['password'])){
            $sqlupdate = "UPDATE tbl_user SET first_name = '$first_name', last_name ='$last_name', company_name = '$company_name', company_phnum = '$company_phnum' WHERE company_email = '$email'";
        if ($conn->query($sqlupdate) === TRUE){
            echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('profile_page.php');</script>";
            }else{
            echo "<script type='text/javascript'>alert('Failed!!!');window.location.assign('profile_page.php');</script>";
            } 
        }
        else{
        $sqlupdate = "UPDATE tbl_user SET first_name = '$first_name', last_name ='$last_name', password = '$password', company_name = '$company_name', company_phnum = '$company_phnum' WHERE company_email = '$email'";
        if ($conn->query($sqlupdate) === TRUE){
            echo "<script type='text/javascript'>alert('Success!!!');window.location.assign('profile_page.php');</script>";
            }else{
            echo "<script type='text/javascript'>alert('Failed!!!');window.location.assign('profile_page.php');</script>";
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
          <div class="col-10"></div>
          <div class="col-1">
            <button class="btn btn-primary my-4" data-bs-target="#logoutModal" data-bs-toggle="modal" >Logout</button>
          </div>
        </div>

        <div class="container my-5">
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="../assets/image/default_img.png" class="card-img-top" width="400px"height="250px" alt="phishing template">
                                    </div>
                                </div>
                                <div class="about my-4">
                                    <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="row my-3">
                                <label for="fullName">
                                    <h2>Edit Profile</h2>
                                </label>
                            </div>
                            <form method="POST">
                                <div class="row my-3">
                                    <label for="fullName">First Name</label>
                                    <?php
                                    $email = $_SESSION["email"];
                                    $sqlloaduser = "SELECT * FROM tbl_user WHERE company_email = '$email'";
                                    $result = $conn->query($sqlloaduser);
                                    if ($result->num_rows > 0){
                                        while ($row = $result -> fetch_assoc()){
                                            extract($row);
                                            ?>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter full name" value="<?php echo $first_name ?>">
                                </div>
                                <div class="row my-3">
                                    <label for="fullName">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter full name" value="<?php echo $last_name ?>">
                                </div>
                                <div class="row my-3">
                                    <!-- Password field -->
                                        <label for="fullName">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" value="">
                                </div>
                                <div class="row">
                                    <!-- An element to toggle between password visibility -->
                                    <div class="col-1" >
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
                                    </div>
                                    <div class="col-2" >
                                        <h6>Show Password</h6>
                                    </div>
                                    <div class="col-9"></div>
                                </div>
                                <div class="row my-3">
                                    <label for="fullName">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter full name" value="<?php echo $company_name ?>">
                                </div>
                                <div class="row my-3">
                                    <label for="fullName">Company Phone Number</label>
                                    <input type="text" class="form-control" id="company_phnum" name="company_phnum" placeholder="Enter full name" value="<?php echo $company_phnum ?>">
                                </div>
                                <?php
                                        
                                    }
                                }
                            
                            ?>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <!--<button type="submit" class="btn btn-secondary" name="login">Login</button>-->
                                    <button type="button" id="submit"  class="btn btn-secondary">Cancel</button>
                                    <button type="submit"  class="btn btn-primary" name="edit_profile">Update</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
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
            
                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
                </script>
                
                <script>
                    function myFunction() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                    x.type = "text";
                    } else {
                    x.type = "password";
                    }
                }
                </script>
                
</body>
</html>