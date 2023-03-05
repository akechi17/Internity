<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

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
        $skills = [
            'webdev' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Vue', 'React', 'Angular', 'Node', 'Express', 'MongoDB', 'MySQL', 'PostgreSQL', 'Redis', 'REST', 'Bootstrap', 'Python'],
            'appdev' => ['Java', 'Kotlin', 'Swift', 'Objective-C', 'Android', 'iOS', 'React Native', 'Flutter', 'Xamarin', 'Ionic', 'Cordova', 'PhoneGap', 'C#', 'C++', 'C', 'Go', 'Rust', 'Dart', 'Flutter'],
            'networking' => ['Mikrotik', 'Cisco', 'Juniper', 'Linux', 'Windows Server', 'VMWare'],
            'sysadmin' => ['Linux', 'Windows Server', 'VMWare', 'Docker', 'Kubernetes', 'AWS', 'Azure', 'Google Cloud', 'Digital Ocean', 'Vultr', 'Linode'],
            'graphicdesign' => ['Adobe Photoshop','Adobe Illustrator', 'Adobe After Effects', 'Corel Draw', 'Adobe Lightroom', 'Adobe Premiere Pro', 'Adobe InDesign', 'Adobe XD', 'Figma', 'Sketch', 'Blender', 'GIMP', 'Inkscape', 'Krita', 'Paint.NET', 'Pixlr', 'Affinity Designer', 'Affinity Photo'],
            'machinelearning' => ['Python', 'R', 'TensorFlow', 'Keras', 'PyTorch', 'Scikit-learn', 'NLTK', 'OpenCV', 'Pandas', 'NumPy', 'Matplotlib', 'SciPy', 'Scrapy', 'Jupyter Notebook', 'Amazon SageMaker', 'IBM Watson Studio'],
            'database' => ['MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite', 'MariaDB', 'Oracle Database', 'Cassandra', 'CouchDB', 'Firebase', 'SQL Server'],
        ];

        $jobTitle = [
            'webdev' => ['Web Developer', 'Full Stack Developer'],
            'appdev' => ['Android Developer', 'iOS Developer', 'Mobile Developer'],
            'networking' => ['Network Engineer', 'Network Administrator'],
            'sysadmin' => ['System Administrator', 'System Engineer'],
            'graphicdesign' => ['Graphic Designer', 'UI/UX Designer'],
            'machinelearning' => ['Machine Learning Engineer', 'Data Scientist'],
            'database' => ['Database Administrator', 'Database Engineer', 'Database Designer', 'Database Architect'],
        ];

        $selected = array_rand($skills);

        return [
            'name' => fake()->randomElement($jobTitle[$selected]),
            'category' => fake()->randomElement(['IT', 'Marketing', 'Finance', 'Human Resources', 'Automotive', 'Construction', 'Education', 'Engineering', 'Healthcare', 'Hospitality', 'Manufacturing', 'Media', 'Retail', 'Technology', 'Telecommunications', 'Transportation']),
            'description' => fake()->realText(),
            'slots' => fake()->numberBetween(2, 5),
            'status' => 1,
            'skills' => implode(', ', fake()->randomElements($skills[$selected], fake()->numberBetween(3, 5))),
        ];
    }
}
