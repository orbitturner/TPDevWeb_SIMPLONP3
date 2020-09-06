<?php

namespace App\Repositories;

use App\Models\UserState;
use App\Repositories\BaseRepository;

/**
 * Class UserStateRepository
 * @package App\Repositories
 * @version September 6, 2020, 1:23 pm UTC
*/

class UserStateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state_id'
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
        return UserState::class;
    }
}
