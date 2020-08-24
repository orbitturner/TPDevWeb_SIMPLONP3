<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CompteepsxesFormRequest extends FormRequest
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
            'owner_id' => 'nullable',
            'accountNumber' => 'required|numeric|string|min:1|max:100',
            'cleRIB' => 'required|numeric|min:-2147483648|max:2147483647',
            'solde' => 'required|numeric|min:-9|max:9',
            'dateCreation' => 'required|string|min:1|max:255',
            'activeDate' => 'nullable|string|min:0|max:255',
            'nextRemunDate' => 'required|string|min:1|max:255',
            'closeDate' => 'nullable|string|min:0|max:255',
            'idUser' => 'nullable',
            'hostAgency' => 'required|numeric|min:-2147483648|max:2147483647',
            'idOpeningFees' => 'nullable',
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
        $data = $this->only(['owner_id', 'accountNumber', 'cleRIB', 'solde', 'dateCreation', 'activeDate', 'nextRemunDate', 'closeDate', 'idUser', 'hostAgency', 'idOpeningFees']);



        return $data;
    }

}