<?php
    require_once "connection.php";

    

    class User{
        private $userID;
        private $name;
        private $email;
        private $password;
        private $contactNum;
        private $energySource;
        private $dietaryPref;
        private $commutingMethod;
        private $isPrivacy;
        private $reminder;

        public function __construct($userID,$name, $email, $password, $contactNum, $energySource, $dietaryPref, $commutingMethod, $isPrivacy, $reminder){
            $this->userID = $userID;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->contactNum = $contactNum;
            $this->energySource = $energySource;
            $this->dietaryPref = $dietaryPref;
            $this->commutingMethod = $commutingMethod;
            $this->isPrivacy = $isPrivacy;
            $this->reminder = $reminder;
        }

        public function getUserID(){
            return $this->userID;
        }
        

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            updateTable("userName", $name, "s");
            $this->name = $name;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            updateTable("email", $email, "s");
            $this->email = $email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            updateTable("userPass", $password, "s");
            $this->password = $password;
        }

        public function getContactNum(){
            return $this->contactNum;
        }

        public function setContactNum($contactNum){
            updateTable("contactNumber", $contactNum, "s");
            $this->contactNum = $contactNum;
        }

        public function getEnergySource(){
            return $this->energySource;
        }

        public function setEnergySource($energySource){
            updateTable("energy", $energySource, "s");
            $this->energySource = $energySource;
        }

        public function getDietaryPref(){
            return $this->dietaryPref;
        }

        public function setDietaryPref($dietaryPref){
            updateTable("dietaryPreference", $dietaryPref, "s");
            $this->dietaryPref = $dietaryPref;
        }

        public function getCommutingMethod(){
            return $this->commutingMethod;
        }

        public function setCommutingMethod($commutingMethod){
            updateTable("commutingMethod", $commutingMethod, "s");
            $this->commutingMethod = $commutingMethod;
        }

        public function getIsPrivacy(){
            return $this->isPrivacy;
        }

        public function setIsPrivacy($isPrivacy){
            updateTable("isPrivacy", $isPrivacy, "i");
            $this->isPrivacy = $isPrivacy;
        }

        public function getReminder(){
            return $this->reminder;
        }

        public function setReminder($reminder){
            updateTable("reminder", $reminder, "s");
            $this->reminder = $reminder;
        }

 

        
    }
        function updateTable($column, $value, $datatype) {
            global $conn;
            
            // Prepare the SQL statement
            $stmt = $conn->prepare("UPDATE usertb SET $column = ? WHERE email = ?");
            
            // Store email in a variable
            $email = $_SESSION['user']->getEmail();
        
            // Bind parameters
            $stmt->bind_param($datatype . "s", $value, $email);
            
            // Execute the statement
            $stmt->execute();
            
            // Close the statement
            $stmt->close();
        }

    
    
    
    


?>