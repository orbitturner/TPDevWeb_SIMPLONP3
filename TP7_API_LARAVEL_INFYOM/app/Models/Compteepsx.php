<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Compteepsx",
 *      required={"accountNumber", "cleRIB", "solde", "dateCreation", "nextRemunDate", "hostAgency"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="owner_id",
 *          description="owner_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="accountNumber",
 *          description="accountNumber",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cleRIB",
 *          description="cleRIB",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="solde",
 *          description="solde",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="dateCreation",
 *          description="dateCreation",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="activeDate",
 *          description="activeDate",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nextRemunDate",
 *          description="nextRemunDate",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="closeDate",
 *          description="closeDate",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="idUser",
 *          description="idUser",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="hostAgency",
 *          description="hostAgency",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="idOpeningFees",
 *          description="idOpeningFees",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
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
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
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
