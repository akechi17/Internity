<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->jobTitle(),
            'category' => fake()->randomElement(['IT', 'Marketing', 'Finance', 'Human Resources', 'Autmototive', 'Construction', 'Education', 'Engineering', 'Healthcare', 'Hospitality', 'Manufacturing', 'Media', 'Retail', 'Technology', 'Telecommunications', 'Transportation']),
            'description' => fake()->paragraph(),
            'slots' => fake()->numberBetween(1, 5),
            'status' => 1,
        ];
    }
}
