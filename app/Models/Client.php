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
        'email',
        'phone_number',
        'address',
        'school_name'
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class, 'client_id', 'id');
    }
}
