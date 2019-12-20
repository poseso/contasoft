<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateRoleRequest.
 */
class UpdateRoleRequest extends FormRequest
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
            'name' => ['sometimes', 'required'],
            'description' => ['sometimes', 'required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('El campo Nombre del Perfil es obligatorio'),
            'description.required' => __('El campo Descripción del Perfil es obligatorio'),
            'name.unique' => __('El Perfil').' '.'('.$this->get('name').')'.' '.__('se encuentra en uso.'),
        ];
    }
}
