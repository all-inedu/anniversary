<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiggestChallenge extends Model
{
    use HasFactory;

    protected $table = 'tbl_biggest_challenge';

    protected $fillable = [
        'name'
    ];

    public function client()
    {
        return $this->hasMany(Client::class, 'challenge_id', 'id');
    }
}
