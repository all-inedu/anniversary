<?php

namespace App\Repositories;

use App\Interfaces\MajorRepositoryInterface;
use App\Models\Major;

class MajorRepository implements MajorRepositoryInterface
{
    public function getMajors()
    {
        return Major::where('name', '!=', 'Other')->orderBy('name', 'asc')->get();
    }
}
