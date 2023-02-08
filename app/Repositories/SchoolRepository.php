<?php

namespace App\Repositories;

use App\Interfaces\SchoolRepositoryInterface;
use App\Models\CRM\School;
use App\Models\LeadSource;

class SchoolRepository implements SchoolRepositoryInterface
{
    public function getSchools()
    {
        return School::where('sch_name', '!=', '-')->where('sch_name', '!=', '')->orderBy('sch_name', 'asc')->get();
    }
}
