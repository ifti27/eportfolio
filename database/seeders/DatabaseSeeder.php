<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Publication;
use App\Models\Experience;
use App\Models\Qualification;
use App\Models\Achievement;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('password'),
        ]);

        // Create profile
        Profile::create([
            'name' => 'John Doe',
            'title' => 'Full Stack Developer',
            'bio' => 'I am a passionate full-stack developer with 5+ years of experience building web applications. I specialize in Laravel, React, and cloud technologies. I love turning complex problems into simple, beautiful, and intuitive solutions.',
            'email' => 'john@example.com',
            'phone' => '+1 234 567 890',
            'location' => 'San Francisco, CA',
            'github_url' => 'https://github.com/johndoe',
            'linkedin_url' => 'https://linkedin.com/in/johndoe',
            'twitter_url' => 'https://twitter.com/johndoe',
            'typing_titles' => ['Full Stack Developer', 'Laravel Expert', 'UI/UX Enthusiast', 'Open Source Contributor'],
        ]);

        // Seed categorized skills, academic qualifications, and achievements
        require_once __DIR__ . '/SkillAndAcademicSeeder.php';
        $this->call(SkillAndAcademicSeeder::class);

        // Create projects
        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'A full-featured e-commerce platform built with Laravel and React. Includes payment processing, inventory management, and admin dashboard.',
                'tech_stack' => 'Laravel, React, Stripe, MySQL',
                'category' => 'Software',
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/johndoe/ecommerce',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Task Management App',
                'description' => 'A collaborative task management application with real-time updates, drag-and-drop boards, and team features.',
                'tech_stack' => 'Laravel, Vue.js, WebSockets, Redis',
                'category' => 'Software',
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com/johndoe/taskmanager',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'IoT Environmental Station',
                'description' => 'An ESP32 and MQTT based IoT weather monitoring station streaming real-time sensor metrics to cloud dashboard.',
                'tech_stack' => 'ESP32, MQTT, C++, Laravel, MySQL',
                'category' => 'IoT',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Portfolio CMS',
                'description' => 'A dynamic portfolio content management system with admin dashboard for managing projects, publications, and more.',
                'tech_stack' => 'Laravel, Tailwind CSS, MySQL',
                'category' => 'Software',
                'is_featured' => true,
                'sort_order' => 4,
            ],
        ];
        foreach ($projects as $project) {
            Project::create($project);
        }

        // Create publications
        $publications = [
            [
                'title' => 'Modern Web Development Practices with Laravel',
                'authors' => 'John Doe, Jane Smith',
                'journal' => 'International Journal of Web Engineering',
                'year' => 2024,
                'abstract' => 'This paper explores modern web development practices using the Laravel framework, focusing on performance optimization and security best practices.',
                'doi_url' => 'https://doi.org/10.1234/example',
                'sort_order' => 1,
            ],
            [
                'title' => 'Scalable Microservices Architecture',
                'authors' => 'John Doe, Robert Johnson',
                'journal' => 'IEEE Software Engineering Conference',
                'year' => 2023,
                'abstract' => 'An in-depth analysis of microservices architecture patterns for building scalable and maintainable web applications.',
                'doi_url' => 'https://doi.org/10.5678/example',
                'sort_order' => 2,
            ],
        ];
        foreach ($publications as $pub) {
            Publication::create($pub);
        }

        // Create experiences
        $experiences = [
            [
                'company' => 'Tech Corp',
                'position' => 'Senior Full Stack Developer',
                'location' => 'San Francisco, CA',
                'start_date' => '2022-01-01',
                'end_date' => null,
                'description' => "• Led a team of 5 developers building microservices architecture\n• Improved application performance by 40% through caching strategies\n• Implemented CI/CD pipelines reducing deployment time by 60%\n• Mentored junior developers and conducted code reviews",
                'is_current' => true,
                'sort_order' => 1,
            ],
            [
                'company' => 'StartupXYZ',
                'position' => 'Full Stack Developer',
                'location' => 'Remote',
                'start_date' => '2020-03-01',
                'end_date' => '2021-12-31',
                'description' => "• Built and maintained 3 client-facing web applications\n• Developed RESTful APIs serving 10K+ daily active users\n• Integrated third-party payment and notification services\n• Collaborated with design team on UI/UX improvements",
                'is_current' => false,
                'sort_order' => 2,
            ],
            [
                'company' => 'Digital Agency',
                'position' => 'Junior Developer',
                'location' => 'New York, NY',
                'start_date' => '2018-06-01',
                'end_date' => '2020-02-28',
                'description' => "• Developed responsive websites for 20+ clients\n• Maintained and updated existing WordPress and Laravel projects\n• Assisted in database design and optimization\n• Participated in agile development sprints",
                'is_current' => false,
                'sort_order' => 3,
            ],
        ];
        foreach ($experiences as $exp) {
            Experience::create($exp);
        }
    }
}
