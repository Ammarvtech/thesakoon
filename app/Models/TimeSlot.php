<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Booking;


class TimeSlot extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'time_slots';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
   
}
