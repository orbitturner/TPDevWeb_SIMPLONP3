<?php

namespace App\Repositories;

use App\Models\State;
use App\Repositories\BaseRepository;

/**
 * Class StateRepository
 * @package App\Repositories
 * @version September 6, 2020, 1:22 pm UTC
*/

class StateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'description'
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
        return State::class;
    }
}
