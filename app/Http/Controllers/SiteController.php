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
        $user_id = Auth::id();

        $contest = ContestUsers::whereRaw("json_contains(user_id,'\"$user_id\"')")->where('status',0)->get();

        return view('site.index',compact('history','contest'));
    }



    public function start($id){
        $start = ContestUsers::findOrFail($id);
        return view('site.start',compact('start'));
    }

    public function startContest($id){

        $contest = Contest::findOrFail($id);

        if (!ContestHistories::where('contest_id',$id)->where('user_id',Auth::id())->count())
            ContestHistories::make($id, Auth::id());

        $questions = ContestHistories::where('contest_id',$id)->where('user_id',Auth::id())->simplePaginate(1);

        return view('site.start_contest' ,compact('questions'));
    }

    public function moreHistory($id){
        $more_data = ContestHistories::where('contest_id',$id)->get();
        return view('site.more_history',compact('more_data'));
    }
}
