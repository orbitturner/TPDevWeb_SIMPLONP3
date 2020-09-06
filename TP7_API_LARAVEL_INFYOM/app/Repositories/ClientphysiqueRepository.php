<?php

namespace App\Repositories;

use App\Models\Clientphysique;
use App\Repositories\BaseRepository;

/**
 * Class ClientphysiqueRepository
 * @package App\Repositories
 * @version September 6, 2020, 1:16 pm UTC
*/

class ClientphysiqueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numId',
        'nom',
        'prenom',
        'email',
        'cni',
        'telephone',
        'adresse',
        'sexe',
        'dateNaiss',
        'dateCreation',
        'features',
        'isSalarie'
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
        return Clientphysique::class;
    }
}
