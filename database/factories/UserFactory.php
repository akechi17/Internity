<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $skills = ['HTML', 'CSS', 'JavaScript', 'BootStrap', 'Laravel', 'ReactJs', 'VueJs', 'AngularJs', 'NodeJs', 'PHP', 'Python', 'Java', 'C++', 'C#', 'C', 'Ruby', 'Swift', 'Kotlin', 'Go', 'Rust', 'Dart', 'SQL', 'NoSQL', 'MongoDB', 'MySQL', 'PostgreSQL', 'Oracle', 'SQLite', 'Firebase', 'AWS', 'Azure', 'GCP', 'Docker', 'Kubernetes', 'Git', 'GitHub', 'GitLab', 'BitBucket', 'Jira', 'Confluence', 'Trello', 'Slack', 'Discord', 'Zoom', 'Google Meet', 'Microsoft Teams', 'Skype', 'WebRTC', 'WebSockets', 'REST', 'GraphQL', 'JSON', 'XML', 'YAML', 'CSV', 'Excel', 'Word', 'PowerPoint', 'Photoshop', 'Illustrator', 'InDesign', 'Premiere Pro', 'After Effects', 'Lightroom', 'Audition', 'Figma', 'Adobe XD', 'Sketch', 'InVision', 'Zeplin', 'Marvel', 'Miro', 'Notion', 'Trello', 'Asana', 'Jira', 'Confluence', 'Slack', 'Discord', 'Zoom', 'Google Meet', 'Microsoft Teams', 'Skype', 'WebRTC', 'WebSockets', 'REST', 'GraphQL', 'JSON', 'XML', 'YAML', 'CSV', 'Excel', 'Word', 'PowerPoint', 'Photoshop', 'Illustrator', 'InDesign', 'Premiere Pro', 'After Effects', 'Lightroom', 'Audition', 'Figma', 'Adobe XD', 'Sketch', 'InVision', 'Zeplin', 'Marvel', 'Miro', 'Notion', 'Trello', 'Asana', 'Jira', 'Confluence', 'Slack', 'Discord', 'Zoom', 'Google Meet', 'Microsoft Teams', 'Skype', 'WebRTC', 'WebSockets', 'REST', 'GraphQL', 'JSON', 'XML', 'YAML', 'CSV', 'Excel', 'Word', 'PowerPoint', 'Photoshop', 'Illustrator', 'InDesign', 'Premiere Pro', 'After Effects', 'Lightroom', 'Audition', 'Figma', 'Adobe XD', 'Sketch'];
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('123qweasd'), // password
            'remember_token' => str()->random(10),
            'avatar' => fake()->imageUrl(640, 480, 'people'),
            'bio' => fake()->text(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'date_of_birth' => fake()->dateTimeBetween('-18 years', '-16 years')->format('Y-m-d'),
            'status' => 1,
            'skills' => implode(',', fake()->randomElements($skills, fake()->numberBetween(2, 5))),
            'password_by_admin' => 1,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
