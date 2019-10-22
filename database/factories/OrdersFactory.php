<?php

use Faker\Generator as Faker;

$factory->define(App\MotoOrder::class, function (Faker $faker) {
    return [
        'engineCapacity' => $faker->randomFloat(1, 1, 5),                                             
        'enginePower' => $faker->numberBetween(45, 500),                                                
        'manufactorYear' => $faker->numberBetween(1970, 2018),                    
        'manufactorMonth' => $faker->numberBetween(1, 12),                   
        'Price' => $faker->numberBetween(100, 10000),                             
        'exportPrice' => $faker->numberBetween(100, 10000),                       
        'distanceTraveled' => $faker->numberBetween(0, 1000000),                  
        'Weight' => $faker->numberBetween(1000, 3500),                                                     
        'Euro' => $faker->numberBetween(2, 6),                              
        'Description' => $faker->sentence(30),             
        'coolingType' => $faker->numberBetween(1, 4),                    
        'fuelType' => $faker->numberBetween(1, 2),                       
        'Gearbox' => $faker->numberBetween(1, 2),                        
        'engineType' => $faker->numberBetween(1, 3),   
        'fk_Userid' => $faker->numberBetween(1, 4),
        'fk_MotoTypeid_MotoType' => $faker->numberBetween(1, 4),                       
        'fk_Colorid_Color' => $faker->numberBetween(1, 5),                              
        'fk_ContactInfoid_ContactInfo' => $faker->numberBetween(2, 5),                     
        'fk_Modelid_Model' => $faker->numberBetween(1, 25),  
        'fk_Defectid_Defect' => $faker->numberBetween(1, 100)
    ];
});
