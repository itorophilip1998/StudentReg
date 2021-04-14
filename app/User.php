<?php

namespace App;

use App\Likes;
use App\Result;
use App\Profile;
use App\Comments;
use App\DailyNews;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','regNo','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function dailynews()
    {
        return $this->hasMany(DailyNews::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

}
