<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journal>
 */
class JournalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'work_type' => $this->faker->randomElement(['frontend', 'backend', 'fullstack', 'mobile', 'design', 'devops', 'qa', 'pm', 'other']),
            'description' => $this->faker->paragraph,
        ];
    }
}
