<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Type;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Manufacturer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {


        User::truncate();
        Manufacturer::truncate();
        Type::truncate();
        Vehicle::truncate();

        User::factory(10)->create();

        Manufacturer::insert([
            [
                "name" => "BMW",
                "city" => "Minhen",
                "CEO" => "Harald Kruger"
            ],
            [
                "name" => "Toyota",
                "city" => "Tokyo",
                "CEO" => "Akio Tojoda"
            ]
        ]);

        Type::insert([
            [
                "name" => "Car",
                
            ],
            [
                "name" => "Van",
                
            ]
        ]);


        $vehicle_1 = new Vehicle;
        $vehicle_1->model_name = "x1";
        $vehicle_1->color = "Black";
        $vehicle_1->description = "Classic car for trip";
        $vehicle_1->price = "86421";
        $vehicle_1->manufacturer_id = 1;
        $vehicle_1->type_id = 1;
        $vehicle_1->save();

        Vehicle::create([
            "model_name" => "HiAce",
            "color" => "Red",
            "description" => "Van perfect for you",
            "price" => "50084",
            "manufacturer_id" => 2,
            "type_id" => 2
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
