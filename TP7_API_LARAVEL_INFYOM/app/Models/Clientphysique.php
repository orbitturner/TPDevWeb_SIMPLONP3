<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Clientphysique",
 *      required={"numId", "nom", "prenom", "email", "cni", "telephone", "adresse", "sexe", "dateNaiss", "dateCreation", "features", "isSalarie"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="numId",
 *          description="numId",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nom",
 *          description="nom",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="prenom",
 *          description="prenom",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cni",
 *          description="cni",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telephone",
 *          description="telephone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="adresse",
 *          description="adresse",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="sexe",
 *          description="sexe",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dateNaiss",
 *          description="dateNaiss",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dateCreation",
 *          description="dateCreation",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="features",
 *          description="features",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="isSalarie",
 *          description="isSalarie",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
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
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function compteepsxes()
    {
        return $this->hasMany(\App\Models\Compteepsx::class, 'owner_id');
    }
}
