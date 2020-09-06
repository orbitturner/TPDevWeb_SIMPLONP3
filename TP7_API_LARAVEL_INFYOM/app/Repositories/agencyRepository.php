<?php

namespace App\Repositories;

use App\Models\agency;
use App\Repositories\BaseRepository;

/**
 * Class agencyRepository
 * @package App\Repositories
 * @version September 6, 2020, 2:26 pm UTC
*/

class agencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return agency::class;
    }
}
