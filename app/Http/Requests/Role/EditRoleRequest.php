<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('roles')->ignore($this->role),
            ],
            'permission_id' => [
                'required',
            ],
            'permission_id.*' => [
                'required',
                'numeric',
            ],
        ];
    }
}
