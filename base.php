<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

    $result = mysqli_query($con, "CREATE DATABASE IF NOT EXISTS userDB");
    
    if ($result) {
        $db = mysqli_select_db($con, "userDB");

        $usersql = "CREATE TABLE IF NOT EXISTS userTB 
        (
            userID INT AUTO_INCREMENT PRIMARY KEY,
            userName VARCHAR(254) NOT NULL,
            contactNumber INT NOT NULL,
            email VARCHAR(254) NOT NULL,
            userPass VARCHAR(254) NOT NULL,
            energy VARCHAR(254) NOT NULL,
            dietaryPreference VARCHAR(254) NOT NULL,
            commutingMethod VARCHAR(254) NOT NULL,
            isPrivacy BOOLEAN NOT NULL,
            reminder VARCHAR(254) NOT NULL
        )";


        $activitysql = "CREATE TABLE IF NOT EXISTS activityTB 
        (
            activityID INT AUTO_INCREMENT PRIMARY KEY,
            userID INT NOT NULL,
            activityType VARCHAR(254) NOT NULL,
            totalEmission DECIMAL(10,2) NULL,
            activityDate DATETIME NOT NULL,
            FOREIGN KEY (userID) REFERENCES userTB(userID)
        )";



        mysqli_query($con, $usersql);
        mysqli_query($con, $activitysql);


    }
    $con->close();
?>
