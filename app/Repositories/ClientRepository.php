<?php

namespace App\Repositories;

use App\Interfaces\ClientRepositoryInterface;
use App\Models\Client;

class ClientRepository implements ClientRepositoryInterface
{
    public function registerClient(array $clientDetails)
    {
        return Client::create($clientDetails);
    }
}
