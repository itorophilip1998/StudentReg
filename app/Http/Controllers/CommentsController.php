<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

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
            'comment'=>'required|string',
            'daily_news_id'=>'required', 
        ]);
        $comment= Comments::create($request->all());
        return response()->json($comment, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments)
    {
        $request->validate([
            'user_id'=>'required',
            'comment'=>'required|string',
            'daily_news_id'=>'required',

        ]);
        $comment=$comments->update($request->all());
        return response()->json($comment, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        $comment=$comments->delete();
        return response()->json($comment, 200);
    }
}
