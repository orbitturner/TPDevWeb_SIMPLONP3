<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Openingfee
 * @package App\Models
 * @version September 6, 2020, 1:20 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $compteepsxes
 * @property string $libelle
 * @property number $montant
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
        'montant' => 'required|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function compteepsxes()
    {
        return $this->hasMany(\App\Models\Compteepsx::class, 'idOpeningFees');
    }
}
