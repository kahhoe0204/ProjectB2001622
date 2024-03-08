<?php

    require_once 'Activity.php';

   class Energy extends Activity{

        private $electricity;
        private $renewable;



    public function __construct(User $user, $electricity, $renewable){ 
            parent::__construct($user, "Energy Usage"); // Call parent constructor
            $this->electricity = $electricity;
            $this->renewable = $renewable;
   }

   public function calculateEmission() {
    $totalEmission = 0;
    $emissionFactor = 0.5;

    $electricity = (int)$this->electricity;
    $renewable = (int)$this->renewable;
    
    // Calculate emissions based on electricity usage and the percentage of renewable energy
    $nonRenewableUsage = $electricity * (1 - $renewable / 100);
    
    // Calculate emissions for non-renewable energy
    $totalEmission = ($nonRenewableUsage * $emissionFactor)/1000;

    // Set the total emission value
    $this->setTotalEmission($totalEmission);
}






}



?>