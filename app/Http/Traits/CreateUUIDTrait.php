<?php
namespace App\Http\Traits;

use Illuminate\Support\Str;

trait CreateUUIDTrait {

    public function generateUUID()
    {
        return (string) Str::uuid();
    }
}