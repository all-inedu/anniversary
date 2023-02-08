<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'tbl_booking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id',
        'join_anniv',
        'booking_date',
        'total_booked_univ'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function university()
    {
        return $this->belongsToMany(University::class, 'tbl_booking_univ', 'booking_id', 'univ_id')->withTimestamps();
    }
}
