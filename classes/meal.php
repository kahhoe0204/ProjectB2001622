<?php
    require_once 'Activity.php';

    class Meal extends Activity{
        private $hiMeat;
        private $medMeat;
        private $lowMeat;
        private $fish;
        private $vegetarian;
        private $vegan;
        private $people;
        private $period;

        public function __construct(User $user,  $hiMeat, $medMeat, $lowMeat, $fish, $vegetarian, $vegan, $people, $period){
            parent::__construct($user, "Meal"); // Call parent constructor
            $this->hiMeat = $hiMeat;
            $this->medMeat = $medMeat;
            $this->lowMeat = $lowMeat;
            $this->fish = $fish;
            $this->vegetarian = $vegetarian;
            $this->vegan = $vegan;
            $this->people = $people;
            $this->period = $period;
        }

        public function calculateEmission() {
            // Define emission factors for different dietary preferences
            $emissionFactors = [
                'hiMeat' => 1.4,   // Emission factor for high meat-eater
                'medMeat' => 1.05,  // Emission factor for medium meat-eater
                'lowMeat' => 0.8,   // Emission factor for low meat-eater
                'fish' => 0.5,     // Emission factor for fish eater
                'vegetarian' => 0.47,  // Emission factor for vegetarian
                'vegan' => 0.38,    // Emission factor for vegan
            ];

            $hiMeat = (int)$this->hiMeat;
            $medMeat = (int)$this->medMeat;
            $lowMeat = (int)$this->lowMeat;
            $fish = (int)$this->fish;
            $vegetarian = (int)$this->vegetarian;
            $vegan = (int)$this->vegan;
            $people = (int)$this->people;
    
            // Calculate total emissions based on dietary preferences
            $totalEmission = 0;
            $totalEmission += $this->hiMeat * $emissionFactors['hiMeat'];
            $totalEmission += $this->medMeat * $emissionFactors['medMeat'];
            $totalEmission += $this->lowMeat * $emissionFactors['lowMeat'];
            $totalEmission += $this->fish * $emissionFactors['fish'];
            $totalEmission += $this->vegetarian * $emissionFactors['vegetarian'];
            $totalEmission += $this->vegan * $emissionFactors['vegan'];
    
            // Adjust emissions based on number of people and period
            $totalEmission *= $this->people;
            $totalEmission *= ($this->getPeriodConversionFactor($this->period))/1000;
    
            // Set the total emission value
            $this->setTotalEmission($totalEmission);
        }
    
        // Method to convert period into days
        private function getPeriodConversionFactor($period) {
            // Define conversion factors for different periods
            $periodConversion = [
                "1_d" => 1,
                "1_w" => 7,
                "2_w" => 14,
                "3_w" => 21,
                "1_m" => 30,
                "2_m" => 60,
                "3_m" => 90,
                "4_m" => 120,
                "5_m" => 150,
                "6_m" => 180,
                "7_m" => 210,
                "8_m" => 240,
                "9_m" => 270,
                "10_m" => 300,
                "11_m" => 330,
                "1_y" => 365
            ];
    
            // Return conversion factor based on selected period
            return $periodConversion[$period];
        }
    }
?>