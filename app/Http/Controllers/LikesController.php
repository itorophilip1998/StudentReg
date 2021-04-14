<?php

namespace App\Http\Controllers;

use App\Likes;
use App\DailyNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
   
    public function store(Request $request)
    {
       
        $like=Likes::where('daily_news_id',$request->daily_news_id)->where('user_id',Auth::user()->id); 
        $post=DailyNews::where('id',$request->daily_news_id);
        if ($like->first()) {
          $like->delete(); 
          $post->update(['islike'=>false]);
          return response()->json($like,200);

        }
        else {
            Likes::create([
                'daily_news_id'=>$request->daily_news_id,
                'user_id'=>$request->user_id,
            ]); 
          $post->update(['islike'=>true]); 
          return response()->json($like,200); 
        }
  
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function show(Likes $likes)
    {
        $mylike=$likes->where('user_id',Auth::user()->id)->with('user.profiles')->first();
        $mylike=$likes->with('user.profiles')->get();
        return response()->json([$mylike,$allLike],200);
    }

  
}
