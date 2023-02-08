<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'model_name'=> fake()->name(),
        'description'=> fake()->sentence(),
        'color'=> fake()->safeColorName(),
        'price'=> $this->faker->randomFloat(2,10,40),
        'manufacturer_id'=> Manufacturer::factory(),
        'type_id'=> Type::factory()
           
        
        ];
    }
}
