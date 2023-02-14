<?php

namespace App\Repositories;

use App\Interfaces\UniversityRepositoryInterface;
use App\Models\University;
use Illuminate\Support\Facades\DB;

class UniversityRepository implements UniversityRepositoryInterface
{
    public function getActiveUniversities()
    {
        return University::where('status', 1)->orderBy('name', 'asc')->get();

    }

    public function getUniversities()
    {
        return University::orderBy('created_at', 'desc')->get();
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

    public function editUniversity($univUUid, array $newDetails)
    {
        return University::where('uuid', $univUUid)->update($newDetails);
    }

    public function deleteUniversity($univUUid)
    {
        return University::where('uuid', $univUUid)->delete();
    }
}
