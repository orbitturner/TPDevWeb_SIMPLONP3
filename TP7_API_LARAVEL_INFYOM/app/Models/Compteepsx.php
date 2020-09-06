<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compteepsx
 * @package App\Models
 * @version September 6, 2020, 1:17 pm UTC
 *
 * @property \App\Models\Agency $hostagency
 * @property \App\Models\Clientphysique $owner
 * @property \App\Models\Openingfee $idopeningfees
 * @property \App\Models\User $iduser
 * @property \Illuminate\Database\Eloquent\Collection $states
 * @property integer $owner_id
 * @property string $accountNumber
 * @property integer $cleRIB
 * @property number $solde
 * @property string $dateCreation
 * @property string $activeDate
 * @property string $nextRemunDate
 * @property string $closeDate
 * @property integer $idUser
 * @property integer $hostAgency
 * @property integer $idOpeningFees
 */
class Compteepsx extends Model
{
    use SoftDeletes;

    public $table = 'compteepsx';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'owner_id' => 'integer',
        'accountNumber' => 'string',
        'cleRIB' => 'integer',
        'solde' => 'decimal:0',
        'dateCreation' => 'string',
        'activeDate' => 'string',
        'nextRemunDate' => 'string',
        'closeDate' => 'string',
        'idUser' => 'integer',
        'hostAgency' => 'integer',
        'idOpeningFees' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'owner_id' => 'nullable|integer',
        'accountNumber' => 'required|string|max:100',
        'cleRIB' => 'required|integer',
        'solde' => 'required|numeric',
        'dateCreation' => 'required|string|max:255',
        'activeDate' => 'nullable|string|max:255',
        'nextRemunDate' => 'required|string|max:255',
        'closeDate' => 'nullable|string|max:255',
        'idUser' => 'nullable|integer',
        'hostAgency' => 'required|integer',
        'idOpeningFees' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function hostagency()
    {
        return $this->belongsTo(\App\Models\Agency::class, 'hostAgency');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function owner()
    {
        return $this->belongsTo(\App\Models\Clientphysique::class, 'owner_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idopeningfees()
    {
        return $this->belongsTo(\App\Models\Openingfee::class, 'idOpeningFees');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function iduser()
    {
        return $this->belongsTo(\App\Models\User::class, 'idUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function states()
    {
        return $this->belongsToMany(\App\Models\State::class, 'compteepsx_etats');
    }
}
