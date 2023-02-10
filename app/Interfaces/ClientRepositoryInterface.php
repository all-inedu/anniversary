<?php

namespace App\Interfaces;

interface ClientRepositoryInterface 
{
    public function getClientByUuid($uuid);
    public function getRegistrantJoinUniPrep();
    public function getAllRegistrants();
    public function getLatestRegistrants();
    public function getRegistrantByType($type);
    public function getLeadSources();
    public function registerClient(array $clientDetails);
    public function storeDestination($clientId, array $destinationDetails);
    public function storeMajor($clientId, array $majorDetails);
}