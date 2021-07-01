<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'regNo','name', 'courses_grades', 'department','school' , 'gpa' ,
         'cgpa','credit_point','credit_unit',
         'session','semester','program','result'
    ];
    protected $casts=[
        'courses_grades'=>'array'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
