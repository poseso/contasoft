<?php

namespace App\Http\Requests\User;

use App\Rules\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class UpdateUserPasswordRequest.
 */
class UpdateUserPasswordRequest extends FormRequest
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
            'password' => array_merge(
                [
                    new UnusedPassword((int) $this->segment(4)),
                ],
                PasswordRules::changePassword($this->email)
            ),
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => __('El campo Contraseña es obligatorio.'),
            'password.min' => __('La contraseña debe tener al menos 8 caracteres.'),
        ];
    }
}
