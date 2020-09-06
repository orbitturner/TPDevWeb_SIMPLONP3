<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class agency
 * @package App\Models
 * @version September 6, 2020, 2:25 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $states
 * @property \Illuminate\Database\Eloquent\Collection $compteepsxes
 * @property \Illuminate\Database\Eloquent\Collection $employees
 * @property string $nom
 * @property string $creationDate
 * @property string $lieu
 * @property string $numAgency
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
