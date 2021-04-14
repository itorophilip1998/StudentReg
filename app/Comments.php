<?php

namespace App;
 
use App\User;
use App\DailyNews;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'user_id','comment','daily_news_id'
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
