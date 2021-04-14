<?php

namespace App;

use App\User;
use App\Likes;
use App\Comments;
use Illuminate\Database\Eloquent\Model;

class DailyNews extends Model
{
    protected $fillable = [
        'user_id','message', 'picture'
    ];
    protected $casts = [
        'picture' => 'array',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
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
