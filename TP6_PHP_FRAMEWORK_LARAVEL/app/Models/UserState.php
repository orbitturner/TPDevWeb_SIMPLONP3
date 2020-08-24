<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserState extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_state';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'user_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'state_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the user for this model.
     *
     * @return App\Models\user
     */
    public function User()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    /**
     * Get the State for this model.
     *
     * @return App\Models\State
     */
    public function State()
    {
        return $this->belongsTo('App\Models\State','state_id','id');
    }



}
