<?php

namespace App\Repositories;

use App\Interfaces\DestinationRepositoryInterface;
use App\Models\Client;
use App\Models\Destination;

class DestinationRepository implements DestinationRepositoryInterface
{
    public function getDestinations()
    {
        return Destination::orderBy('name', 'asc')->get();
    }
}
