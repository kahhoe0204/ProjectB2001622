<?php
    include "connection.php";
    require "user.php";

    session_start();


    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    $sql = "SELECT * FROM usertb WHERE email = '$loginEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $copass = $row['userPass'];

        if ($loginPassword === $copass) {
            echo "<script>alert('Login Successful');</script>";
            $user = new User($row['userID'],$row['userName'], $row['email'], $row['userPass'], $row['contactNum'], $row['energy'], $row['dietaryPreference'], $row['commutingMethod'], $row['isPrivacy'],$row['reminder']);
            $_SESSION['user'] = $user;
            
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Wrong Password');</script>";
            echo "<script>window.location.href = 'onlineSource.html';</script>";
        }
    } else {
        echo "<script>alert('Invalid Email');</script>";
        echo "<script>window.location.href = 'onlineSource.html';</script>";
    }
?>
