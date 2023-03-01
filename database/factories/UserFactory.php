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
        $skills = [
            'webdev' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Vue', 'React', 'Angular', 'Node', 'Express', 'MongoDB', 'MySQL', 'PostgreSQL', 'Redis', 'REST', 'Python'],
            'appdev' => ['Java', 'Kotlin', 'Swift', 'Objective-C', 'Android', 'iOS', 'React Native', 'Flutter', 'Xamarin', 'Ionic', 'Cordova', 'PhoneGap', 'C#', 'C++', 'C', 'Go', 'Rust', 'Dart', 'Flutter'],
            'networking' => ['Mikrotik', 'Cisco', 'Juniper', 'Linux', 'Windows Server', 'VMWare'],
            'sysadmin' => ['Linux', 'Windows Server', 'VMWare', 'Docker', 'Kubernetes', 'AWS', 'Azure', 'Google Cloud', 'Digital Ocean', 'Vultr', 'Linode'],
            'graphicdesign' => ['Adobe Photoshop','Adobe Illustrator', 'Adobe After Effects', 'Corel Draw', 'Adobe Lightroom', 'Adobe Premiere Pro', 'Adobe InDesign', 'Adobe XD', 'Figma', 'Sketch', 'Blender', 'GIMP', 'Inkscape', 'Krita', 'Paint.NET', 'Pixlr', 'Affinity Designer', 'Affinity Photo'],
            'machinelearning' => ['Python', 'R', 'TensorFlow', 'Keras', 'PyTorch', 'Scikit-learn', 'NLTK', 'OpenCV', 'Pandas', 'NumPy', 'Matplotlib', 'SciPy', 'Scrapy', 'Jupyter Notebook', 'Amazon SageMaker', 'IBM Watson Studio'],
            'database' => ['MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite', 'MariaDB', 'Oracle Database', 'Cassandra', 'CouchDB', 'Firebase', 'SQL Server'],
        ];
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
            'skills' => implode(', ', fake()->randomElements($skills[array_rand($skills)], fake()->numberBetween(3, 5))),

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
