<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\ContestHistories;
use App\Models\ContestUsers;
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
//        dd($test2);
//        exit();

        return view('site.index',compact('history','contest'));
    }



    public function start($id){
        $start = ContestUsers::findOrFail($id);
        return view('site.start',compact('start'));
    }

    public function startContest($id){

        return view('start_contest');
    }
}
