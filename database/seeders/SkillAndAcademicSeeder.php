<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\Qualification;
use App\Models\Achievement;

class SkillAndAcademicSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Grouped Skills
        // Clear existing skills to seed clean categorized skills
        Skill::truncate();

        $skills = [
            // Languages
            ['name' => 'Python', 'percentage' => 95, 'category' => 'Languages', 'sort_order' => 1],
            ['name' => 'C++', 'percentage' => 88, 'category' => 'Languages', 'sort_order' => 2],
            ['name' => 'Java', 'percentage' => 85, 'category' => 'Languages', 'sort_order' => 3],
            ['name' => 'C#', 'percentage' => 80, 'category' => 'Languages', 'sort_order' => 4],
            ['name' => 'R', 'percentage' => 78, 'category' => 'Languages', 'sort_order' => 5],
            ['name' => 'JavaScript', 'percentage' => 90, 'category' => 'Languages', 'sort_order' => 6],

            // Web Tools
            ['name' => 'PHP', 'percentage' => 92, 'category' => 'Web Tools', 'sort_order' => 1],
            ['name' => 'Laravel', 'percentage' => 95, 'category' => 'Web Tools', 'sort_order' => 2],
            ['name' => 'HTML & HTML5', 'percentage' => 96, 'category' => 'Web Tools', 'sort_order' => 3],
            ['name' => 'CSS & Tailwind CSS', 'percentage' => 94, 'category' => 'Web Tools', 'sort_order' => 4],
            ['name' => 'REST APIs & AJAX', 'percentage' => 90, 'category' => 'Web Tools', 'sort_order' => 5],

            // AI / ML
            ['name' => 'Pandas', 'percentage' => 92, 'category' => 'AI / ML', 'sort_order' => 1],
            ['name' => 'NumPy', 'percentage' => 90, 'category' => 'AI / ML', 'sort_order' => 2],
            ['name' => 'TensorFlow', 'percentage' => 85, 'category' => 'AI / ML', 'sort_order' => 3],
            ['name' => 'Scikit-learn', 'percentage' => 88, 'category' => 'AI / ML', 'sort_order' => 4],
            ['name' => 'PyTorch', 'percentage' => 80, 'category' => 'AI / ML', 'sort_order' => 5],

            // Database
            ['name' => 'MySQL', 'percentage' => 92, 'category' => 'Database', 'sort_order' => 1],
            ['name' => 'SQLite', 'percentage' => 88, 'category' => 'Database', 'sort_order' => 2],
            ['name' => 'PostgreSQL', 'percentage' => 82, 'category' => 'Database', 'sort_order' => 3],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // 2. Academic Qualifications (School, College, University)
        Qualification::truncate();

        $qualifications = [
            [
                'degree' => 'B.Sc. in Computer Science & Engineering',
                'level' => 'University',
                'institution' => 'University of Engineering and Technology',
                'result' => 'CGPA: 3.85 / 4.00',
                'duration' => '2020 - 2024',
                'field_of_study' => 'Computer Science & Software Engineering',
                'description' => 'Graduated with Dean’s Honors List. Specialized in Software Architecture, Machine Learning, Embedded Systems, and Distributed Computing. Completed undergraduate capstone thesis on Edge AI and IoT.',
                'sort_order' => 1,
            ],
            [
                'degree' => 'Higher Secondary Certificate (HSC)',
                'level' => 'College',
                'institution' => 'Dhaka City College',
                'result' => 'GPA: 5.00 / 5.00',
                'duration' => '2018 - 2020',
                'field_of_study' => 'Science',
                'description' => 'Completed Higher Secondary Certificate with distinction (Golden GPA 5.00). Active member of the College Science and ICT Club.',
                'sort_order' => 2,
            ],
            [
                'degree' => 'Secondary School Certificate (SSC)',
                'level' => 'School',
                'institution' => 'Ideal School and College',
                'result' => 'GPA: 5.00 / 5.00',
                'duration' => '2016 - 2018',
                'field_of_study' => 'Science',
                'description' => 'Achieved Golden GPA 5.00 with Board Talentpool Scholarship. Finalist in regional Math and Physics Olympiads.',
                'sort_order' => 3,
            ],
        ];

        foreach ($qualifications as $qualification) {
            Qualification::create($qualification);
        }

        // 3. Achievements & Awards
        Achievement::truncate();

        $achievements = [
            [
                'title' => 'Champion - National IoT & Smart City Hackathon',
                'category' => 'Competition',
                'issuer' => 'Ministry of ICT & National Innovation Agency',
                'year' => '2023',
                'description' => 'Secured 1st Place out of 140+ participating university teams for architecting an intelligent real-time IoT air and environmental hazard warning system with edge inference.',
                'link' => 'https://example.com/awards/hackathon-2023',
                'icon' => '🏆',
                'sort_order' => 1,
            ],
            [
                'title' => 'Dean’s Honor List for Academic Excellence',
                'category' => 'Academic Award',
                'issuer' => 'Faculty of Electrical & Computer Engineering',
                'year' => '2022 - 2024',
                'description' => 'Awarded for exceptional academic merit, maintaining consecutive semester GPAs above 3.85 out of 4.00 throughout undergraduate studies.',
                'link' => null,
                'icon' => '🎖️',
                'sort_order' => 2,
            ],
            [
                'title' => 'Best Undergraduate Research Paper Award',
                'category' => 'Research Award',
                'issuer' => 'International Conference on Smart Systems & Computing',
                'year' => '2024',
                'description' => 'Recognized with the Best Student Paper Award for novel research on lightweight machine learning models deployed on low-power microcontrollers.',
                'link' => 'https://example.com/publications/best-paper',
                'icon' => '📜',
                'sort_order' => 3,
            ],
            [
                'title' => '1st Runner-Up - Intra-University Programming Contest',
                'category' => 'Competition',
                'issuer' => 'Department of CSE & ACM Club',
                'year' => '2022',
                'description' => 'Solved 7 algorithmic problem sets in under 4 hours using C++ and Python under intense competitive timing.',
                'link' => null,
                'icon' => '🥈',
                'sort_order' => 4,
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}
