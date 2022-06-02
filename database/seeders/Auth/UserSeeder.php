<?php

namespace Database\Seeders\Auth;

use App\Models\Teacher;
use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'type' => User::TYPE_ADMIN,
            'first_name' => 'Master',
            'email' => 'master@example.com',
            'password' => 'Master@123',
            'email_verified_at' => now(),
            'active' => true,
        ]);

        User::create([
            'type' => User::TYPE_ADMIN,
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'Admin@123',
            'email_verified_at' => now(),
            'active' => true,
        ]);

        //$user = User::factory()->has(Teacher::factory())->create(100);

        $this->enableForeignKeys();
    }
}
