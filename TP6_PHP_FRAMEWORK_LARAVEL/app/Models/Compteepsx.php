<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compteepsx extends Model
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
    protected $table = 'compteepsx';

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
                  'owner_id',
                  'accountNumber',
                  'cleRIB',
                  'solde',
                  'dateCreation',
                  'activeDate',
                  'nextRemunDate',
                  'closeDate',
                  'idUser',
                  'hostAgency',
                  'idOpeningFees'
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
     * Get the Clientphysique for this model.
     *
     * @return App\Models\Clientphysique
     */
    public function Clientphysique()
    {
        return $this->belongsTo('App\Models\Clientphysique','owner_id','id');
    }

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
        return $this->belongsTo('App\Models\Agency','hostAgency','id');
    }

    /**
     * Get the Openingfee for this model.
     *
     * @return App\Models\Openingfee
     */
    public function Openingfee()
    {
        return $this->belongsTo('App\Models\Openingfee','idOpeningFees','id');
    }

    /**
     * Get the compteepsxEtat for this model.
     *
     * @return App\Models\CompteepsxEtat
     */
    public function compteepsxEtat()
    {
        return $this->hasOne('App\Models\CompteepsxEtat','compteepsx_id','id');
    }



}
