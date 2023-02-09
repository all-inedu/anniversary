<?php

namespace App\Repositories;

use App\Interfaces\UniversityRepositoryInterface;
use App\Models\University;
use Illuminate\Support\Facades\DB;

class UniversityRepository implements UniversityRepositoryInterface
{
    public function getUniversities()
    {
        return University::orderBy('name')->get();
    }
    
    public function getUniversitiesWithParticipants()
    {
        return University::select([
            'tbl_university.name',
            DB::raw('(select count(*) from `tbl_booking` inner join `tbl_booking_univ` on `tbl_booking`.`id` = `tbl_booking_univ`.`booking_id` where `tbl_university`.`id` = `tbl_booking_univ`.`univ_id`) as participants')
        ])->orderBy('participants', 'desc')->get();
    }

    public function getUniversityById($uuid)
    {
        return University::where('uuid', $uuid)->first();
    }

    public function createUniversity(array $universityDetails)
    {
        return University::create($universityDetails);
    }

    public function editUniversity($univId, array $newDetails)
    {
        return University::whereId($univId)->update($newDetails);
    }
}
