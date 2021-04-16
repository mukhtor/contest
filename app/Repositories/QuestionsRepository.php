<?php

namespace App\Repositories;

use App\Models\Questions;
use App\Repositories\BaseRepository;

/**
 * Class QuestionsRepository
 * @package App\Repositories
 * @version April 12, 2021, 1:57 pm UTC
*/

class QuestionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questions',
        'editor',
        'subject_id'
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
        return Questions::class;
    }
}
