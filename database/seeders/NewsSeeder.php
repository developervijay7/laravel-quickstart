<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = json_decode(file_get_contents(__DIR__.'/data/news.json'), true);
        foreach ($news as $new) {
            DB::table('news')->insert([
                'slug' => $new['slug'],
                'heading' => $new['heading'],
                'type' => $new['type'],
                'body' => $new['body'],
                'user_id' => $new['user_id'] ?? 1,
                'starts_at' => $new['starts'] ?? Carbon::now(),
                'ends_at' => $new['ends'] ?? Carbon::now()->addMonths(12),
                'breaking' => $new['breaking'] ?? 1,
                'active' => $new['active'] ?? 1,
                'approved' => $new['approved'] ?? 1,
                'created_at' => Carbon::Now(),
                'updated_at' => Carbon::Now(),
            ]);
        }
    }
}
