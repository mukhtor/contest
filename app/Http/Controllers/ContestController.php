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

    /**
     * Store a newly created Contest in storage.
     *
     * @param CreateContestRequest $request
     *
     * @return Response
     */
    public function store(CreateContestRequest $request)
    {

        Contest::create([
            'title' =>$request->title,
            'begin_date' => $request->begin_date,
            'duration' => $request->duration,
            'subjects' => json_encode($request->subjects)
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
        $subjects = Subjects::all()->pluck('name','id');
        if (empty($contest)) {
            Flash::error('Contest not found');

            return redirect(route('contests.index'));
        }

        return view('contests.edit')->with('contest', $contest)->with('subjects', $subjects);
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

        $contest = $this->contestRepository->update($request->all(), $id);

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
