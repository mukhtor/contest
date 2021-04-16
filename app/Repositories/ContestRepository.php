<?php

namespace App\Repositories;

use App\Models\Contest;
use App\Repositories\BaseRepository;

/**
 * Class ContestRepository
 * @package App\Repositories
 * @version April 12, 2021, 1:33 pm UTC
*/

class ContestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'begin_date',
        'duration'
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
        return Contest::class;
    }
}
