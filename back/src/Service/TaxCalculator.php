<?php

namespace App\Service;

class TaxCalculator
{
    public $calculator;

    public function calculate(float $basePrice, string $vehicleType): float
    {
        $basicFee = ($vehicleType === 'luxury') 
            ? max(25, min(200, $basePrice * 0.1)) 
            : max(10, min(50, $basePrice * 0.1));

        $specialFee = ($vehicleType === 'luxury') 
            ? $basePrice * 0.04 
            : $basePrice * 0.02;

        $associationFee = match (true) {
            $basePrice <= 500 => 5,
            $basePrice <= 1000 => 10,
            $basePrice <= 3000 => 15,
            default => 20,
        };

        $storageFee = 100;

        return $basePrice + $basicFee + $specialFee + $associationFee + $storageFee;
    }
}
