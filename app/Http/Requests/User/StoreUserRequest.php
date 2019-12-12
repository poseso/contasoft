<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class StoreUserRequest.
 */
class StoreUserRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => PasswordRules::register($this->email),
            'roles' => ['required', 'array'],
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'first_name.required' => __('El campo Nombre es obligatorio.'),
            'last_name.required' => __('El campo Apellidos es obligatorio.'),
            'username.required' => __('El campo Usuario es obligatorio.'),
            'password.required' => __('El campo Contraseña es obligatorio.'),
            'password_confirmation.required' => __('El campo Confirmación de la contraseña es obligatorio.'),
            'email.required' => __('El campo Dirección de correo es obligatorio.'),
            'roles.required' => __('Debe seleccionar al menos 1 perfil.'),
        ];
    }
}
