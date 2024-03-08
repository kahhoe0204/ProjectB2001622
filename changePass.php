<?php
    include "AllFunction.php";

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the POST form was submitted
        if (isset($_POST['post_form_submit'])) {
            // Call your function for POST form here
            changePass();
        }
    }
    function changePass() {
        if(checkUser()){
            $currentPass = $_POST['cP'];
            $newPass = $_POST['nP'];
            $reconfirmPass = $_POST['rP'];
            $user = $_SESSION['user'];
            if($currentPass === $user->getPassword()){
                if($newPass === $reconfirmPass){
                    $user->setPassword($newPass);
                    echo "<script>alert('Password Changed Successfully');</script>";
                }
                else{
                    echo "<script>alert('New Password and Reconfirm Password do not match');</script>";
                }
            }
            else{
                echo "<script>alert('Current Password is incorrect');</script>";
            }
        }
        else{
            echo "<script>alert('User not logged in');</script>";
            header("Location: onlineSource.html");
        }
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="myProfile.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <title>Carbon Footprint</title>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="" alt="GreenTrace" height="36">
            </a>

            <!-- Toggler button for mobile view -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <div class="navbar-nav ms-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="activityLogForm.php">Activity Log</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="#">Recommendation</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="#">History</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="#">Real Time</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="#">My Account</a>
                        </li>
                        <li>
                            <?php
                               if (isset($_SESSION['user'])) {
                                   $userName = $_SESSION['user']->getName();
                                   loggedIn($userName);
                                } else {
                                   signOut();
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="side-bar">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture">
                        <span class="font-weight-bold">
                            <!-- php name -->
                            <?php 
                                $userName = $_SESSION['user']->getName();
                                echo $userName;
                            ?>
                        </span>
                        <span class="text-black-50">
                            <!-- php email -->
                            <?php 
                                $email = $_SESSION['user']->getEmail();
                                echo $email;
                            ?>
                        </span>
                        <nav class="side-menu">
                            <ul class="nav">
                                <li><a href="updateProfile.php"><span class="fa fa-user"></span> Profile</a></li>
                                <li class="active"><a href="#"><span class="fa fa-cog"></span> Password</a></li>
                                <li><a href="reminderSetting.php"><span class="fa fa-clock-o"></span> Reminders</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-9">
                <form action="changePass.php" method="POST">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience">
                            <h5 class="text-center ">Change Password</h5>
                        </div>
                            <br>
                        
                        <div class="col-md-12">
                            <label class="labels">Current Pasword</label>
                            <input type="password" id="cP" name="cP" class="form-control" placeholder="Current password" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="labels">New Password</label>
                            <input type="password" id="nP" name="nP" class="form-control" placeholder="New password" required>
                        </div>
                        <div class="col-md-12 mt-1">
                            <label class="labels">Reconfirm Password</label>
                            <input type="password" id="rP" name="rP" class="form-control" placeholder="Reconfirm password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md mx-auto d-block mt-4" name="post_form_submit" id="savePass">Save Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
        


    
    <script src = "updateProfile.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




