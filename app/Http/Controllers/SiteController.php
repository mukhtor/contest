<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContestHistoriesRequest;
use App\Models\Contest;
use App\Models\ContestHistories;
use App\Models\ContestUsers;
use App\Models\Questions;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function beginContest(){
//        $history = ContestHistories::where('user_id',Auth::id())->paginate(10);
        $user_id = Auth::id();

        $contest = ContestUsers::whereRaw("json_contains(user_id,'\"$user_id\"')")->where('status',0)->get();

        return view('site.index',compact('contest'));
    }



    public function start($id){
        $start = Contest::findOrFail($id);
        return view('site.start',compact('start'));
    }

    public function startContest($id, Request $request){

        $contest = Contest::findOrFail($id);

        if (!$contest->isStart()){
            Flash::error('Hali boshlanmadi!!')->important();
            return redirect()->to('/');
        }
        if ($contest->isFinish()){
            Flash::error('Tugadi!!')->important();
            return redirect()->to('/');
        }

        if (!ContestHistories::where('contest_id',$id)->where('user_id',Auth::id())->count())
            ContestHistories::make($id, Auth::id());


        $questions = ContestHistories::where('contest_id',$id)->where('user_id',Auth::id())->get();

        $number = $request['q'] ?? 1;

        if ($number < 1 || $number > count($questions))
            $number = 1;

        return view('site.start_contest')->with('questions', $questions)->with('number', $number);
    }

    public function answer($id, Request $request){

        $contest = Contest::find($id);

        if (empty($contest) || !$contest->isStart())
            return redirect()->route('home');


        $url = explode('#', $request->submit)[1] ?? $request->number ?? 1;

        $questions = ContestHistories::where('contest_id',$id)->where('user_id',Auth::id())->get();

        if ($url < 0 || $url > count($questions))
            $url = $request->number ?? 1;

        if (!isset($request->number) || !isset($questions[$request -> number - 1]))
            return redirect()->back();

        if (!$contest->isFinish()){
            $contest = $questions[$request -> number - 1];
            $contest->answer = $request->answer;
            $contest->save();
        }else{
            Flash::error('Contest Finished')->important();
        }

        return redirect()->to("start_contest/$id?q=$url");

    }
    public function moreHistory($id){
        $more_data = ContestHistories::where('contest_id',$id)->get();
        return view('site.more_history',compact('more_data'));
    }
    public function compile(Request $request){
        $client = new Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
        $response = $client->post('checker:5000/check', [
            \GuzzleHttp\RequestOptions::JSON => ['code' => $request->post('code')],
            'content-type' => 'application/json',
        ]);
        return response()->json(json_decode($response->getBody(), true));
    }
}
