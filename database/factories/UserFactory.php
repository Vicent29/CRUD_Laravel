<?php
 
namespace Database\Factories;
 
use Illuminate\Database\Eloquent\Factories\Factory;
 
class UserFactory extends Factory
{
   
   public function definition()
   {
       return [
           'is_active' => fake()->boolean(),
           'name' => fake()->name(),
           'passwd' => fake()->password(),
           'email' => fake()->email(),
           'type_user' => fake()-> randomElement(['client', 'admin'])
       ];
   }
}

