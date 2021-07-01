<?php

namespace App\Http\Controllers;

use  Excel;
use App\Result;
use Illuminate\Http\Request;
use App\Imports\ProjectsImport;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('result');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'files'  => 'required'
           ]);

        $filename = $request->file('files')[0];
        $data = $request->all();
        // dd($data);
         Excel::import(new ProjectsImport($data),  $filename);
            $info=[
                "message"=>"Successful"
            ];
          return response()->json($info, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function getResult(Request $request)
    {
        $result=Result::where('semester',$request->semester)
        ->where('session',$request->session)
        ->where('regNo',$request->regNo)
        ->where('program',$request->program)
        ->first();
        // dd($request->all());
        return response()->json($result, 200);
    }
    public function allResult()
    {
        $result=Result::all();
        return response()->json($result, 200);
    }


}
