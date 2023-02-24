<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'address',
        'grade',
        'graduate_from',
        'country_destination',
        'first_time',
        'uni_prep',
        'status',
        'major_other',
        'lead_other',
        'challenge_other',
        'lead_source_id',
        'challenge_id',
        'reminder_uniprep',
    ];

    protected function phoneNumber(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? '-',
        );
    }

    protected function leadSourceId(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? '-',
        );
    }

    protected function leadOther(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? '-',
        );
    }

    protected function address(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? '-',
        );
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     self::creating(function($model) {
    //         $model->uuid = (string) Str::uuid();
    //     });
    // }

    public function booking()
    {
        return $this->hasOne(Booking::class, 'client_id', 'id');
    }

    public function lead_source()
    {
        return $this->belongsTo(LeadSource::class, 'lead_source_id', 'id');
    }

    public function biggest_challenge()
    {
        return $this->belongsTo(BiggestChallenge::class, 'challenge_id', 'id');
    }

    public function destination()
    {
        return $this->belongsToMany(Destination::class, 'tbl_client_destination', 'client_id', 'destination_id');
    }

    public function major()
    {
        return $this->belongsToMany(Major::class, 'tbl_client_major', 'client_id', 'major_id');
    }
}
