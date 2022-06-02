<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colleges')->insert(
            [
                'name' => 'Babu Shivnath Agrawal (PG) College, Mathura',
                'short_name' => 'BSA PG college, Mathura',
                'code' => '059',
                'aishe_code' => 'c-000',
                'logo' => 'images/logo.png',
                'about' => 'An educational Institution is known as the temple of the knowledge and it is the place where students come for advancement of their skills, knowledge and overall development. BSA College Mathura, one of the most prestigious institutions in the holy land of Mathura, is imparting not only the knowledge to the students but also inculcating in them necessary human values.The college was established by "Shri Agrawal Shiksha Mandal®" in 1958, in the sacred memory of Late Hon\'ble Babu Shivnath Ji Agrawal, who generously donated one-fourth of his entire property for the establishment of this institution. B.S.A Graduate College, Mathura, affiliated to Dr. B. R. A. University, Agra (formerly, Agra University, Agra) is known for its quality education, discipline and infrastructure. The college is one of the most prominent institutions of Northern India, imparting graduate and post-graduate education in various disciplines like - Arts, Science, Commerce, Education, Law, Management and Computer applications.The college has a well developed infrastructure, lush-green lawns, vegetation, ventilated class rooms, modern laboratories with the state-of-art equipments and overall a dedicated staff team. The college administration and managing body are fully committed for the development of the college. The College gives immense stress to extra-curricular activities that include, modern class room teaching methods, practical exposure, industrial visits, educational tours, field visits, professional training, guest lectures and career development programmes. Extra-curricular activities such as cultural programmes, science week activities, sports, NSS and NCC activities are the mandatory part for the versatile development of the students.',
                'location_type' => 'Urban',
                'email' => 'admin@admin.com',
                'mobile' => '9090909090',
                'web_address' => config('app.url'),
                'total_area' => '2.6',
                'total_constructed_area' => '2600',
                'management_name' => 'Shri Agrawal Shiksha Mandal, Mathura',
                'primary_university' => 'Dr. Bhim Rao Ambedkar University, Agra',
                'body' => 'XYZ Commission',
                'established' => '2009',
                'affiliated' => '2009',
                'type' => 'Affiliated College',
                'management' => 'Private Un-Aided',
                'girls_only' => 0,
                'hostel' => 0,
                'faculty_quarters' => 0,
                'facebook' => 'https://www.facebook.com',
                'twitter' => 'https://www.twitter.com',
                'linkedin' => 'https://www.linkedin.com',
                'youtube' => 'https://www.youtube.com',
            ]
        );
    }
}
