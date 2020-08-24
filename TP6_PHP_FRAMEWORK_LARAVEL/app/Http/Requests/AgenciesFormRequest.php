<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class AgenciesFormRequest extends FormRequest
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
            'nom' => 'required|string|min:1|max:255',
            'creationDate' => 'required|string|min:1|max:255',
            'lieu' => 'required|string|min:1|max:255',
            'numAgency' => 'required|numeric|string|min:1|max:255',
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
        $data = $this->only(['nom', 'creationDate', 'lieu', 'numAgency']);



        return $data;
    }

}