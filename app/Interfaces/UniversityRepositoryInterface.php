<?php

namespace App\Interfaces;

interface UniversityRepositoryInterface 
{
    public function getActiveUniversities();
    public function getUniversities();
    public function getUniversitiesWithParticipants();
    public function getUniversityById($uuid);
    public function createUniversity(array $universityDetails);
    public function editUniversity($univUUid, array $newDetails);
    public function deleteUniversity($univUUid);
}