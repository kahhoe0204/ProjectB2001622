<?php
    include "user.php";


    
    function checkUser() {
        return isset($_SESSION['user']);
      }



  
      function loggedIn($name) {
        // Output the HTML for the dropdown menu
        echo '<li class="nav-item dropdown ms-3">';
        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >';
        echo htmlspecialchars($name); // Escaping HTML characters to prevent XSS attacks
        echo '</a>';
        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
        echo '<a class="dropdown-item" href="logout.php" onclick="signOut()" style="color: red;">Sign Out</a>'; 
        echo '</div>';
        echo '</li>';
      }

    function signOut() {
        // Output the HTML for the login button
        echo '<li class="nav-item ms-3" id="loginLi">';
        echo '<button type="button" id="loginButton" onclick="window.location.href = \'onlineSource.html\'" class="btn btn-primary btn-md" style="background-color: black; border: 0px; color: #067600;">Log In</button>';
        echo '</li>';
      }

    function loginButtonChecker($logged){
      if ($logged) {
        $userName = $_SESSION['user']->getName();
        loggedIn($userName);
      } else {
        signOut();
      }
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

?>