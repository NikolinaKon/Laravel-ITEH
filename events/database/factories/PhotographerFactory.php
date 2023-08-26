<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\photographer>
 */
class PhotographerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $regex2 = '[1-6]';
        return [
            'first_name' => fake()->firstName(),
            'last_name' =>fake()->lastName(),
            'email'=>$this->faker->word(),
            'price_per_hour'=>"1500" ,
            'equipment'=>$this->faker->word(),
        ];
    }
}
