<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->company(),
            'category' => fake()->randomElement(['IT', 'Education', 'Health', 'Banking', 'Insurance', 'Telecommunication', 'Media', 'Transportation', 'Retail', 'Manufacturing', 'Energy', 'Real Estate', 'Construction', 'Entertainment', 'Automotive']),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'country' => fake()->country(),
            'address' => fake()->address(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'logo' => fake()->imageUrl(640, 480, 'business'),
        ];
    }
}
