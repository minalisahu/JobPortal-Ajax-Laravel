<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SKillSeeder extends Seeder
{
    public $allSkills = [
        [
            'name' => 'PHP',
            
            
        ],
        [
            'name' => 'Java',
        ],
        [
            'name' => '.Net',
            
            
        ],
        [
            'name' => 'Python',
        ]  ,
        [
            'name' => 'Ruby',
            
            
        ],
        [
            'name' => 'Angular',
        ]
    ];

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach ($this->allSkills as $allSkill) {
            $skill = Skill::create([
                'name' => $allSkill['name'],
            ]);
        }
    }
}