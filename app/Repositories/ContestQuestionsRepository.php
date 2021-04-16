<?php

namespace App\Repositories;

use App\Models\ContestQuestions;
use App\Repositories\BaseRepository;

/**
 * Class ContestQuestionsRepository
 * @package App\Repositories
 * @version April 12, 2021, 1:33 pm UTC
*/

class ContestQuestionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contest_id',
        'question_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ContestQuestions::class;
    }
}
