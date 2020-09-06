<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 * @package App\Models
 * @version September 6, 2020, 1:19 pm UTC
 *
 * @property \App\Models\Agency $agencyhost
 * @property \App\Models\User $iduser
 * @property string $numEmployee
 * @property string $telephone
 * @property string $email
 * @property string $cni
 * @property string $adresse
 * @property string $sexe
 * @property string $service
 * @property string $dateNaiss
 * @property integer $idUser
 * @property integer $agencyhost
 */
class Employee extends Model
{
    use SoftDeletes;

    public $table = 'employee';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numEmployee' => 'string',
        'telephone' => 'string',
        'email' => 'string',
        'cni' => 'string',
        'adresse' => 'string',
        'sexe' => 'string',
        'service' => 'string',
        'dateNaiss' => 'string',
        'idUser' => 'integer',
        'agencyhost' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numEmployee' => 'required|string|max:255',
        'telephone' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'cni' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'sexe' => 'required|string|max:255',
        'service' => 'required|string|max:255',
        'dateNaiss' => 'required|string|max:255',
        'idUser' => 'nullable|integer',
        'agencyhost' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function agencyhost()
    {
        return $this->belongsTo(\App\Models\Agency::class, 'agencyhost');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function iduser()
    {
        return $this->belongsTo(\App\Models\User::class, 'idUser');
    }
}
