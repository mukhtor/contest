<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\ContestHistories;
use App\Models\ContestUsers;
use App\Models\Groups;
use App\Models\Questions;
use App\Models\Users;
use Illuminate\Http\Request;

class ContestUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contestUsers = ContestUsers::paginate(2);

        return view('contest_user.index')->with('contestUsers',$contestUsers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contest = Contest::all()->pluck('title','id');
        $group = Groups::all();
        return view('contest_user.create',compact('contest','group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contestUser =  $request->validate([
           'contest_id' => 'required',
           'user_id' => 'required'
        ]);

        foreach ($contestUser['user_id'] as $item){
           for ($i = 1; $i <= 5; $i++){
               $ques = Questions::inRandomOrder()->limit(1)->pluck('id');
               ContestHistories::create([
                   'contest_id' => $contestUser['contest_id'],
                   'user_id' => $item,
                   'question_id' => $ques['0'],
               ]);
           }
        }

        ContestUsers::create([
            'user_id' => json_encode($contestUser['user_id']),
            'contest_id' => $contestUser['contest_id'],
        ]);
        return redirect()->route('contestUsers.index');
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
        $delete = ContestUsers::findOrFail($id);
        $delete->delete();
        return redirect()->route('contestUsers.index');
    }
}
