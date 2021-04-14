<?php

namespace App;

use App\User;
use App\DailyNews;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $fillable = [
        'user_id','daily_news_id'
    ];
    public function dailynews()
    {
        return $this->belongsTo(DailyNews::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
