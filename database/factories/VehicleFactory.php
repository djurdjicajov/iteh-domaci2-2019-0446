<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\ManufacturerFactory;
use Database\Factories\TypeFactory;
use App\Models\Manufacturer;
use App\Models\Type;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model_name'=> fake()->word(),
        'description'=> fake()->sentence(),
        'color'=> fake()->safeColorName(),
        'price'=> $this->faker->randomFloat(2,10,40),
        'manufacturer_id'=> Manufacturer::factory(),
        'type_id'=> Type::factory()
           
        
        ];
    }
}
