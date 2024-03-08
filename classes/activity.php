<?php
    require_once "connection.php";

    class Activity{
        private $activityID;
        private $activityDateTime;
        private $activityType;
        private $totalEmission;
        private $user;
    
        public function __construct(User $user, $activityType){
            $this->activityDateTime = date("Y-m-d H:i:s");
            $this->activityType = $activityType;
            $this->user = $user;
        }
    
        public function getActivityID(){
            //to do list
        }

        public function getActivityDate(){
            return $this->activityDate;
        }

        public function getActivityTime(){
            return $this->activityTime;
        }

        public function getActivityType(){
            return $this->activityType;
        }

        public function setTotalEmission($totalEmission) {
            $this->totalEmission = $totalEmission;
        }


        public static function callSaveActivity(Activity $activity){
            global $conn;
            $userID = $activity->user->getUserID();
            $sql = "INSERT INTO activityTB (activityDate, activityType, totalEmission, userID) 
                    VALUES ( ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $activityID = $activity->getActivityID(); // Store activityID in a variable
                $stmt->bind_param("sssd", $activity->activityDateTime, $activity->activityType, $activity->totalEmission, $userID);
                $stmt->execute();
            } 
        }

    }
        
        
        
        

?>