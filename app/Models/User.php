<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Booking;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'type'
    ];

    public function serviceProviderBookings()
    {
        return $this->hasMany(Booking::class, 'user_id', 'id');
    }
    
    public function customerBookings()
    {
        return $this->hasMany(Booking::class, 'customer_id', 'id');
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'user_id', 'id')->orderBy('id', 'desc');
    }
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id', 'id');
    }
    public function images()
    {
        return $this->hasMany(UserImage::class, 'user_id', 'id');
    }
    public function staff()
    {
        return $this->hasMany(User::class, 'parent_id', 'id');
    }
    public function saloon_images()
    {
        return $this->hasMany(UserImage::class, 'user_id', 'id');
    }
   
}
