<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public $allRoles = [
        [
            'name' => 'Employer',
            'alias' => 'employer',
            'access'=> 1,
            
            
        ],
        [
            'name' => 'Job Seeker',
            'alias' => 'job-seeker',
            'access' => 2 ,            
        ]
    ];

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        foreach ($this->allRoles as $allRole) {
            $role = Role::create([
                'name' => $allRole['name'],
                'alias' => $allRole['alias'],
                'access'=>$allRole['access'],

            ]);
        }
    }
}