<?php

namespace Database\Factories;
use App\Models\Photographer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $regex = '[A-Z][0-5]{3}';
        return [
            'event_type'=>$this->faker->sentence(),
            'date'=>$this->faker->date(),
            'place'=>fake()->regexify(
                $regex
            ),
            'user_id'=>User::factory(),
            'photographer_id'=>Photographer::factory(),
            
        ];
    }
}
