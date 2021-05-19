<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContestRequest;
use App\Http\Requests\UpdateContestRequest;
use App\Models\Contest;
use App\Models\Subjects;
use App\Repositories\ContestRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContestController extends AppBaseController
{
    /** @var  ContestRepository */
    private $contestRepository;

    public function __construct(ContestRepository $contestRepo)
    {
        $this->contestRepository = $contestRepo;
    }

    /**
     * Display a listing of the Contest.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contests = $this->contestRepository->paginate(6);

        return view('contests.index')
            ->with('contests', $contests);
    }

    /**
     * Show the form for creating a new Contest.
     *
     * @return Response
     */
    public function create()
    {
        $subjects = Subjects::all()->pluck('name','id');
        return view('contests.create',compact('subjects'));
    }

    private function unpluckSubject( $request ){
        $subjects = [];
        $question_count = 0;
        foreach ($request->subjects as $subject_id => $count){
            if (intval($count) > 0)
                array_push($subjects, [
                    'subject_id' => $subject_id,
                    'count' => $count
                ]);
            $question_count += $count;
        }
        return ['count' => $question_count , 'subjects' => $subjects];
    }
    /**
     * Store a newly created Contest in storage.
     *
     * @param CreateContestRequest $request
     *
     * @return Response
     */
    public function store(CreateContestRequest $request)
    {
        $ans = $this->unpluckSubject($request);
        Contest::create([
            'title' =>$request->title,
            'question_count' => $ans['count'],
            'begin_date' => $request->begin_date,
            'duration' => $request->duration,
            'subjects' => json_encode($ans['subjects'])
        ]);
        Flash::success('Contest saved successfully.');

        return redirect(route('contests.index'));
    }

    /**
     * Display the specified Contest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contest = $this->contestRepository->find($id);

        if (empty($contest)) {
            Flash::error('Contest not found');

            return redirect(route('contests.index'));
        }
        return view('contests.show')->with('contest', $contest);
    }

    /**
     * Show the form for editing the specified Contest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contest = $this->contestRepository->find($id);
        if (empty($contest)) {
            Flash::error('Contest not found');
            return redirect(route('contests.index'));
        }

        $subjects = Subjects::all()->pluck('name', 'id');
        $subjects_count = collect(json_decode($contest->subjects, true))->pluck('count', 'subject_id');

        return view('contests.edit')->with('contest', $contest)->with('subjects', $subjects)->with('subjects_count', $subjects_count);
    }

    /**
     * Update the specified Contest in storage.
     *
     * @param int $id
     * @param UpdateContestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContestRequest $request)
    {
        $contest = $this->contestRepository->find($id);

        if (empty($contest)) {
            Flash::error('Contest not found');

            return redirect(route('contests.index'));
        }
        $ans = $this->unpluckSubject($request);

        $request->merge([
            'question_count' => $ans['count'],
            'subjects' => $ans['subjects']
        ]);

        $this->contestRepository->update($request->all(), $id);

        Flash::success('Contest updated successfully.');

        return redirect(route('contests.index'));
    }

    /**
     * Remove the specified Contest from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contest = $this->contestRepository->find($id);

        if (empty($contest)) {
            Flash::error('Contest not found');

            return redirect(route('contests.index'));
        }

        $this->contestRepository->delete($id);

        Flash::success('Contest deleted successfully.');

        return redirect(route('contests.index'));
    }
}
