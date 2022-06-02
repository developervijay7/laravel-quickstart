<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = json_decode(file_get_contents(__DIR__.'/data/states.json'), true);
        foreach ($states as $state) {
            DB::table('states')->insert([
                'name' => $state['name'],
                'short_name' => $state['short_name'],
                'capital' => $state['capital'],
                'type' => $state['type'],
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
