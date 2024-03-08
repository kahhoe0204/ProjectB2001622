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

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>GreenTrace</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">
        
    </head>
    
    <body>

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="home.html">
                        GreenTrace
                    </a>

    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="home.php">Home</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#">Recommendations</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="calculator.php">Emission Calculator</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#">Historical Tracking</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#">My Account</a>
                            </li>

                            <li class="nav-item">
                                <?php 
                                    loginButtonChecker($logged);
                                ?>
                            </li>
                        </ul>

                        <!-- <a href="onlineSource.html" class="btn custom-btn d-lg-block d-none">Log In</a> -->
                    </div>
                </div>
            </nav>
            

            <section class="hero-section" id="section_1">
                <div class="section-overlay"></div>

                <div class="container d-flex justify-content-center align-items-center">
                    <div class="row">

                        <div class="col-12 mt-auto mb-5 text-center">
                            <small>Testing</small>

                            <h1 class="text-white mb-5">test</h1>

                            <a class="btn custom-btn smoothscroll" href="#">button</a>
                        </div>

                        <div class="col-lg-12 col-12 mt-auto flex-column flex-lg-row text-center">
                        

                            <div class="social-share">
                                <ul class="social-icon d-flex align-items-center justify-content-center">
                                    <span class="text-white me-3">Share:</span>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link">
                                            <span class="bi-facebook"></span>
                                        </a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link">
                                            <span class="bi-twitter"></span>
                                        </a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link">
                                            <span class="bi-instagram"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="video/production_id_4842993 (540p).mp4" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>
            </section>
        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>
        <script src="onlineSource.js"></script>
 
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    </body>

