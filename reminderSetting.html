<?php
    include "AllFunction.php";
    require_once "connection.php";

    session_start();



    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Check if the GET form was submitted
        if (isset($_GET['get_form_submit'])) {
            // Call your function for GET form here
            if(checkUser()){
                $user = $_SESSION['user'];
                $reminderPre = $_GET['reminderPre'];
                $user->setReminder($reminderPre);
                if($reminderPre != "none"){
                    $reminderTime = date_create(date('Y-m-d', strtotime('0 day')));
                    remind($reminderTime, $user);
                }
                elseif($reminderPre == "daily"){
                    $reminderTime = date_create(date('Y-m-d', strtotime('+1 day')));
                    remind($reminderTime, $user);
                }
                elseif($reminderPre == "weekly"){
                    $reminderTime = date_create(date('Y-m-d', strtotime('+1 week')));
                    remind($reminderTime, $user);
                }
                elseif($reminderPre == "monthly"){
                    $reminderTime = date_create(date('Y-m-d', strtotime('+1 month')));
                    remind($reminderTime, $user);
                }
                echo "<script>alert('Profile Updated Successfully');</script>";
            }
            else{
                echo "<script>alert('User not logged in');</script>";
                header("Location: onlineSource.html");
            }
        }
    }

    function remind($reminderTime, $user){
        global $conn;
        $currentDate = new DateTime(date('Y-m-d'));
        $interval = $currentDate->diff($reminderTime);
        $differenceInDays = $interval->days;
        if ($differenceInDays == 0) {
            // Send email
            $to = $user->getEmail();
            $subject = "Reminder: Activity log is due today.";
            $message = "This is a reminder that your task is due today.";
            mail($to, $subject, $message);
        } else {
            // If the difference in days is not 0, do nothing or perform other actions
            // For example, you can echo a message or log the event
            echo "No reminder needed.";
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
        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Carbon Footprint</title>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
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
                                    <li><a href="changePass.php"><span class="fa fa-cog"></span> Password</a></li>
                                    <li class="active"><a href="#"><span class="fa fa-clock-o"></span> Reminders</a></li>
                                </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <form action="reminderSetting.php" method="GET">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Reminder Setting</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Preferred Reminder</label>
                                <select class="form-select" name="reminderPre" aria-label="Default select example">
                                    <option disabled selected>Open this select menu</option>
                                    <option value="none">None</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>

                            <div class="col-md-3 ml-5 mt-4 text-center">
                                <button class="btn btn-success btn-md mx-auto d-block profile-button" name="get_form_submit" type="submit" id="saveProfile">Save</button>
                            </div>
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




