<?php
  include "AllFunction.php";
  require_once "base.php";
  
  
  session_start();

  if (checkUser()) {
      $logged =true;
  } else {
      $logged = false;
  }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                  <?php if($logged){
                    echo '<a class="nav-link" href="updateProfile.php">My Account</a>';
                  }
                  else{
                    echo '<a class="nav-link" href="onlineSource.html">My Account</a>';
                  }
                  ?>
               </li>
               <li>
                  <?php 
                      loginButtonChecker($logged);
                    ?>
                </li>
              
            
             </ul>
           </div>
         </div>
       </div>
     </nav>
     
       <div class="container-fluid p-0">
         <image src="https://img.freepik.com/free-vector/blue-curve-background_53876-113112.jpg" alt="background"></image>
         <div class="bottom-center">
           <h1 class="display-4">Welcome to GreenTrace</h1>
           <h6 class="lead">This website ...............</h6>
         </div>
       </div>


        <div class="container" id="info">
          <div class="row">
            <div class="card text-center col-lg-4">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" alt="" class="card-img float-left">
              <div class="card-img-overlay">
              <h2>What is GreenTrace?</h2>
              <p>GreenTrace is a website that helps you track your carbon footprint. It provides you with a platform to log your daily activities and provides you with recommendations on how to reduce your carbon footprint. It also provides you with a history of your activities and real time data on your carbon footprint. </p>
            </div>
          </div>
              <div class="card text-center col-lg-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" alt="" class="card-img float-left">
                <div class="card-img-overlay">
                <h2>What is GreenTrace?</h2>
                <p>GreenTrace is a website that helps you track your carbon footprint. It provides you with a platform to log your daily activities and provides you with recommendations on how to reduce your carbon footprint. It also provides you with a history of your activities and real time data on your carbon footprint. </p>
              </div>
            </div>
            <div class="card text-center col-lg-4">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" alt="" class="card-img float-left">
              <div class="card-img-overlay">
              <h2>What is GreenTrace?</h2>
              <p>GreenTrace is a website that helps you track your carbon footprint. It provides you with a platform to log your daily activities and provides you with recommendations on how to reduce your carbon footprint. It also provides you with a history of your activities and real time data on your carbon footprint. </p>
            </div>
          </div>
            
          </div>
          </div>
     
       <footer>
         <div class="container">
             <!-- Content for the footer goes here -->
             <p>&copy; 2024 GreenTrace. All rights reserved.</p>
         </div>
     </footer>
     
     
     
     
      
       
       
       
         
           <!-- Add Bootstrap and jQuery scripts for functionality -->
        <script src="onlineSource.js"></script>
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       
     </body>
     


 
     