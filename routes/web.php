<?php

use App\User;
use App\Result;
use App\Contact;
use App\DailyNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/news', function () {
    if(Auth::check())
    {
        $user=User::where('id',Auth::user()->id)
        ->with('profile')->first();
        return view('news',compact('user'));
     }
   return redirect('/login');

});

Route::get('/auth-logout', function () {
   if (Auth::check()) {
       Auth::logout();
   }
   return redirect('/login');
});

Route::get('/admin', function () {
   $data=[
    'user'=>User::where('role','user')->with('profile')->latest()->get(),
    'result'=>Result::latest()->get(),
    'dailynews'=>DailyNews::with('user.profile','comments.user.profile','likes.user.profile')->latest()->get(),
    'contact'=>Contact::latest()->get(),
   ];
   return response()->json($data, 200);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/get-result', 'ResultController@getResult');
Route::get('/all-result', 'ResultController@allResult');
Route::post('/create-user', 'Auth\RegisterController@store');
Route::delete('/delete-user/{user}', 'Auth\RegisterController@delete');
Route::resource('comments', 'CommentsController');
Route::resource('contact', 'ContactController');
Route::resource('dailyNews', 'DailyNewsController');
Route::resource('profile', 'ProfileController');
Route::resource('result', 'ResultController');
Route::resource('likes', 'LikesController');
