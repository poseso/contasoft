<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use App\Helpers\Auth\SocialiteHelper;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends FormRequest
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
        $user = \Auth::id();

        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['sometimes', 'required', 'string', 'min:5', 'max:25', Rule::unique('users')->ignore($user)],
            'email' => ['sometimes', 'required', 'email', Rule::unique('users')],
            'avatar_type' => ['required', Rule::in(array_merge(['gravatar', 'storage'], (new SocialiteHelper)->getAcceptedProviders()))],
            'avatar_location' => ['sometimes', 'image'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => __('El campo Nombre es obligatorio.'),
            'last_name.required' => __('El campo Apellidos es obligatorio.'),
            'username.required' => __('El campo Usuario es obligatorio.'),
            'email.required' => __('El campo Dirección de correo es obligatorio.'),
            'username.unique' => __('El Usuario').' '.$this->get('username').' '.__('se encuentra en uso.'),
            'email.unique' => __('Ya existe un usuario con la dirección de correo').' '.$this->get('email'),
            'username.max' => __('El usuario no debe exceder los :max caracteres.'),
            'username.min' => __('El usuario debe tener un mínimo de :min caracteres.'),
        ];
    }
}
