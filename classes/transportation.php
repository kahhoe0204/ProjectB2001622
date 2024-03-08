<?php

    require_once 'Activity.php';


class PrivateTransport extends Activity {
    private $carType;
    private $carFuel;
    private $carDistance;
    private $carTimeRenew;
    private $motorType;
    private $motorDistance;

    public function __construct(User $user, $carType, $carFuel, $carDistance, $carTimeRenew, $motorType, $motorDistance) {
        parent::__construct($user, "Private Transport");
        $this->carType = $carType;
        $this->carFuel = $carFuel;
        $this->carDistance = $carDistance;
        $this->carTimeRenew = $carTimeRenew;
        $this->motorType = $motorType;
        $this->motorDistance = $motorDistance;
    }

    public function calculateEmission() {
        $totalEmission = 0;

        // Calculate emissions for car
        $carEmission = $this->calculateCarEmission();
        
        // Calculate emissions for motorbike
        $motorEmission = $this->calculateMotorbikeEmission();
        
        // Total emissions for private transport
        $totalEmission = ($carEmission + $motorEmission)/1000;
        
        // Set the total emission value
        $this->setTotalEmission($totalEmission);
    }

    private function calculateCarEmission() {
        // Define emission factors for different car types and fuel types
        $emissionFactors = [
            'sm' => [
                'petrol' => 0.2,    
                'diesel' => 0.25,
                'hybrid' => 0.1,
                'electric' => 0.05, 
            ],
            'md' => [
                'petrol' => 0.25,   
                'diesel' => 0.3,    
                'hybrid' => 0.15,
                'electric' => 0.1,
            ],
            'lg' => [
                'petrol' => 0.3,    
                'diesel' => 0.35,   
                'hybrid' => 0.2,
                'electric' => 0.15,
            ]
        ];
        
        // Get the emission factor based on car type and fuel type
        $carType = $this->carType;
        $carFuel = $this->carFuel;
        $carTimeRenew = (int)$this->carTimeRenew;
        $carDistance = (int)$this->carDistance; 
        
        if ($carFuel === 'electric') {
            // Define charging time thresholds and corresponding emission adjustments
            $chargingTimeThresholds = [
                0 => 0,    // Less than 1 hour charging time
                1 => 0.02, // 1-2 hours charging time
                2 => 0.05, // More than 2 hours charging time
            ];
    
            // Determine the emission adjustment based on charging time
            $emissionAdjustment = 0; // Default adjustment
            foreach ($chargingTimeThresholds as $threshold => $adjustment) {
                if ($carTimeRenew > $threshold) {
                    $emissionAdjustment = $adjustment;
                }
            }
            
            // Apply emission adjustment to the base emission factor
            $carEmissionFactor = $emissionFactors[$carType][$carFuel] + $emissionAdjustment;
        } else {
            $carEmissionFactor = $emissionFactors[$carType][$carFuel];
        }
        
        // Calculate emissions for car
        $carEmission = $carDistance * $carEmissionFactor;
        return $carEmission;
    }

    private function calculateMotorbikeEmission() {
        // Define emission factors for different motorbike types
        $emissionFactors = [
            'ave' => 0.1,
            'sm' => 0.2,
            'md' => 0.25,
            'lg' => 0.3,
        ];
        
        // Get the emission factor based on motorbike type
        $motorType = $this->motorType;
        $motorDistance = (int)$this->motorDistance;
        
        // Calculate emissions for motorbike
        $motorEmission = $motorDistance * $emissionFactors[$motorType];
        return $motorEmission;
    }
}

class PublicTransport extends Activity {
    private $busType;
    private $busDistance;
    private $ferryType;
    private $ferryDistance;

    public function __construct(User $user, $busType, $busDistance, $ferryType, $ferryDistance) {
        parent::__construct($user, "Public Transport");
        $this->busType = $busType;
        $this->busDistance = $busDistance;
        $this->ferryType = $ferryType;
        $this->ferryDistance = $ferryDistance;
    }

    public function calculateEmission() {
        // Calculate emissions for buses
        $busEmission = $this->calculateBusEmission();
        
        // Calculate emissions for ferries
        $ferryEmission = $this->calculateFerryEmission();
        
        // Total emissions for public transport
        $totalEmission = ($busEmission + $ferryEmission)/1000;
        
        // Set the total emission value
        $this->setTotalEmission($totalEmission);
    }
    
    private function calculateBusEmission() {
        // Example: Define emission factors for different bus types
        $busEmissionFactors = [
            'ave' => 0.1,
            'coach' => 0.15,
            'double' => 0.2,   
        ];

        // Get the emission factor based on bus type
        $busType = $this->busType;
        
        $busEmissionFactor = $busEmissionFactors[$busType];

        // Calculate emissions for buses
        $busDistance = (int)$this->busDistance; 
        $busEmission = $busDistance * $busEmissionFactor;
        return $busEmission;
    }
    
    private function calculateFerryEmission() {
        // Example: Define emission factors for different ferry types
        $ferryEmissionFactors = [
            'foot' => 0.1,   
            'car' => 0.2,  
        ];

        // Get the emission factor based on ferry type
        $ferryType = $this->ferryType;
        
        $ferryEmissionFactor = $ferryEmissionFactors[$ferryType];

        // Calculate emissions for ferries
        $ferryDistance = (int)$this->ferryDistance; 
        $ferryEmission = $ferryDistance * $ferryEmissionFactor;
        return $ferryEmission;
    }
}

