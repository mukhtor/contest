<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Models\Subjects;
use App\Repositories\QuestionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class QuestionsController extends AppBaseController
{
    /** @var  QuestionsRepository */
    private $questionsRepository;

    public function __construct(QuestionsRepository $questionsRepo)
    {
        $this->questionsRepository = $questionsRepo;
    }

    /**
     * Display a listing of the Questions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $questions = $this->questionsRepository->paginate(6);

        return view('questions.index')
            ->with('questions', $questions);
    }

    /**
     * Show the form for creating a new Questions.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $subjects = Subjects::all()->pluck('name' , 'id');
        return view('questions.create')->with('subjects' , $subjects);
    }

    /**
     * Store a newly created Questions in storage.
     *
     * @param CreateQuestionsRequest $request
     *
     * @return Response
     */
    public function store(CreateQuestionsRequest $request)
    {
        $input = $request->all();

        $questions = $this->questionsRepository->create($input);

        Flash::success('Questions saved successfully.');

        return redirect(route('questions.index'));
    }

    /**
     * Display the specified Questions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questions = $this->questionsRepository->find($id);

        if (empty($questions)) {
            Flash::error('Questions not found');

            return redirect(route('questions.index'));
        }

        return view('questions.show')->with('questions', $questions);
    }

    /**
     * Show the form for editing the specified Questions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questions = $this->questionsRepository->find($id);

        if (empty($questions)) {
            Flash::error('Questions not found');

            return redirect(route('questions.index'));
        }
        $subjects = Subjects::all()->pluck('name' , 'id');
        return view('questions.edit')->with('questions', $questions)->with('subjects', $subjects);
    }

    /**
     * Update the specified Questions in storage.
     *
     * @param int $id
     * @param UpdateQuestionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuestionsRequest $request)
    {
        $questions = $this->questionsRepository->find($id);

        if (empty($questions)) {
            Flash::error('Questions not found');

            return redirect(route('questions.index'));
        }

        $questions = $this->questionsRepository->update($request->all(), $id);

        Flash::success('Questions updated successfully.');

        return redirect(route('questions.index'));
    }

    /**
     * Remove the specified Questions from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questions = $this->questionsRepository->find($id);

        if (empty($questions)) {
            Flash::error('Questions not found');

            return redirect(route('questions.index'));
        }

        $this->questionsRepository->delete($id);

        Flash::success('Questions deleted successfully.');

        return redirect(route('questions.index'));
    }
}
