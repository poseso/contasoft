<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;
use LangleyFoxall\LaravelNISTPasswordRules\Rules\BreachedPasswords;

/**
 * Class RegisterRequest.
 */
class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'username' => ['required', 'string', 'min:5', 'max:25', Rule::unique('users')],
            'email' => ['required', 'string', 'email', Rule::unique('users')],
            'password' => [
                PasswordRules::register($this->email),
                (new BreachedPasswords())->setMessage(__('La contraseña ha sido expuesta en una violación de datos.')),
            ],
            'g-recaptcha-response' => ['required_if:captcha_status,true', 'captcha'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required_if' => __('El campo :attribute es requerido.', ['attribute' => 'captcha']),
            'first_name.required' => __('El campo Nombre es obligatorio.'),
            'last_name.required' => __('El campo Apellidos es obligatorio.'),
            'username.required' => __('El campo Usuario es obligatorio.'),
            'email.required' => __('El campo Dirección de correo es obligatorio.'),
            'password.required' => __('El campo Contraseña de correo es obligatorio.'),
            'username.unique' => __('El Usuario').' '.$this->get('username').' '.__('se encuentra en uso.'),
            'email.unique' => __('Ya existe un usuario con la dirección de correo').' '.$this->get('email'),
            'username.max' => __('El usuario no debe exceder los :max caracteres.'),
            'username.min' => __('El usuario debe tener un mínimo de :min caracteres.'),
        ];
    }
}
