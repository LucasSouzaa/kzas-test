<?php

namespace App\Companies\Http\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required',
            'email'   => 'required|email|unique:companies,email,' . $this->route('company'),
            'website' => 'required|url',
            'logo'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'O nome da empresa é obrigatório.',
            'email.required'   => 'O email da empresa é obrigatório.',
            'email.unique'     => 'Ja existe uma empresa com este e-mail.',
            'email.email'      => 'Digite um e-mail valido.',
            'website.required' => 'O website da empresa é obrigatório.',
            'website.url'      => 'Digite uma url valida.',
            'logo.required'    => 'A logo da empresa é obrigatória.',
        ];
    }
}
