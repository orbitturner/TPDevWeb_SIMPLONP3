<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ClientphysiquesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'numId' => 'required|string|min:1|max:255',
            'nom' => 'required|string|min:1|max:255',
            'prenom' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'cni' => 'required|string|min:1|max:255',
            'telephone' => 'required|string|min:1|max:255',
            'adresse' => 'required|string|min:1|max:255',
            'sexe' => 'required|string|min:1|max:255',
            'dateNaiss' => 'required|string|min:1|max:255',
            'dateCreation' => 'required|string|min:1|max:255',
            'features' => 'required|string|min:1|max:255',
            'isSalarie' => 'required|string|min:1|max:255',
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['numId', 'nom', 'prenom', 'email', 'cni', 'telephone', 'adresse', 'sexe', 'dateNaiss', 'dateCreation', 'features', 'isSalarie']);



        return $data;
    }

}