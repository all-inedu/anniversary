<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            'Accounting - General',
            'Actuarial Science',
            'Aerospace Engineering',
            'Apparel/Textile Design',
            'Arts Management',
            'Astronomy / Physics',
            'Athletic Training',
            'Aviation/Aeronautics',
            'Biology',
            'Biomedical Engineering',
            'Business - General',
            'Chemical Engineering',
            'Chemistry',
            'Civil Engineering',
            'Computer Science',
            'Construction Management',
            'Cyber Security',
            'Dance',
            'Data Science - Analytics',
            'Economics',
            'Education',
            'Electrical Engineering',
            'Emergency Management',
            'Energy Science',
            'Engineering',
            'English/Writing',
            'Environmental Science',
            'Equine Science/Mgmt',
            'Exercise Sci/Kinesiology',
            'Family & Child Science',
            'Film/Broadcast',
            'Finance',
            'Fine/Studio Art',
            'Fisheries and Wildlife',
            'Food Science',
            'Forest Management',
            'Graphic Design',
            'History',
            'Hospitality Management',
            'Human Resources Mgmt',
            'Industrial Design',
            'Industrial Engineering',
            'Industrial Technology',
            'Information Systems (MIS)',
            'Insurance & Risk Mgmt',
            'Interior Design',
            'Journalism',
            'Landscape Architecture',
            'Language Studies',
            'Marine Science',
            'Marketing / Advertising',
            'Materials Science',
            'Mathematics',
            'Mechanical Engineering',
            'Music',
            'National Parks Management',
            'Non-Profit Management',
            'Nursing (RN/BSN)',
            'Organic/Urban Farming',
            'Peace/Conflict Studies',
            'Pharmacy',
            'Philosophy',
            'Physicians Assistant',
            'Political Science',
            'Pre - Dental',
            'Pre - Medical',
            'Pre - Veterinary Medicine',
            'Psychology / Sociology',
            'Public Health Administration',
            'Sport Management',
            'Sports Turf/Golf Mgmt',
            'Supply Chain Mgmt (Logistics)',
            'Theatre',
            'Urban Planning',
            'Video Game Design',
            'Web Design/Digital Media',
            'Women/Gender Studies'
        ];

        for ($i = 0; $i < count($majors) ; $i++)
        {
            $seeds[] = [
                'name' => $majors[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('tbl_major')->insert($seeds);
    }
}
