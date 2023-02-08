<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $table = 'tbl_major';

    protected $fillable = [
        'name'
    ];

    public function client()
    {
        return $this->belongsToMany(Client::class, 'tbl_client_major', 'major_id', 'client_id');
    }
}
