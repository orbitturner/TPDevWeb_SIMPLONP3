<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agency';

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
                  'creationDate',
                  'lieu',
                  'numAgency'
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
        return $this->hasOne('App\Models\AgencyState','agency_id','id');
    }

    /**
     * Get the compteepsxes for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function compteepsxes()
    {
        return $this->hasMany('App\Models\Compteepsx','hostAgency','id');
    }

    /**
     * Get the employee for this model.
     *
     * @return App\Models\Employee
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee','agencyhost','id');
    }



}
