<?php

namespace App\Http\Requests\PreUser;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|unique:pre_users,company_name',
            'email'        => 'required|email|unique:pre_users,email',
            'phone'        => 'required | regex:/^[0-9]{10}$/ | unique:pre_users,phone'
        ];
    }

    public function messages() {
        return [
            'company_name.required' => 'Debe ingresar el nombre de compañia',
            'company_name.unique'   => 'Esta compañia ya se encuentra registrada',
            'email.required'        => 'Debe ingresar un correo eléctronico',
            'email.email'           => 'Debe ingresar un correo eléctronico válido',
            'email.unique'          => 'Ya este correo existe por favor intente ingresar a su cuenta',
            'phone.required'        => 'Se requiere ingrese un número de télefono',
            'phone.regex'           => 'Debe ingresar un formato de teléfono válido',
            'phone.unique'          => 'El número de teléfono que intenta registrar ya se encuentra en nuestras base de datos'
        ];
    }
}
