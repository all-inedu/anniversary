<?php

namespace App\Interfaces;

interface UniversityRepositoryInterface 
{
    public function getUniversities();
    public function createUniversity(array $universityDetails);
    public function editUniversity($univId, array $newDetails);
}