<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:filter|unique:users',
            'cellphone' => 'required|string|size:11|unique:users',
            'city_id' => 'required|integer|exists:cities,id',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nome Completo',
            'email' => 'E-mail',
            'cellphone' => 'Celular',
            'city_id' => 'Cidade',
        ];
    }
}
