<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'tbl_client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'fullname',
        'email_address',
        'phone_number',
        'client_type',
        'grade',
        'graduate_from',
        'country_destination',
        'first_time',
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class, 'client_id', 'id');
    }

    public function lead_source()
    {
        return $this->belongsTo(LeadSource::class, 'lead_source_id', 'id');
    }

    public function biggest_challenge()
    {
        return $this->belongsTo(BiggestChallenge::class, 'challenge_id', 'id');
    }
}
