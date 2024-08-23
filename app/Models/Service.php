<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Service extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'services';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'service_id', 'id');
    }

}
