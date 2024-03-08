<?php
    require_once 'classes/activity.php';
    require_once 'classes/transportation.php';
    require_once 'classes/meal.php';
    require_once 'classes/energy.php';
    require_once 'user.php';
    
    session_start();
    

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if (isset($_GET['privateTransForm'])) {
           // Assign $_GET variables to corresponding variables, or set them to null if not set
            $carType = $_GET['carType'] ?? 'null';
            $carFuel = $_GET['carFuel'] ?? 'null';
            $carDistance = $_GET['carDistance'] ?? 'null';
            $carTimeRenew = $_GET['carTimeRenew'] ?? 'null';
            $motorType = $_GET['motorType'] ?? 'null';
            $motorDistance = $_GET['motorDistance'] ?? 'null';

            // Create a new PrivateTransport object
            $privateTransport = new PrivateTransport($_SESSION['user'], $carType, $carFuel, $carDistance, $carTimeRenew, $motorType, $motorDistance);
            $privateTransport->calculateEmission();
            $privateTransport->callSaveActivity($privateTransport);
            echo "<script>alert('Successfully saved');</script>";
            echo "<script>window.location.href = 'activityLogForm.php';</script>";

        }
    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if (isset($_GET['publicTransForm'])) {
            // Assign $_GET variables to corresponding variables, or set them to null if not set
            $busType = $_GET['busType'] ?? 'null';
            $busDistance = $_GET['busDistance'] ?? 'null';
            $ferryType = $_GET['ferryType'] ?? 'null';
            $ferryDistance = $_GET['ferryDistance'] ?? 'null';

            // Create a new PublicTransport object
            $publicTransport = new PublicTransport($_SESSION['user'], $busType, $busDistance, $ferryType, $ferryDistance);
            $publicTransport->calculateEmission();
            $publicTransport->callSaveActivity($publicTransport);
            echo "<script>alert('Successfully saved');</script>";
            echo "<script>window.location.href = 'activityLogForm.php';</script>";
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if (isset($_GET['mealForm'])) {
            // Assign $_GET variables to corresponding variables, or set them to null if not set
            $hiMeat = $_GET['hiMeat'] ?? null;
            $medMeat = $_GET['medMeat'] ?? null;
            $lowMeat = $_GET['lowMeat'] ?? null;
            $fish = $_GET['fish'] ?? null;
            $vegetarian = $_GET['vegetarian'] ?? null;
            $vegan = $_GET['vegan'] ?? null;
            $people = $_GET['people'] ?? null;
            $period = $_GET['period'] ?? null;

            // Create a new Meal object
            $meal = new Meal($_SESSION['user'], $hiMeat, $medMeat, $lowMeat, $fish, $vegetarian, $vegan, $people, $period);
            $meal->calculateEmission();
            $meal->callSaveActivity($meal);
            echo "<script>alert('Successfully saved');</script>";
            echo "<script>window.location.href = 'activityLogForm.php';</script>";
        }
    }

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if (isset($_GET['energyForm'])) {
            // Assign $_GET variables to corresponding variables, or set them to null if not set
            $electricty = $_GET['electricity'] ?? null;
            $renewable = $_GET['renewable'] ?? null;

            // Create a new Energy object
            $energy = new Energy($_SESSION['user'], $electricty, $renewable);
            $energy->calculateEmission();
            $energy->callSaveActivity($energy);
            echo "<script>alert('Successfully saved');</script>";
            echo "<script>window.location.href = 'activityLogForm.php';</script>";
        }
    }


?>