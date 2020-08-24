<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class EmployeesFormRequest extends FormRequest
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
            'numEmployee' => 'required|string|min:1|max:255',
            'telephone' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'cni' => 'required|string|min:1|max:255',
            'adresse' => 'required|string|min:1|max:255',
            'sexe' => 'required|string|min:1|max:255',
            'service' => 'required|string|min:1|max:255',
            'dateNaiss' => 'required|string|min:1|max:255',
            'idUser' => 'nullable',
            'agencyhost' => 'required|numeric|min:-2147483648|max:2147483647',
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
        $data = $this->only(['numEmployee', 'telephone', 'email', 'cni', 'adresse', 'sexe', 'service', 'dateNaiss', 'idUser', 'agencyhost']);



        return $data;
    }

}