<?php

namespace App\Repositories;

use App\Models\AgencyState;
use App\Repositories\BaseRepository;

/**
 * Class AgencyStateRepository
 * @package App\Repositories
 * @version September 6, 2020, 1:16 pm UTC
*/

class AgencyStateRepository extends BaseRepository
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
        return AgencyState::class;
    }
}
