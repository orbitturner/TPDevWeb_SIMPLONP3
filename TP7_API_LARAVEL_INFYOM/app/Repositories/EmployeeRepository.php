<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version September 6, 2020, 1:19 pm UTC
*/

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numEmployee',
        'telephone',
        'email',
        'cni',
        'adresse',
        'sexe',
        'service',
        'dateNaiss',
        'idUser',
        'agencyhost'
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
        return Employee::class;
    }
}
