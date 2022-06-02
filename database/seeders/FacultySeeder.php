<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = json_decode(file_get_contents(__DIR__.'/data/faculties.json'), true);
        foreach ($faculties as $faculty) {
            DB::table('faculties')->insert([
                'name' => $faculty['name'],
                'short_name' => $faculty['short_name'] ?? null,
                'slug' => $faculty['slug'],
                'about' => $faculty['about'] ?? null,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
