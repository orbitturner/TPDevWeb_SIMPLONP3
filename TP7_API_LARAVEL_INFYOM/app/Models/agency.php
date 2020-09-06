<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="agency",
 *      required={"nom", "creationDate", "lieu", "numAgency"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nom",
 *          description="nom",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="creationDate",
 *          description="creationDate",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lieu",
 *          description="lieu",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numAgency",
 *          description="numAgency",
 *          type="string"
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
class agency extends Model
{
    use SoftDeletes;

    public $table = 'agency';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'creationDate',
        'lieu',
        'numAgency'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'creationDate' => 'string',
        'lieu' => 'string',
        'numAgency' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|string|max:255',
        'creationDate' => 'required|string|max:255',
        'lieu' => 'required|string|max:255',
        'numAgency' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function states()
    {
        return $this->belongsToMany(\App\Models\State::class, 'agency_state');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function compteepsxes()
    {
        return $this->hasMany(\App\Models\Compteepsx::class, 'hostAgency');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class, 'agencyhost');
    }
}
