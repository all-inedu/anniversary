<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'tbl_destination';

    protected $fillable = [
        'name'
    ];

    public function client()
    {
        return $this->belongsToMany(Client::class, 'tbl_client_major', 'major_id', 'client_id');
    }
}
