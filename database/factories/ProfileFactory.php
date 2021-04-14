<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' => 3,
        'department' => 'Management',
        'school' => 'Fedearal Polytechnic Ukana',
        'country' => 'Nigeria', // password
        'state' => 'Akwa Ibom',
        'lga'=>'Essien Udim',
        'address'=>'Ukana',
        'status'=>'Admin Entry',
        'picture'=>'http://localhost:8000/storage/images/default.jpg'
    ];
    
});
