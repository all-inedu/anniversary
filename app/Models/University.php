<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $table = 'tbl_university';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'session_start',
        'time_start',
        'thumbnail',
        'link',
        'description',
        'status',
    ];

    public function booking()
    {
        return $this->belongsToMany(Booking::class, 'tbl_booking_univ', 'univ_id', 'booking_id');
    }
}
