<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadSource extends Model
{
    use HasFactory;

    protected $table = 'tbl_lead_source';

    protected $fillable = [
        'name'
    ];

    public function client()
    {
        return $this->hasMany(Client::class, 'lead_source_id', 'id');
    }
}
