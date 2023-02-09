<?php

namespace App\Repositories;

use App\Interfaces\ClientRepositoryInterface;
use App\Models\Client;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ClientRepository implements ClientRepositoryInterface
{
    public function getRegistrantJoinUniPrep()
    {
        return Client::where('uni_prep', true)->get();
    }

    public function getAllRegistrants()
    {
        return Client::orderBy('fullname', 'asc')->get();
    }

    public function getLatestRegistrants()
    {
        return Client::latest()->get();
    }

    public function getRegistrantByType($type)
    {
        return Client::where('client_type', $type)->get();
    }

    public function getLeadSources()
    {
        return Client::leftJoin('tbl_lead_source', 'tbl_lead_source.id', '=', 'tbl_client.lead_source_id')->
        select([
            DB::raw('COUNT(*) as sum'),
            DB::raw('(CASE 
                WHEN tbl_client.lead_source_id IS NULL THEN tbl_client.lead_other 
                ELSE tbl_lead_source.name
                END) as lead_source_name')
        ])->groupBy('lead_source_name')->orderBy('sum', 'desc')->get();
    }

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
