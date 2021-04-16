<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContestQuestionsRequest;
use App\Http\Requests\UpdateContestQuestionsRequest;
use App\Repositories\ContestQuestionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContestQuestionsController extends AppBaseController
{
    /** @var  ContestQuestionsRepository */
    private $contestQuestionsRepository;

    public function __construct(ContestQuestionsRepository $contestQuestionsRepo)
    {
        $this->contestQuestionsRepository = $contestQuestionsRepo;
    }

    /**
     * Display a listing of the ContestQuestions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contestQuestions = $this->contestQuestionsRepository->paginate(6);

        return view('contest_questions.index')
            ->with('contestQuestions', $contestQuestions);
    }

    /**
     * Show the form for creating a new ContestQuestions.
     *
     * @return Response
     */
    public function create()
    {
        return view('contest_questions.create');
    }

    /**
     * Store a newly created ContestQuestions in storage.
     *
     * @param CreateContestQuestionsRequest $request
     *
     * @return Response
     */
    public function store(CreateContestQuestionsRequest $request)
    {
        $input = $request->all();

        $contestQuestions = $this->contestQuestionsRepository->create($input);

        Flash::success('Contest Questions saved successfully.');

        return redirect(route('contestQuestions.index'));
    }

    /**
     * Display the specified ContestQuestions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contestQuestions = $this->contestQuestionsRepository->find($id);

        if (empty($contestQuestions)) {
            Flash::error('Contest Questions not found');

            return redirect(route('contestQuestions.index'));
        }

        return view('contest_questions.show')->with('contestQuestions', $contestQuestions);
    }

    /**
     * Show the form for editing the specified ContestQuestions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contestQuestions = $this->contestQuestionsRepository->find($id);

        if (empty($contestQuestions)) {
            Flash::error('Contest Questions not found');

            return redirect(route('contestQuestions.index'));
        }

        return view('contest_questions.edit')->with('contestQuestions', $contestQuestions);
    }

    /**
     * Update the specified ContestQuestions in storage.
     *
     * @param int $id
     * @param UpdateContestQuestionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContestQuestionsRequest $request)
    {
        $contestQuestions = $this->contestQuestionsRepository->find($id);

        if (empty($contestQuestions)) {
            Flash::error('Contest Questions not found');

            return redirect(route('contestQuestions.index'));
        }

        $contestQuestions = $this->contestQuestionsRepository->update($request->all(), $id);

        Flash::success('Contest Questions updated successfully.');

        return redirect(route('contestQuestions.index'));
    }

    /**
     * Remove the specified ContestQuestions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contestQuestions = $this->contestQuestionsRepository->find($id);

        if (empty($contestQuestions)) {
            Flash::error('Contest Questions not found');

            return redirect(route('contestQuestions.index'));
        }

        $this->contestQuestionsRepository->delete($id);

        Flash::success('Contest Questions deleted successfully.');

        return redirect(route('contestQuestions.index'));
    }
}
