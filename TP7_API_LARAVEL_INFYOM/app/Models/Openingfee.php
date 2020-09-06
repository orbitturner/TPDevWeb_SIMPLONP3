<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Openingfee",
 *      required={"libelle", "montant"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="libelle",
 *          description="libelle",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="montant",
 *          description="montant",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Openingfee extends Model
{
    use SoftDeletes;

    public $table = 'openingfees';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle',
        'montant'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string',
        'montant' => 'decimal:0'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required|string|max:255',
        'montant' => 'required|numeric',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function compteepsxes()
    {
        return $this->hasMany(\App\Models\Compteepsx::class, 'idOpeningFees');
    }
}
