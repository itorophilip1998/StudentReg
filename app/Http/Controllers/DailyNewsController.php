<?php

namespace App\Http\Controllers;

use App\DailyNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DailyNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dailynews=DailyNews::with('user.profile','comments.user.profile','likes.user.profile')->latest()->get();  
        return response()->json($dailynews, 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'message'=>'required|string',
            'picture'=>'nullable|array',
        ]);
       

        $data= DailyNews::create($request->all()); 
        if ($request->hasFile('picture')){  
            $files=$request->picture;
             foreach ($files as  $key=>$file) { 
              $filename=$file->getClientOriginalName(); 
                  $imagePath=$file->storeAs("images",$filename);
                  $picture[] = URL::to('/').'/storage/'.$imagePath;
                  $data->update(['picture'=>$picture]); 
            } 
        } 
 
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DailyNews  $dailyNews
     * @return \Illuminate\Http\Response
     */
    public function show(DailyNews $dailyNews)
    {
        return response()->json($dailyNews, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailyNews  $dailyNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyNews $dailyNews)
    {
        $request->validate([
            'user_id'=>'required',
            'message'=>'required|string',
            'picture'=>'nullable',
        ]);
     
        $dailyNews->update($request->all());  
        if ($request->hasFile('picture')) { 
            $files=$request->file('picture');
             foreach ($files as  $key=>$file) { 
              $filename=$file->getClientOriginalName(); 
                  $imagePath=$file->storeAs("images",$filename);
                  $picture[] = URL::to('/').'/storage/'.$imagePath;
                  $data->update(['picture'=>$picture]); 
            } 
        } 
        return response()->json($dailyNews, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailyNews  $dailyNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyNews $dailyNews)
    {
         $dailyNews->delete(); 
        return response()->json($dailyNews, 200);
    }
}
