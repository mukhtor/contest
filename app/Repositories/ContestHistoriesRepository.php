<?php

namespace App\Repositories;

use App\Models\ContestHistories;
use App\Repositories\BaseRepository;

/**
 * Class ContestHistoriesRepository
 * @package App\Repositories
 * @version April 12, 2021, 1:34 pm UTC
*/

class ContestHistoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
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
        return ContestHistories::class;
    }
}
