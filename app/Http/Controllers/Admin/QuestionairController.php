<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Questionair;
use Gate;

class QuestionairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionair = Questionair::all();

        return view('admin.questionair.index', compact('questionair'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questionair.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question= $request->input('ques');
        $questioncount= count($request->input('ques'));        
        $answer1= $request->input('ansone');
        $answer2= $request->input('anstwo');
        $answer3= $request->input('ansthree');
        $answer4= $request->input('ansfour');       
        
        foreach($question as $dd => $val) {          
          
          DB::insert('insert into question (question_title,choice1,choice2,choice3,answer) values(?,?,?,?,?)',[$val,$answer1[$dd],$answer2[$dd],$answer3[$dd],$answer4[$dd]]);        
          
          
        }
        
        return redirect()->route('admin.questionair.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
