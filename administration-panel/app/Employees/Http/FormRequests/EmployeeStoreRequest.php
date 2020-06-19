<?php

namespace App\Employees\Http\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest {

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
            'company_id'   => 'required',
            'name'         => 'required',
            'email'        => 'required|email|unique:employees',
            'phone'        => 'required|celular_com_ddd',
            'cpf'          => 'required|cpf|unique:employees',
            'cep'          => 'required|formato_cep',
            'street'       => 'required',
            'neighborhood' => 'required',
            'complement'   => 'nullable',
            'number'       => 'required',
            'city'         => 'required',
            'state'        => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'company_id.required'    => 'Selecione uma empresa.',
            'name.required'          => 'O nome do funcionario é obrigatório.',
            'email.required'         => 'O email do funcionario é obrigatório.',
            'email.unique'           => 'Ja existe um funcionario com este e-mail.',
            'email.email'            => 'Digite um e-mail valido.',
            'phone.required'         => 'O telefone do funcionario é obrigatório.',
            'phone.telefone_com_ddd' => 'Digite o telefone com o DDD.',
            'cpf.required'           => 'O cpf do funcionario é obrigatório.',
            'cpf.cpf'                => 'Cpf invalido, por favor, digite novamente.',
            'cpf.unique'             => 'Ja existe um funcionario com este cpf.',
            'cep.required'           => 'O CEP é obrigatório',
            'cep.formato_cep'        => 'Digite o cep no formato correto',
            'street.required'        => 'O nome da rua é obrigatório',
            'neighborhood.required'  => 'o Bairro é obrigatório',
            'number.required'        => 'O número é obrigatório',
            'city.required'          => 'A cidade é obrigatória',
            'state.required'         => 'O Estado é obrigatório',
            'state.max'              => 'Digite apenas a sigla do estado',
        ];
    }
}
