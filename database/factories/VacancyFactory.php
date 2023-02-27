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
        $skills = ['HTML', 'CSS', 'JavaScript', 'BootStrap', 'Laravel', 'ReactJs', 'VueJs', 'AngularJs', 'NodeJs', 'PHP', 'Python', 'Java', 'C++', 'C#', 'C', 'Ruby', 'Swift', 'Kotlin', 'Go', 'Rust', 'Dart', 'SQL', 'NoSQL', 'MongoDB', 'MySQL', 'PostgreSQL', 'Oracle', 'SQLite', 'Firebase', 'AWS', 'Azure', 'GCP', 'Docker', 'Kubernetes', 'Git', 'GitHub', 'GitLab', 'BitBucket', 'Jira', 'Confluence', 'Trello', 'Slack', 'Discord', 'Zoom', 'Google Meet', 'Microsoft Teams', 'Skype', 'WebRTC', 'WebSockets', 'REST', 'GraphQL', 'JSON', 'XML', 'YAML', 'CSV', 'Excel', 'Word', 'PowerPoint', 'Photoshop', 'Illustrator', 'InDesign', 'Premiere Pro', 'After Effects', 'Lightroom', 'Audition', 'Figma', 'Adobe XD', 'Sketch', 'InVision', 'Zeplin', 'Marvel', 'Miro', 'Notion', 'Trello', 'Asana', 'Jira', 'Confluence', 'Slack', 'Discord', 'Zoom', 'Google Meet', 'Microsoft Teams', 'Skype', 'WebRTC', 'WebSockets', 'REST', 'GraphQL', 'JSON', 'XML', 'YAML', 'CSV', 'Excel', 'Word', 'PowerPoint', 'Photoshop', 'Illustrator', 'InDesign', 'Premiere Pro', 'After Effects', 'Lightroom', 'Audition', 'Figma', 'Adobe XD', 'Sketch', 'InVision', 'Zeplin', 'Marvel', 'Miro', 'Notion', 'Trello', 'Asana', 'Jira', 'Confluence', 'Slack', 'Discord', 'Zoom', 'Google Meet', 'Microsoft Teams', 'Skype', 'WebRTC', 'WebSockets', 'REST', 'GraphQL', 'JSON', 'XML', 'YAML', 'CSV', 'Excel', 'Word', 'PowerPoint', 'Photoshop', 'Illustrator', 'InDesign', 'Premiere Pro', 'After Effects', 'Lightroom', 'Audition', 'Figma', 'Adobe XD', 'Sketch'];

        return [
            'name' => fake()->jobTitle(),
            'category' => fake()->randomElement(['IT', 'Marketing', 'Finance', 'Human Resources', 'Automotive', 'Construction', 'Education', 'Engineering', 'Healthcare', 'Hospitality', 'Manufacturing', 'Media', 'Retail', 'Technology', 'Telecommunications', 'Transportation']),
            'description' => fake()->paragraph(),
            'slots' => fake()->numberBetween(1, 5),
            'status' => 1,
            'skills' => implode(', ', fake()->randomElements($skills, fake()->numberBetween(3, 6))),
        ];
    }
}
