<?php

use App\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user= User::create([
        'name' => 'Federal Poly Ukana',
        'email' => 'federalpolyuka@suport.com',
        'email_verified_at' => now(),
        'password' => Hash::make('admin1998'), // password
        'remember_token' => Str::random(10),
        'role'=>'admin',
        'regNo'=>Str::random(3)
        ]);
        $user->profile()->create([
        'user_id' => $user->id,
        'department' => 'Management',
        'school' => 'Fedearal Polytechnic Ukana',
        'country' => 'Nigeria', // password
        'state' => 'Akwa Ibom',
        'lga'=>'Essien Udim',
        'address'=>'Ukana',
        'status'=>'Admin Entry',
        'picture'=>'http://localhost:8000/storage/images/default.jpg' 
        ]);
    }
}
