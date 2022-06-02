<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = json_decode(file_get_contents(__DIR__.'/data/departments.json'), true);
        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'faculty_id' => $department['faculty_id'] ?? null,
                'name' => $department['name'],
                'short_name' => $department['short_name'] ?? null,
                'slug' => $department['slug'],
                'about' => $department['about'] ?? null,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
