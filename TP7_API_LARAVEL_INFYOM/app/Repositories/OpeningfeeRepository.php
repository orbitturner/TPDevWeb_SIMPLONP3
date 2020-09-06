<?php

namespace App\Repositories;

use App\Models\Openingfee;
use App\Repositories\BaseRepository;

/**
 * Class OpeningfeeRepository
 * @package App\Repositories
 * @version September 6, 2020, 3:19 pm UTC
*/

class OpeningfeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'montant'
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
        return Openingfee::class;
    }
}
