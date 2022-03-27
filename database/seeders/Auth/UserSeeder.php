<?php

namespace Database\Seeders\Auth;

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


        User::create([
            'type' => User::TYPE_USER,
            'first_name' => 'User',
            'email' => 'user@example.com',
            'password' => 'User@123',
            'email_verified_at' => now(),
            'active' => true,
        ]);

        $this->enableForeignKeys();
    }
}
