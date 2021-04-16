<?php

namespace App\Repositories;

use App\Models\Groups;
use App\Repositories\BaseRepository;

/**
 * Class GroupsRepository
 * @package App\Repositories
 * @version April 12, 2021, 10:49 am UTC
*/

class GroupsRepository extends BaseRepository
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
        return Groups::class;
    }
}
