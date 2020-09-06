<?php

namespace App\Repositories;

use App\Models\ProfileState;
use App\Repositories\BaseRepository;

/**
 * Class ProfileStateRepository
 * @package App\Repositories
 * @version September 6, 2020, 1:22 pm UTC
*/

class ProfileStateRepository extends BaseRepository
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
        return ProfileState::class;
    }
}
