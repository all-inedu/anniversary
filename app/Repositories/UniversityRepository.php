<?php

namespace App\Repositories;

use App\Interfaces\UniversityRepositoryInterface;
use App\Models\University;

class UniversityRepository implements UniversityRepositoryInterface
{
    public function getUniversities()
    {
        return University::orderBy('name')->get();
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
