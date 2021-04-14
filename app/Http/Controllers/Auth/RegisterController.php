<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
 
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
     

     
    
    protected function store(Request $data)
    {  
        $password=Str::random(5);
        $this->validate($data, [
            // user details
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],  
            'regNo' => ['required', 'string', 'unique:users'],
            // profile details
            'department'=>['required', 'string'],
            'picture'=>['required'],
            'department'=>['required', 'string'],
            'school'=>['required', 'string'],
            'country'=>['required', 'string'],
            'state'=>['required', 'string'],
            'lga'=>['required', 'string'],
            'address'=>['required', 'string'],
            'status'=>['required', 'string']

        ]);
        $password=Str::random(5);
         $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'role' =>  "user",
            'regNo'=>$data['regNo'],
            'remember_token' => Str::random(10),
        ]);
        $user->profile()->create([
            'user_id'=>$user->id,
           'department'=>$data['department'],
           'school'=>$data['school'],
           'country'=>$data['country'],
           'state'=>$data['state'],
           'lga'=>$data['lga'],
           'address'=>$data['address'],
           'status'=>$password,
         ]);
         $file=$data['picture']; 
         if ($file){ 
            $filename=$file->getClientOriginalName();
              $imagePath=$file->storeAs("images",$filename);
              $picture = URL::to('/').'/storage/'.$imagePath;
               $user->profile()->update(['picture'=>$picture]); 
        } 
        return response()->json($data, 200);

    }

    public function delete(User $user){
          
             if($user->profile()) $user->profile()->delete();  
             if($user->comments() != [])
             {
                  $user->comments()->delete();  
             }
             if($user->likes() != [])
             {
                  $user->likes()->delete();  
             }
             if($user->dailynews()) $user->dailynews()->delete();  
             if($user->delete()) $user->delete();  

        return response()->json($user, 200);
              
    }
   
}
