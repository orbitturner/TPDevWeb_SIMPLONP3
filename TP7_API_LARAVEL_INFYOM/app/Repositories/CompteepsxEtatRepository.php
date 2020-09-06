<?php

namespace App\Repositories;

use App\Models\CompteepsxEtat;
use App\Repositories\BaseRepository;

/**
 * Class CompteepsxEtatRepository
 * @package App\Repositories
 * @version September 6, 2020, 1:18 pm UTC
*/

class CompteepsxEtatRepository extends BaseRepository
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
        return CompteepsxEtat::class;
    }
}
