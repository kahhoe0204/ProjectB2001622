<?php
    include "AllFunction.php";
    include "classes/activity.php";
    require_once "base.php";

    $con = mysqli_connect('localhost', 'root', '', 'userDB');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Fetch data from the activity table
    $query = "SELECT activityType, SUM(totalEmission) AS totalEmission FROM activityTB GROUP BY activityType";
    $result = mysqli_query($con, $query);

    // Initialize arrays to store labels and data
    $labels = [];
    $data = [];

    // Populate arrays with fetched data
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row['activityType'];
        $data[] = (float)$row['totalEmission'];

    }
    mysqli_close($con);
    
    
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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">
        
        

    </head>
    
    <body>

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="home.php">
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
                                <a class="nav-link click-scroll" href="updateProfile.php">My Account</a>
                            </li>

                            <li class="nav-item">
                                <?php 
                                    loginButtonChecker($logged);
                                ?>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
            
            <section class="about-section section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                            <div class="services-info">

                                <h6 class="mt-4">Once in Lifetime Experience</h6>

                                <p>You are not allowed to redistribute the template ZIP file on any other website without a permission.</p>

                                <h6 class="mt-4">Whole Night Party</h6>

                                <p>Please tell your friends about our website. Thank you.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="about-text-wrap">
                                <div class="about-text-info d-flex">
                                    <div class="d-flex">
                                        <i class="about-text-icon bi-calculator"></i>
                                    </div>

                                    <div class="ms-4">
                                        <a href="#" id="showCalculator"><h3>Calculate</h3></a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="about-section section-padding" id="section_2c">
                <div class="container">
                        <h3 style="padding-top: 140px;">Your Carbon Footprint</h3>
                        <div>
                            <canvas id="pie-chart" style="padding-top: 10px"></canvas>
                        </div>    
                </div>
            </section>
            
        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>
        <script>
            document.getElementById('showCalculator').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                var section = document.getElementById('section_2c');
                section.style.display = 'block';
                section.scrollIntoView({ behavior: 'smooth' });
            });
        </script>

        <script>
            new Chart(document.getElementById('pie-chart'), {
                type: 'pie',
                data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    backgroundColor: ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', '#E6B333', '#3366E6', '#999966'],
                   data: <?php echo json_encode($data); ?>
                }]
                },
                options: {
                title: {
                    display: true,
                    text: 'Pie Chart for admin panel'
                },
                responsive: true
                }
            });
        </script>

    </body>
</html>