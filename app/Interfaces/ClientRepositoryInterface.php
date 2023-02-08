<?php

namespace App\Interfaces;

interface ClientRepositoryInterface 
{
    public function registerClient(array $clientDetails);
    public function storeDestination($clientId, array $destinationDetails);
    public function storeMajor($clientId, array $majorDetails);
}