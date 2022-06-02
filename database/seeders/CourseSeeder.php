<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = json_decode(file_get_contents(__DIR__.'/data/courses.json'), true);
        foreach ($courses as $course) {
            DB::table('courses')->insert([
                'name' => $course['name'],
                'short_name' => $course['short_name'] ?? null,
                'slug' => $course['slug'],
                'level' => $course['level'],
                'about' => $course['about'] ?? null,
                'image' => $course['image'] ?? null,
                'subject' => $course['subject'],
                'intake' => $course['intake'],
                'criterion' => $course['criterion'],
                'years' => $course['years'],
                'months' => $course['months'],
                'type' => $course['type'],
                'examination' => $course['examination'],
                'statutory_body' => $course['statutory_body'],
                'university' => $course['university'],
                'syllabus' => $course['syllabus'] ?? null,
                'courseable_id' => $course['courseable_id'],
                'courseable_type' => $course['courseable_type'],
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
