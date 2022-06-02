<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = json_decode(file_get_contents(__DIR__.'/data/addresses.json'), true);
        foreach ($addresses as $address) {
            DB::table('addresses')->insert([
                'address_line_1' => $address['address_line_1'],
                'address_line_2' => $address['address_line_2'],
                'city' => $address['city'],
                'state_id' => $address['state_id'],
                'pin_code' => $address['pin_code'],
                'latitude' => $address['latitude'],
                'longitude' => $address['longitude'],
                'addressable_id' => $address['addressable_id'],
                'addressable_type' => $address['addressable_type'],
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
