<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateUserRequest.
 */
class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'username' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'roles' => ['required', 'array'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('El campo Dirección de correo es obligatorio'),
            'first_name.required' => __('El campo Nombre es obligatorio'),
            'last_name.required' => __('El campo Apellidos es obligatorio'),
            'username.required' => __('El campo Usuario es obligatorio'),
            'username.unique' => __('El Usuario').' '.'('.$this->get('username').')'.' '.__('se encuentra en uso.'),
        ];
    }
}
