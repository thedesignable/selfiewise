<?php

namespace App;

use App\Traits\Friendable;
use Alert;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Socialite;
use Storage;


class User extends Authenticatable 
{
    use Notifiable;
    use Friendable;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'gender', 'avatar'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','access_token'
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }    
    public function getAvatarAttribute($avatar)
    {
        return asset(Storage::url($avatar));
    }

}
