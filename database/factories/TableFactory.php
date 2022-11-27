<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Thematic;

class TableFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'capacity' => fake()->randomDigit,
            'type' => fake()->city,
            'id_thematic' => Thematic::all()->random()->id   
            
        ];
    }
}