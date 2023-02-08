<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $challenges = [
            'Exploring my interest & passion',
            'Deciding what major & university to apply',
            'Building my CV or portfolio',
            'Writing university essay application',
            'Preparing for standardized tests (SAT, ACT, TOEFL, IELTS, etc)',
            'Improving my grades',
            'Creating a unique application profile',
            'Improving my writing skill'
        ];

        for ($i = 0; $i < count($challenges) ; $i++)
        {
            $seeds[] = [
                'name' => $challenges[$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('tbl_biggest_challenge')->insert($seeds);
    }
}
