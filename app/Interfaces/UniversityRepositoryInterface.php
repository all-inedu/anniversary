<?php

namespace App\Interfaces;

interface UniversityRepositoryInterface 
{
    public function getUniversities();
    public function getUniversityById($uuid);
    public function createUniversity(array $universityDetails);
    public function editUniversity($univId, array $newDetails);
}