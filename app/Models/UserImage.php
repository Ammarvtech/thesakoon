<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Booking;


class UserImage extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'user_images';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
   
}
