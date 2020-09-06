<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AgencyState
 * @package App\Models
 * @version September 6, 2020, 1:16 pm UTC
 *
 * @property \App\Models\State $state
 * @property \App\Models\Agency $agency
 * @property integer $state_id
 */
class AgencyState extends Model
{
    use SoftDeletes;

    public $table = 'agency_state';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'state_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'agency_id' => 'integer',
        'state_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\State::class, 'state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function agency()
    {
        return $this->belongsTo(\App\Models\Agency::class, 'agency_id');
    }
}
