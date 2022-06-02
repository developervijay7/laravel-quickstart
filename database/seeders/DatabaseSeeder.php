<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(CollegeSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(FacultySeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(NewsSeeder::class);
        Model::reguard();
    }
}
