<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Employee",
 *      required={"numEmployee", "telephone", "email", "cni", "adresse", "sexe", "service", "dateNaiss", "agencyhost"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="numEmployee",
 *          description="numEmployee",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telephone",
 *          description="telephone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cni",
 *          description="cni",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="adresse",
 *          description="adresse",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sexe",
 *          description="sexe",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="service",
 *          description="service",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dateNaiss",
 *          description="dateNaiss",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="idUser",
 *          description="idUser",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="agencyhost",
 *          description="agencyhost",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
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
        'agencyhost' => 'required|integer',
        'deleted_at' => 'nullable'
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
