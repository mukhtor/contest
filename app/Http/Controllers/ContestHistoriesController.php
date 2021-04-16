<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContestHistoriesRequest;
use App\Http\Requests\UpdateContestHistoriesRequest;
use App\Repositories\ContestHistoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContestHistoriesController extends AppBaseController
{
    /** @var  ContestHistoriesRepository */
    private $contestHistoriesRepository;

    public function __construct(ContestHistoriesRepository $contestHistoriesRepo)
    {
        $this->contestHistoriesRepository = $contestHistoriesRepo;
    }

    /**
     * Display a listing of the ContestHistories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contestHistories = $this->contestHistoriesRepository->paginate(6);

        return view('contest_histories.index')
            ->with('contestHistories', $contestHistories);
    }

    /**
     * Show the form for creating a new ContestHistories.
     *
     * @return Response
     */
    public function create()
    {
        return view('contest_histories.create');
    }

    /**
     * Store a newly created ContestHistories in storage.
     *
     * @param CreateContestHistoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateContestHistoriesRequest $request)
    {
        $input = $request->all();

        $contestHistories = $this->contestHistoriesRepository->create($input);

        Flash::success('Contest Histories saved successfully.');

        return redirect(route('contestHistories.index'));
    }

    /**
     * Display the specified ContestHistories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contestHistories = $this->contestHistoriesRepository->find($id);

        if (empty($contestHistories)) {
            Flash::error('Contest Histories not found');

            return redirect(route('contestHistories.index'));
        }

        return view('contest_histories.show')->with('contestHistories', $contestHistories);
    }

    /**
     * Show the form for editing the specified ContestHistories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contestHistories = $this->contestHistoriesRepository->find($id);

        if (empty($contestHistories)) {
            Flash::error('Contest Histories not found');

            return redirect(route('contestHistories.index'));
        }

        return view('contest_histories.edit')->with('contestHistories', $contestHistories);
    }

    /**
     * Update the specified ContestHistories in storage.
     *
     * @param int $id
     * @param UpdateContestHistoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContestHistoriesRequest $request)
    {
        $contestHistories = $this->contestHistoriesRepository->find($id);

        if (empty($contestHistories)) {
            Flash::error('Contest Histories not found');

            return redirect(route('contestHistories.index'));
        }

        $contestHistories = $this->contestHistoriesRepository->update($request->all(), $id);

        Flash::success('Contest Histories updated successfully.');

        return redirect(route('contestHistories.index'));
    }

    /**
     * Remove the specified ContestHistories from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contestHistories = $this->contestHistoriesRepository->find($id);

        if (empty($contestHistories)) {
            Flash::error('Contest Histories not found');

            return redirect(route('contestHistories.index'));
        }

        $this->contestHistoriesRepository->delete($id);

        Flash::success('Contest Histories deleted successfully.');

        return redirect(route('contestHistories.index'));
    }
}
