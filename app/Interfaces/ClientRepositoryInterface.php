<?php

namespace App\Interfaces;

interface ClientRepositoryInterface 
{
    public function registerClient(array $clientDetails);
}