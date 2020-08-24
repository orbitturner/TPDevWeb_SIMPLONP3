<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
    protected $table = 'employee';

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
                  'numEmployee',
                  'telephone',
                  'email',
                  'cni',
                  'adresse',
                  'sexe',
                  'service',
                  'dateNaiss',
                  'idUser',
                  'agencyhost'
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
     * Get the User for this model.
     *
     * @return App\Models\User
     */
    public function User()
    {
        return $this->belongsTo('App\User','idUser','id');
    }

    /**
     * Get the Agency for this model.
     *
     * @return App\Models\Agency
     */
    public function Agency()
    {
        return $this->belongsTo('App\Models\Agency','agencyhost','id');
    }



}
