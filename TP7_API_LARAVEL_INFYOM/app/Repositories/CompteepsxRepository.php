<?php

namespace App\Repositories;

use App\Models\Compteepsx;
use App\Repositories\BaseRepository;

/**
 * Class CompteepsxRepository
 * @package App\Repositories
 * @version September 6, 2020, 3:22 pm UTC
*/

class CompteepsxRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'owner_id',
        'accountNumber',
        'cleRIB',
        'solde',
        'dateCreation',
        'activeDate',
        'nextRemunDate',
        'closeDate',
        'idUser',
        'hostAgency',
        'idOpeningFees'
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
        return Compteepsx::class;
    }
}
