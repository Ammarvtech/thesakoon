<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Booking extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'bookings';

    public function serviceProvider()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function master()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
