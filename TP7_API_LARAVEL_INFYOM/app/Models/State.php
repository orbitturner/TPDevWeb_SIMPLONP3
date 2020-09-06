<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 * @package App\Models
 * @version September 6, 2020, 1:22 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $agencies
 * @property \Illuminate\Database\Eloquent\Collection $compteepsxes
 * @property \Illuminate\Database\Eloquent\Collection $profiles
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $nom
 * @property string $description
 */
class State extends Model
{
    use SoftDeletes;

    public $table = 'state';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|string|max:255',
        'description' => 'required|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function agencies()
    {
        return $this->belongsToMany(\App\Models\Agency::class, 'agency_state');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function compteepsxes()
    {
        return $this->belongsToMany(\App\Models\Compteepsx::class, 'compteepsx_etats');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function profiles()
    {
        return $this->belongsToMany(\App\Models\Profile::class, 'profile_state');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_state');
    }
}
