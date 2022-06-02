<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::factory()->state(function () {
            return ['designation' => 'Principal'];
        })->count(100)->create()->each(function ($teacher) {
            $teacher->user->assignRole('Administrator');
        });

        Teacher::factory()->count(100)->create();
    }
}
