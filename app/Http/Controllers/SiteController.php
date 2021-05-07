<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\ContestHistories;
use App\Models\ContestUsers;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function beginContest(){
        $history = ContestHistories::where('user_id',Auth::id())->paginate(10);
        //$contest = DB::table('contest_user')->whereRaw('json_contains(user_id,\'"'.Auth::id().'"\')')->get();
        $contest = ContestUsers::whereRaw('json_contains(user_id,\'"'.Auth::id().'"\')')->get();
//        $his = ContestHistories::groupBy('contest_id')->select('*', DB::raw('count(*) as contest_id'))->get();
//        dd($his);
//        exit();

        return view('site.index',compact('history','contest'));
    }



    public function start($id){
        $start = ContestUsers::findOrFail($id);
        return view('site.start',compact('start'));
    }

    public function startContest($id){
        $startContest = ContestHistories::where('contest_id',$id)->pluck('question_id');

        $questions = Questions::whereIn('id',$startContest)->inRandomOrder()->limit(5)->get();

        return view('site.start_contest' ,compact('questions'));
    }

    public function moreHistory($id){
        $more_data = ContestHistories::where('contest_id',$id)->get();
        return view('site.more_history',compact('more_data'));
    }
}
