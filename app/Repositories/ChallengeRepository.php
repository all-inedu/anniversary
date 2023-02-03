<?php

namespace App\Repositories;

use App\Interfaces\ChallengeRepositoryInterface;
use App\Models\BiggestChallenge;

class ChallengeRepository implements ChallengeRepositoryInterface
{
    public function getChallenges()
    {
        return BiggestChallenge::orderBy('name')->get();
    }
}
