<?php

namespace App\Repositories;

use App\Interfaces\ClientRepositoryInterface;
use App\Models\Client;
use Illuminate\Support\Carbon;

class ClientRepository implements ClientRepositoryInterface
{
    public function registerClient(array $clientDetails)
    {
        return Client::create($clientDetails);
    }

    public function storeDestination($clientId, array $destinationDetails)
    {
        $client = Client::find($clientId);
        $client->destination()->attach($destinationDetails, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        return $client;
    }

    public function storeMajor($clientId, array $majorDetails)
    {
        $client = Client::find($clientId);
        $client->major()->attach($majorDetails, [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        return $client;
    }
}
