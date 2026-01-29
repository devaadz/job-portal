<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        // Only seed if table is empty
        if (Skill::count() > 0) {
            return;
        }

        $skills = [
            'PHP',
            'Laravel',
            'JavaScript',
            'Vue.js',
            'React',
            'Python',
            'Django',
            'MySQL',
            'PostgreSQL',
            'MongoDB',
            'Docker',
            'AWS',
            'Git',
            'REST API',
            'GraphQL',
            'HTML/CSS',
            'Tailwind CSS',
            'Bootstrap',
            'Java',
            'Spring Boot',
            'C#',
            '.NET',
            'SQL',
            'Node.js',
            'Express.js',
            'TypeScript',
            'Angular',
            'Figma',
            'UI/UX Design',
            'SEO',
            'Digital Marketing',
        ];

        foreach ($skills as $skill) {
            Skill::create(['name' => $skill]);
        }
    }
}
