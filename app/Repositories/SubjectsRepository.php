<?php

namespace App\Repositories;

use App\Models\Subjects;
use App\Repositories\BaseRepository;

/**
 * Class SubjectsRepository
 * @package App\Repositories
 * @version April 12, 2021, 1:32 pm UTC
*/

class SubjectsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Subjects::class;
    }
}
