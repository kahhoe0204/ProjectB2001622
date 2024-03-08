<?php
    include "AllFunction.php";

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="activityLogForm.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        



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
                            <a class="nav-link" href="#">Activity Log</a>
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
        <div class="container py-5">


        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4">Activity Log</h1>
                <p class="lead mb-0">This form is designed to record your activity log securely. Rest assured, we prioritize your privacy and do not share your data with third parties.</p>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <!-- Credit card form tabs -->
                <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                    <li class="nav-item">
                        <a data-toggle="pill" href="#nav-tab-transport" class="nav-link active rounded-pill">
                            <i class="fa fa-car"></i>
                            Transportation Mode
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="pill" href="#nav-tab-energy" class="nav-link rounded-pill">
                            <i class="fa fa-leaf"></i>
                            Energy Usage
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="pill" href="#nav-tab-meal" class="nav-link rounded-pill">
                            <i class="fa fa-drumstick-bite"></i>
                            Meal
                        </a>
                    </li>
                </ul>
                <!-- End -->


                <!-- Credit card form content -->
                <div class="tab-content">

                <!-- credit card info-->
                <div id="nav-tab-transport" class="tab-pane fade show active">
                    <form role="form">
                        <div class="form-group d-flex justify-content-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="transport" id="radio1" checked>
                                <label class="form-check-label mr-3" for="radio1" href="#nav-tab-private">Private Transport</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="transport" id="radio2">
                                <label class="form-check-label" for="radio2" href="#nav-tab-public">Public Transport</label>
                            </div>
                        </div>
                    </form>
                        <div id="nav-tab-private">
                            <form id="carForm" method="GET" action="activityLogController.php">
                            <div class="car-content border-top mt-5">
                                <h2 class="text-center fw-bold mt-3 mb-4"><i class="fas fa-car mr-2"></i>Car Transport</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="carType">Type</label>
                                            <select class="form-select" aria-label="Default select example" name="carType">
                                                <option value="sm">Small Car</option>
                                                <option value="md">Medium Car</option>
                                                <option value="lg">Large Car</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="carFuel">Fuel</label>
                                            <select class="form-select" aria-label="Default select example" name="carFuel" id="carFuel">
                                                <option value="petrol">Petrol</option>
                                                <option value="diesel">Diesel</option>
                                                <option value="hybrid">Hybrid</option>
                                                <option value="electric">Electric</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="carDistance">Distance</label>
                                    <input type="number" name="carDistance" placeholder="Distance (km)" class="form-control">
                                </div>
                                <div class="form-group form-group-electric" style="display: none;">
                                    <label for="carTimeRenew">Time charged using renewable</label>
                                    <input type="number" name="carTimeRenew"  class="form-control">
                                </div>
                            </div>
                            <div class="motor-content border-top mt-5">
                                <h2 class="text-center fw-bold mt-3 mb-4"><i class="fas fa-motorcycle mr-2"></i>MOTORCYCLE</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="motorType">Type</label>
                                            <select class="form-select" aria-label="Default select example" name="motorType">
                                                <option value="ave">Avergae Motor</option>    
                                                <option value="sm">Small Motor</option>
                                                <option value="md">Medium Motor</option>
                                                <option value="lg">Large Motor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="motorDistance">Distance</label>
                                            <input type="number" name="motorDistance" placeholder="Distance (km)" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="subscribe btn btn-primary mt-5 btn-block rounded-pill shadow-sm" name="privateTransForm">Confirm</button>
                            </form>
                        </div>
                        <div id="nav-tab-public">
                            <form method="GET" action="activityLogController.php">
                            <div class="bus-content border-top mt-5">
                                <h2 class="text-center fw-bold mt-3 mb-4"><i class="fas fa-bus mr-2"></i>Bus/Coach</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="motorType">Type</label>
                                            <select class="form-select" aria-label="Default select example" name="busType">
                                                <option value="ave">Avergae Local Bus</option>    
                                                <option value="coach">Coach</option>
                                                <option value="double">Double-Decker</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="busDistance">Distance</label>
                                            <input type="number" name="busDistance"  class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="train-content border-top mt-5">
                                <h2 class="text-center fw-bold mt-3 mb-4"><i class="fas fa-train mr-2"></i>Train</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="trainType">Type</label>
                                            <select class="form-select" aria-label="Default select example" name="trainType">
                                                <option value="national">National rail</option>    
                                                <option value="light">Light rail and tram</option>
                                                <option value="international">International rail</option>
                                                <option value="underground">Underrground</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="trainDistance">Distance</label>
                                            <input type="number" name="trainDistance" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Ferry-content border-top mt-5">
                                <h2 class="text-center fw-bold mt-3 mb-4"><i class="fas fa-ferry mr-2"></i>Ferry</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ferryType">Type</label>
                                            <select class="form-select" aria-label="Default select example" name="ferryType">
                                                <option value="foot">Foot Passenger</option>    
                                                <option value="car">Car Passenger</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ferryDistance">Distance</label>
                                            <input type="number" name="ferryDistance" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="subscribe btn btn-primary mt-5 btn-block rounded-pill shadow-sm" name="publicTransForm">Confirm</button>
                        </div>
                        
                    </form>
                </div>

                <!-- End -->


                <div id="nav-tab-energy" class="tab-pane fade">
                    <p style="background-color: lightblue; padding: 5px; border-radius: 10px;"><em>Quick Tip:</em><lead> If you get any of your home energy from renewables, you can enter the amount in the relevant "Renewables ... %" field, and your footprint will be calculated in proportion to the amount of renewables in the mix.</lead></p>
                    <form method="GET" action="activityLogController.php">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <label for="electricity">Electricity </label>
                                    <input type="number" name="electricity"  placeholder="kWh" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check">
                                    <label for="renewable">Renewables</label>
                                    <input type="number" name="renewable" placeholder="%"  class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="subscribe btn btn-primary mt-5 btn-block rounded-pill shadow-sm" name="energyForm">Confirm</button>    
                    </form>
                </div>


       
                <div id="nav-tab-meal" class="tab-pane fade">
                    <div class="container">
                        <form action="activityLogController.php"  method="GET" id="mealForm">
                            <div class="row">
                                <div class="col-12">
                                    <div class="col-12 text-center">
                                        <h3 class="mb-4">How many days a week, on average, are you or your household...</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <span class="bi bi-steak"></span> High meat-eater
                                    <select class="form-select counted" name="hiMeat" id="hi-meat" size="1" >
                                        <option value="0" selected="selected">0</option>
                                        <option value="1">1 day</option>
                                        <option value="2">2 days</option>
                                        <option value="3">3 days</option>
                                        <option value="4">4 days</option>
                                        <option value="5">5 days</option>
                                        <option value="6">6 days</option>
                                        <option value="7">7 days</option>
                                    </select>            
                                </div>

                                <div class="col-md-4">
                                    <span class="bi bi-cheeseburger"></span> Medium meat-eater                
                                    <select class="form-select counted" name="medMeat" id="md-meat" size="1" >
                                        <option value="0" selected="selected">0</option>
                                        <option value="1">1 day</option>
                                        <option value="2">2 days</option>
                                        <option value="3">3 days</option>
                                        <option value="4">4 days</option>
                                        <option value="5">5 days</option>
                                        <option value="6">6 days</option>
                                        <option value="7">7 days</option>
                                    </select>            
                                </div>
                                    <div class="col-md-4">
                                        <span class="bi bi-sausage"></span> Low meat-eater                
                                        <select class="form-select counted" name="lowMeat" id="lo-meat" size="1">
                                            <option value="0" selected="selected">0</option>
                                            <option value="1">1 day</option>
                                            <option value="2">2 days</option>
                                            <option value="3">3 days</option>
                                            <option value="4">4 days</option>
                                            <option value="5">5 days</option>
                                            <option value="6">6 days</option>
                                            <option value="7">7 days</option>
                                        </select>            
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <span class="bi bi-fish"></span> Fish eater                
                                        <select class="form-select counted" name="fish" id="fish" size="1">
                                            <option value="0" selected="selected">0</option>
                                            <option value="1">1 day</option>
                                            <option value="2">2 days</option>
                                            <option value="3">3 days</option>
                                            <option value="4">4 days</option>
                                            <option value="5">5 days</option>
                                            <option value="6">6 days</option>
                                            <option value="7">7 days</option>
                                        </select>            
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <span class="bi bi-cheese"></span> Vegetarian                
                                        <select class="form-select counted" name="vegetarian" id="vegetarian" size="1">
                                            <option value="0" selected="selected">0</option>
                                            <option value="1">1 day</option>
                                            <option value="2">2 days</option>
                                            <option value="3">3 days</option>
                                            <option value="4">4 days</option>
                                            <option value="5">5 days</option>
                                            <option value="6">6 days</option>
                                            <option value="7">7 days</option>
                                        </select>            
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <span class="bi bi-egg"></span> Vegan                
                                        <select class="form-select counted" name="vegan" id="vegan" size="1">
                                            <option value="0" selected="selected">0</option>
                                            <option value="1">1 day</option>
                                            <option value="2">2 days</option>
                                            <option value="3">3 days</option>
                                            <option value="4">4 days</option>
                                            <option value="5">5 days</option>
                                            <option value="6">6 days</option>
                                            <option value="7">7 days</option>
                                        </select>            
                                    </div>
                                </div>
                            
                                <div class="form-row mt-2">
                                    <div class="col-md-6">
                                        <span class="label">For how many people?</span>
                                        <select class="form-select" name="people" id="people" size="1" >
                                            <option value="1" selected="selected">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>            
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <span class="label">For how long?</span>
                                        <select class="form-select" id="period" name="period">
                                            <option value="1_d">1 day</option>
                                            <option value="1_w">1 week</option>
                                            <option value="2_w">2 weeks</option>
                                            <option value="3_w">3 weeks</option>
                                            <option value="1_m">1 month</option>
                                            <option value="2_m">2 months</option>
                                            <option value="3_m">3 months</option>
                                            <option value="4_m">4 months</option>
                                            <option value="5_m">5 months</option>
                                            <option value="6_m">6 months</option>
                                            <option value="7_m">7 months</option>
                                            <option value="8_m">8 months</option>
                                            <option value="9_m">9 months</option>
                                            <option value="10_m">10 months</option>
                                            <option value="11_m">11 months</option>
                                            <option value="1_y" selected>1 year</option>
                                        </select>            
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mt-2">
                                            <h3>Total days:
                                                <span id="total-warning"></span> <span id="total-days"></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="subscribe" class="subscribe btn btn-primary mt-5 btn-block rounded-pill shadow-sm" name = "mealForm">Confirm</button>
                            </form>
                        </div>
                    </div>
                <!-- End -->
                </div>
                <!-- End -->

            </div>
            </div>
        </div>
        </div>

        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        
        <script>

            $(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            $(document).ready(function() {
                // Hide the public transport tab initially
                $('#nav-tab-public').hide();

                // When the user clicks on the public transport radio button
                $('#radio2').click(function() {
                    // Show the public transport tab
                    $('#nav-tab-public').show();
                    // Hide the private transport tab
                    $('#nav-tab-private').hide();
                    $('#nav-tab-private input[type="text"]').val(''); // Reset text inputs
                    $('#nav-tab-private select').val('0'); // Reset select inputs to default value
                });

            // When the user clicks on the private transport radio button
            $('#radio1').click(function() {
                // Show the private transport tab
                $('#nav-tab-private').show();
                // Hide the public transport tab
                $('#nav-tab-public').hide();
                $('#nav-tab-public input[type="text"]').val(''); // Reset text inputs
                $('#nav-tab-public select').val('0'); // Reset select inputs to default value
            });

            //car function
            $('#carFuel').on('change', function() {
                if ($(this).val() == 'electric') {
                    $('.form-group-electric').show();
                } else {
                    $('.form-group-electric').hide();
                }
            });

            $('#carForm').on('load', function() {
                if ($('#carFuel').val() == 'electric') {
                    $('.form-group-electric').show();
                } else {
                    $('.form-group-electric').hide();
                }
            });

            // Meal function
            function calculateTotalDays() {
                var totalDays = 0;
                // Iterate through each select element and add its value to totalDays
                $('.counted').each(function() {
                    totalDays += parseInt($(this).val());
                });
                // Update the total days display
                $('#total-days').text(totalDays);
                // Check if total days is 7
                if (totalDays === 7) {
                    // Enable the form submission
                    $('#subscribe').prop('disabled', false);
                    $('#total-days').text(totalDays).css('color', 'green');
                } else {
                    // Disable the form submission
                    $('#total-days').text(totalDays).css('color', 'red');
                    $('#subscribe').prop('disabled', true);
                }
            }

            // Call the calculateTotalDays function initially
            calculateTotalDays();

            // Bind change event to selects
            $('.counted').on('change', function() {
                calculateTotalDays(); // Recalculate total days when any select changes
            });

            // Bind focus event to form
            $('#mealForm').on('focus', function() {
                calculateTotalDays(); // Recalculate total days when the form gets focus
            });

       
        });
</script>


</body>
