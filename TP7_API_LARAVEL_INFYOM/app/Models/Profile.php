<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Models
 * @version September 6, 2020, 1:20 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $states
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $nom
 * @property string $description
 */
class Profile extends Model
{
    use SoftDeletes;

    public $table = 'profile';
    
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
    public function states()
    {
        return $this->belongsToMany(\App\Models\State::class, 'profile_state');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'idProfil');
    }
}
