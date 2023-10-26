<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
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
                'unique:roles'
            ],
            'permission_id' => [
                'required',
            ],
            'permission_id.*' => [
                'required',
                'numeric',
            ]
        ];
    }
}
