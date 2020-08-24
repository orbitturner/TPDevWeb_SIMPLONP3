<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientphysique extends Model
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
    protected $table = 'clientphysique';

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
                  'numId',
                  'nom',
                  'prenom',
                  'email',
                  'cni',
                  'telephone',
                  'adresse',
                  'sexe',
                  'dateNaiss',
                  'dateCreation',
                  'features',
                  'isSalarie'
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
     * Get the compteepsxes for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function compteepsxes()
    {
        return $this->hasMany('App\Models\Compteepsx','owner_id','id');
    }



}
