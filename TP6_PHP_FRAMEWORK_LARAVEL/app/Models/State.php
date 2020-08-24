<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
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
    protected $table = 'state';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'nom',
                  'description'
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
     * Get the agencyState for this model.
     *
     * @return App\Models\AgencyState
     */
    public function agencyState()
    {
        return $this->hasOne('App\Models\AgencyState','state_id','id');
    }

    /**
     * Get the compteepsxEtats for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function compteepsxEtats()
    {
        return $this->hasMany('App\Models\CompteepsxEtat','state_id','id');
    }

    /**
     * Get the profileState for this model.
     *
     * @return App\Models\ProfileState
     */
    public function profileState()
    {
        return $this->hasOne('App\Models\ProfileState','state_id','id');
    }

    /**
     * Get the userState for this model.
     *
     * @return App\Models\UserState
     */
    public function userState()
    {
        return $this->hasOne('App\UserState','state_id','id');
    }



}
