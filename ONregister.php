<?php
    include "connection.php";
    include "AllFunction.php";

    $regisName = $_POST['regName'];
    $regisEmail = $_POST['regEmail'];
    $regiscontact = $_POST['regiscontact'];
    $energySource = $_POST['energySource'];
    $dietraryPre = $_POST['dietraryPre'];
    $commutingMeth = $_POST['commutingMeth'];
    $isPrivacy = 1; // Define the variable to hold the value
    $reminder = "none"; // Define the variable to hold the value
    $password = randomPassword();


    // Check if email or username already exists
    $checkQuery = "SELECT * FROM userTB WHERE email = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $regisEmail);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Display JavaScript alert first
        echo "<script>alert('Email or username already exists. Please choose a different one.');</script>";
        
        // Close database connections
        $checkStmt->close();
        $conn->close();
    
        // Redirect after the alert
        echo "<script>window.location.href='onlineSource.html';</script>";
        exit(); // Ensure the script stops execution after the redirect
    } else {
        // Continue with the registration process
        $checkStmt->close();
    
        $stmt = $conn->prepare("INSERT INTO userTB (userName, email, contactNumber, energy, dietaryPreference, commutingMethod, userPass, isPrivacy, reminder) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssis", $regisName, $regisEmail, $regiscontact, $energySource, $dietraryPre, $commutingMeth, $password, $isPrivacy, $reminder);
        $stmt->execute();
    
        echo "<script>alert('Register Successfully!');</script>";
        sendMail($regisEmail,$regisName,$password);
     

        
        $stmt->close();
        $conn->close();
    
        // Redirect after successful registration
        echo "<script>window.location.href='onlineSource.html';</script>";
        exit(); // Ensure the script stops execution after the redirect
    }


    function sendMail($regisEmail,$regisName,$password){
        $to = $regisEmail;
        var_dump($to);
        $subject = "GreenTrace Registration";
        $message = "Thank you $regisName for registering with GreenTrace. Your password is: $password";
        $headers = "From:GreenTrace";
        $mailResult = mail($to, $subject, $message, $headers);
        if($mailResult){
            echo "<script>alert(' Your password has been sent to your email address.');</script>";
        } else {
            echo "<script>alert('Email failed to send');</script>";
        }



    }
    



   
   
?>
