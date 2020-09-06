<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clientphysique
 * @package App\Models
 * @version September 6, 2020, 1:16 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $compteepsxes
 * @property string $numId
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $cni
 * @property string $telephone
 * @property string $adresse
 * @property string $sexe
 * @property string $dateNaiss
 * @property string $dateCreation
 * @property string $features
 * @property string $isSalarie
 */
class Clientphysique extends Model
{
    use SoftDeletes;

    public $table = 'clientphysique';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numId' => 'string',
        'nom' => 'string',
        'prenom' => 'string',
        'email' => 'string',
        'cni' => 'string',
        'telephone' => 'string',
        'adresse' => 'string',
        'sexe' => 'string',
        'dateNaiss' => 'string',
        'dateCreation' => 'string',
        'features' => 'string',
        'isSalarie' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numId' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'cni' => 'required|string|max:255',
        'telephone' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'sexe' => 'required|string|max:255',
        'dateNaiss' => 'required|string|max:255',
        'dateCreation' => 'required|string|max:255',
        'features' => 'required|string|max:255',
        'isSalarie' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function compteepsxes()
    {
        return $this->hasMany(\App\Models\Compteepsx::class, 'owner_id');
    }
}
