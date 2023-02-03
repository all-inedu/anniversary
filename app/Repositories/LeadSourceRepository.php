<?php

namespace App\Repositories;

use App\Interfaces\LeadSourceRepositoryInterface;
use App\Models\LeadSource;

class LeadSourceRepository implements LeadSourceRepositoryInterface
{
    public function getLeadSources()
    {
        return LeadSource::orderBy('name')->get();
    }
}
