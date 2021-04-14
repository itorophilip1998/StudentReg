<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'regNo','name', 'courses_grades', 'department','school' , 'gpa' ,
         'cgpa','creadit_point','creadit_unit',
         'session','semester','program' 
    ];
    protected $casts=[
        'courses_grades'=>'array'
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
